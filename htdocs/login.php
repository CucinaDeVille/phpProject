<?php 

  
  if (isset($_GET["username"])) {
	$username = $_GET["username"];
  }
  if (isset($_GET["password"])) {
	$password = $_GET["password"];
  }
  
  if ($username=="steffen" && $password=="abc") {
	  header("location: home.php");
	  session_start();
	  $_SESSION["username"]=$username;
  } else {
	  header("location: login.html");
  }
 

?>