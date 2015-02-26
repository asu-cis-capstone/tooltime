<?php
	// connect to DB
	include('_CONNECT/server-connect.php');
	include('_SECURITY/PasswordHash.php');
	
	// get php variables for username and password
	$oemail = $_POST['email'];
	$email = mysqli_real_escape_string($dbc,$oemail);	$pword = $_POST['pwd'];

	$opassword = $_POST['pwd'];
	$password = mysqli_real_escape_string($dbc,$opassword);
	
	// Build username query
	$query = "SELECT * FROM employee WHERE email = '$email'";
	
	// Run the Query
	$result = mysqli_query($dbc, $query) or die('Username read error!');
	
	// Do we have a row?
	if (mysqli_num_rows($result) == 0)
	{
		header('Location: login.php?rc=1');
		exit;
	}
	
	//Get the correct hash
	$employee = mysqli_query($dbc, "SELECT * FROM employee WHERE email='$email'");
	$emprow = mysqli_fetch_array($employee);
	$correcthash = $emprow['hash'];
	
	// Verify the password
	$correctpwdbool = validate_password($password, $correcthash);
	
	if(!$correctpwdbool)
	{
		header('Location: login.php?rc=2');
		exit;
	}
	
	// If we got here, we can verify a username and password combo!
	// Close DB connection
	mysqli_close($dbc);
	
	// Start a php session
	session_name("employee");
	session_start("employee");
	
	// Get and store our php session variables
	$_SESSION['employee'] = $emprow['firstName'];
	$_SESSION['title'] = $emprow['title'];
	$_SESSION['id'] = $emprow['id'];
	header('Location: ../index.php');
	exit;
	
	//This block MUST be the last block in this file!
	//Pass a 3 back to login.php for testing
	
	header('Location: login.php?rc=3');
	exit;
?>