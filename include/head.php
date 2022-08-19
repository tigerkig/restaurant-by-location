<?php
    // include './config/App.php';
    session_start();

    if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; }
    if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

    require "./language/lang-" . $_SESSION["lang"] . ".php";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> <?= $_lang['site_title'] ?> </title>

    <meta name="author" content="">
    
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo.png">
    <!-- phone number -->
    <link rel="stylesheet" href="./assets/css/intlTelInput.css">
    <!-- Bootstrap-ecommerce -->
    <link href="../assets/css/bootstrap.css?v=3.0" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/ui.css?v=3.0" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/responsive.css?v=3.0" rel="stylesheet" />
    <link href="../assets/css/styleLogin.css" rel="stylesheet" />

    <!-- Font awesome 5 -->
    <!-- <link rel="preload" href="../assets/fonts/fontawesome/webfonts/fa-solid-900.woff2" as="font" type="font/woff" crossorigin> -->
    <!-- <link href="../assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet" media="all">

    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet" />  

    <!-- Google recaptcha v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LdBsyYgAAAAAJBBkHcSgDfLMaEUY_pE8Q5X8mh6"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LdBsyYgAAAAAJBBkHcSgDfLMaEUY_pE8Q5X8mh6', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</head>
<body>
    
<?php include('alert.php'); ?>