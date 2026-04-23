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

		<form action="logout.php" method="post">
			<button type="submit">Logout</button>
		</form>
	</body>
</html>