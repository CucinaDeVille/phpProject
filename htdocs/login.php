<?php 

  if (isset($_GET["username"])) {
	$username = $_GET["username"];
  }
  if (isset($_GET["password"])) {
	$password = $_GET["password"];
  }

  $mysqli = new mysqli("db", "user", "user", "testdb");
  if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
  }

  # ' OR 1=1 limit 1#
  $sql = "SELECT * FROM users WHERE benutzername='$username' AND passwort='$password';";
  $result = $mysqli->query($sql);
  $anzahl_treffer = $result->num_rows;
  
  if ($anzahl_treffer == 1) {
	  header("location: home.php");
	  session_start();
	  $_SESSION["username"]=$username;
  } else {
	  header("location: login.html");
  }
 
?>