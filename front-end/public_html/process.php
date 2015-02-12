<?php
	// process.php A9
	//Brandon Lacquement
	
	// connect to DB
	include('server-connect.php');

	// Build username query
	$query = "SELECT * FROM employee";
	
	// Run the Query
	$result = mysqli_query($dbc, $query) or die('Read error!');
	
	// Close DB connection
	mysqli_close($dbc);
	
	// Start a php session
	session_name('employee');
	session_start('employee');
	
	// Get and store our php session variables
	$row = mysqli_fetch_array($result);
	$_SESSION['employee'] = $row['name'];
	header('Location: welcome.php');
	exit;
	
	//This block MUST be the last block in this file!
	//Pass a 3 back to login.php for testing
	
	header('Location: login.php?rc=3');
	exit;
?>