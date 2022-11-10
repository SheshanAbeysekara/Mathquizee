<?php
$userName = "b51b28fcc2d517";
$Password = "c4dfdbcc";
$hostName = "us-cdbr-east-06.cleardb.net";
$dbName = "heroku_b259a28458b582d";
$con = mysqli_connect($hostName, $userName, $Password, $dbName); 
	if (!$con) {
  		die("Sorry, Connection failed: " . mysqli_connect_error());
	}
?>

