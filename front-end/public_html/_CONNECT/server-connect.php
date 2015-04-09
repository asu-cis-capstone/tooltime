<?php
	//server-connect.php
	
	$host 	= 'localhost';
	$user 	= 'brlacquement';
	$pw 	= 'Loweshats12';
	$db		= 'tooltime';
	
	// Connect to the database
	$dbc	= mysqli_connect($host, $user, $pw, $db)
				or die('Connection error! (SERVER)');
?>