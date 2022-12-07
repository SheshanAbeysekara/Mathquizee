<?php

$Gclient = new Google_Client();
$Gclient-> setClientId("559435595836-q4780alvfibks9gkit11p81anjndak5k.apps.googleusercontent.com");
$Gclient->setClientSecret("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");

$Gclient->setApplicationName("Mathquizee");

$Gclient->setRedirectUri("https://mathquizee.herokuapp.com/Includes/login.inc.php");
$Gclient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$login_url = $Gclient->createAuthUrl();

 ?>