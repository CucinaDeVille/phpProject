<?php
	session_start();
	if (!isset($_SESSION["username"])){
		header("location: login.html");
	}
?>

<!DOCTYPE html>

<html>

	<head>
	</head>
	
	<body>
		<h1>Willkommen im Giga-Shop, 
		<?php
		  $username = $_SESSION["username"];
		  print($username);
		?>
		</h1>

		<?php
			$mysqli = new mysqli("db", "user", "user", "testdb");
  			if ($mysqli->connect_errno) {
    			die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
  			}

  			$sql = "SELECT * FROM users;";
  			$statement = $mysqli->prepare($sql);
  			$statement->execute();

  			$result = $statement-> get_result();

			print("<table style='border:5px solid red;'>");

			while($row = $result->fetch_object()) {
				print("<tr>");
				print("<td>");
  				print ($row->Benutzername);
				print("</td>");
				print("<td>");
				print ($row->passwort);
				print("</td>");
				print("</tr>");
			}

			print("</table>");
		?>

		<form action="logout.php" method="post">
			<button type="submit">Logout</button>
		</form>
	</body>
</html>