<?php
	//server-connect.php
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
