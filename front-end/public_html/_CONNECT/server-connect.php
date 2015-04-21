<?php
	//server-connect.php
<<<<<<< HEAD
	
	$host 	= 'localhost';
	$user 	= 'brlacquement';
	$pw 	= 'Loweshats12';
	$db		= 'tooltime';
	
	// Connect to the database
	$dbc	= mysqli_connect($host, $user, $pw, $db)
				or die('Connection error! (SERVER)');
?>
=======

	$host 	= '';
	$user 	= '';
	$pw 	= '';
	$db		= '';
	$dsn = "mysql:dbname=$db;host=$host";


	// Connect to the database
	$dbc	= mysqli_connect($host, $user, $pw, $db)
				or die('Connection error! (SERVER)');
	try {
		$conn = new PDO($dsn, $user, $pw);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
?>
>>>>>>> 53b69a07053659580098c2b1638033fe116a11d0
