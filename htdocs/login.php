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

  $sql = "SELECT * FROM users WHERE benutzername= ? AND passwort= ?;";
  $statement = $mysqli->prepare($sql);
  $statement->bind_param('ss', $username, $password);
  $statement->execute();

  $statement->store_result();
  
  if ($statement->num_rows == 1) {
	  header("location: home.php");
	  session_start();
	  $_SESSION["username"]=$username;
  } else {
	  header("location: login.html");
  }
 
?>