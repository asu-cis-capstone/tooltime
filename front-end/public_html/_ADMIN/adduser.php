<?php
//ADD USER

// Connect to DB
include('../_CONNECT/server-connect.php');
include('../_SECURITY/PasswordHash.php');

//Collect & escape form inputs
$oemail = $_POST['email'];
$email = mysqli_real_escape_string($dbc,$oemail);

$otitle = $_POST['title'];
$title = mysqli_real_escape_string($dbc,$otitle);

$ofirstname = $_POST['firstname'];
$firstname = mysqli_real_escape_string($dbc,$ofirstname);

$olastname = $_POST['lastname'];
$lastname = mysqli_real_escape_string($dbc,$olastname);

$opassword = $_POST['password'];
$password = mysqli_real_escape_string($dbc,$opassword);

$orpassword = $_POST['rpassword'];
$rpassword = mysqli_real_escape_string($dbc,$orpassword);

if($rpassword == $password)
{
	//Hash password
	$hash = create_hash($password);

	//echo $email . $title . $firstname . $lastname . $hash;

	// Build SQL statement
	$query =
		"INSERT INTO employee(firstName, lastName, email, hash, title) VALUES('$firstname','$lastname','$email','$hash','$title')";
		
	// Run it!
	$result = mysqli_query($dbc, $query) or die('Unable to write to database!');

	// Close connection
	mysqli_close($dbc);

	//Redirect
	header( 'Location: ../index.php?rc=5' );
}
else
{
	// Close connection
	mysqli_close($dbc);

	//Redirect
	header( 'Location: register.php' );
}
?>
