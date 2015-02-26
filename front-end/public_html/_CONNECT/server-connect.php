<?php
	//server-connect.php
	
	$host 	= '';
	$user 	= '';
	$pw 	= '';
	$db		= '';
	
	// Connect to the database
	$dbc	= mysqli_connect($host, $user, $pw, $db)
				or die('Connection error! (SERVER)');
?>
