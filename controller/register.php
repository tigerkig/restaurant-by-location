<?php
/*
This class is registration
*/
require '../config/App.php';
require './send_mail.php';

// Start of Registration with Prepared Statements

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
        // Build POST request:
        require '../config/recaptcha.php';
        // Take action based on the score returned:
        if ($recaptcha->score >= 0.5) {
            // Verified - send email
            $myusername = mysqli_real_escape_string($conn,$_POST['username']);
            $myemail = mysqli_real_escape_string($conn,$_POST['email']);
            $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
            $confirm = mysqli_real_escape_string($conn,$_POST['confirm']);
            $phone = mysqli_real_escape_string($conn,$_POST['phone']);
            $hash = password_hash($mypassword, PASSWORD_DEFAULT);

            // Include profanity words list
            $profanity = file_get_contents('../config/list.txt');
            $profanity = preg_split("/\\r\\n|\\r|\\n/", $profanity);

            if(empty($myusername) || empty($myemail) || empty($mypassword) || empty($confirm)) {
                $_SESSION['error'] = 'Please fill out all details';
                header("Location: ../food.php");
            }
            else if (!ctype_alnum($myusername)) {
                $_SESSION['error'] = 'Username may only contain letters and numbers';
                header("Location: ../food.php?mail=".$myemail);
            }
            else if (strlen($myusername) < 3) {
                $_SESSION['error'] = 'Username must be atleast 3 characters';
                header("Location: ../food.php?mail=".$myemail);
            }
            else if(in_array($myusername,$profanity)) {
                $_SESSION['error'] = 'Username contains profanity, please choose a different username';
                header("Location: ../food.php?mail=".$myemail);
            }
            else if (!filter_var($myemail, FILTER_VALIDATE_EMAIL) && !empty($myemail)) {
                $_SESSION['error'] = 'Email is not a valid email address';
                header("Location: ../food.php?user=".$myusername);
            }
            else if(!isValidTelephoneNumber($phone)) {
               $_SESSION['error'] = 'Your phone number is incorret';
               header("Location: ../food.php?user=".$myusername."&mail=".$myemail);
            } 
            else if(strlen($mypassword) < 8) {
                $_SESSION['error'] = 'Your password needs to be a minimum of 8 characters';
                header("Location: ../food.php?user=".$myusername."&mail=".$myemail);
            }
            else if(preg_match("/[A-Z]/", $mypassword) === 0 || preg_match("/[a-z]/", $mypassword) === 0) {
                $_SESSION['error'] = 'Your password must contain atleast one uppercase and lowercase letter';
                header("Location: ../food.php?user=".$myusername."&mail=".$myemail);
            } 
            else if(preg_match("/[0-9]/", $mypassword) === 0) {
                $_SESSION['error'] = 'Your password must contain atleast one number';
                header("Location: ../food.php?user=".$myusername."&mail=".$myemail);
            } 
            else if ((!ctype_alnum($mypassword)) || (!ctype_alnum($confirm))) {
                $_SESSION['error'] = 'Passwords may only contain letters and numbers';
                header("Location: ../food.php?user=".$myusername."&mail=".$myemail);
            } 
            else if($mypassword != $confirm) {
                $_SESSION['error'] = 'Your passwords did not match';
                header("Location: ../food.php?user=".$myusername."&mail=".$myemail);
            } 
            else {
      
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->bind_param("s", $myemail);
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows == 1) {
                    $_SESSION['error'] = 'Username or email already in use, try something else';
                    // header("Location: ../food.php");
                }
                if($stmt->num_rows == 0 && ($mypassword == $confirm)) {
                    $stmt = $conn->prepare("INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $myusername, $hash, $myemail, $phone);    
                    if($stmt->execute() === TRUE) {
                        $_SESSION['EMAIL'] = $myemail;
                        $token = random_bytes(32);

                        $url = "https://localhost:8000/verify.php?token=" . bin2hex($token);
                        $_SESSION['token'] = $token;

                        // Start of Delete Token
                            $sql = "DELETE FROM email_tokens WHERE user_id=?";
                            $stmt = mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmt, $sql);
                            mysqli_stmt_bind_param($stmt, "s", $myemail);
                            mysqli_stmt_execute($stmt);     
                        // End of Delete Token


                        // Start of Insert New Token
                            $sql = "INSERT INTO email_tokens (user_id, token, code) VALUES (?, ?, ?);";
                            $stmt = mysqli_stmt_init($conn);

                            mysqli_stmt_prepare($stmt, $sql);
                            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                            $code = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
                            mysqli_stmt_bind_param($stmt, "sss", $myemail, $hashedToken, $code);
                            mysqli_stmt_execute($stmt);
                        // End of Insert New Token
                        $to = $myemail;

                        $subject = "Verify your email";

                        $message = "<p>Thank you for registering. The link to verify your email is below or use this code <strong>".$code."</strong></p>";
                        $message .= "<p>Here is your email verification link: </br>";
                        $message .= "<a href='" . $url . "'>liveChat link</a></p>";

                    //     $result = sendMail($to,$subject,$message);
                        $result = 'success';
                        if($result == 'error') {
                            $_SESSION['error'] = 'Error! Could not send email, please try again later';
                            header("Location: ../food.php");
                        } else {
                            $_SESSION['success'] = 'We have sent you an email! Please verify your email address by clicking the link in the email or enter the code';
                            header("Location: ../food.php");
                        }

                    }
                }
            }
        } else {
            // Not verified - show form error
            $_SESSION['error'] = 'Error! Captcha has failed, please try again';
            header("Location: ../food.php");
        }

    } else {
        $_SESSION['error'] = 'Error! You do not have permission to access that request';
        header("Location: ../food.php");
        die();
    }

    function isValidTelephoneNumber(string $telephone, int $minDigits = 8, int $maxDigits = 14): bool {
          //remove white space, dots, hyphens and brackets
          $telephone = str_replace([' ', '-', '(', ')'], '', $telephone); 
     
          //are we left with digits only?
          return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $telephone);
     }
// End of Registration with Prepared Statements





