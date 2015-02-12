<?php
	//server-connect.php
	
	$host 	= 'yourhost';
	$user 	= 'youruser';
	$pw 	= 'yourpassword';
	$db		= 'yourDB';
	
	// Connect to the database
	$dbc	= mysqli_connect($host, $user, $pw, $db)
				or die('Connection error! (SERVER)');
?>
