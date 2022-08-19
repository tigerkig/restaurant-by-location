<?php
$_GET['token'] = '123';
if(!isset($_GET['token'])) {
    	header("Location: ./food.php");
} else {
     require_once('food.php');
}
$_SESSION['token'] = '123';

?>

<div class="container verify_email" >

     <div class="panel">

          <?php include('./include/alert.php'); ?>

          <?php
          if(empty($_SESSION['token'])) {
               $_SESSION['error'] = "Could not validate your request";
               echo '<div class="alert error">'; 
               echo '<span class="closeAlert" onclick="this.parentElement.style=`display:none`">&times;</span>';
                    echo $_SESSION['error'];
               echo '</div>';       
               unset($_SESSION['error']);                 
          } else {
          ?>

               <div class="login-form">
                    <form action="controller/verify_email.php" method="post">
                         <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : '' ?>">
                         <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                         <input type="submit" name="submit" class="submit" value="Verify email">
                    </form>
               </div>
          <?php } ?>

          <a href="food.php"><button class="submit grey">Back to login</button></a>

          <div class="reCAPTCHA">
               This page is protected by Google reCAPTCHA to ensure you're not a bot. 
          </div>

     </div>

</div>
