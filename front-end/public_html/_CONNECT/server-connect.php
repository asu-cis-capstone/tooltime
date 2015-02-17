<?php
	//server-connect.php
	
	$host 	= 'localhost';
	$user 	= 'brlacquement';
	$pw 	= 'Loweshats12';
	$db		= 'BayleyConstruction';
	
	// Connect to the database
	$dbc	= mysqli_connect($host, $user, $pw, $db)
				or die('Connection error! (SERVER)');
?>