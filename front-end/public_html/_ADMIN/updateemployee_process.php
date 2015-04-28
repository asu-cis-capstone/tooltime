<?php
//EDIT TOOL

// Connect to DB
include('../_CONNECT/server-connect.php');

//Collect & escape form inputs
$oid = $_POST['id'];
$id = mysqli_real_escape_string($dbc,$oid);

$ofirstname = $_POST['firstname'];
$firstname = mysqli_real_escape_string($dbc,$ofirstname);

$olastname = $_POST['lastname'];
$lastname = mysqli_real_escape_string($dbc,$olastname);

$oemail = $_POST['email'];
$email = mysqli_real_escape_string($dbc,$oemail);

$otitle = $_POST['title'];
$title = mysqli_real_escape_string($dbc,$otitle);

// Build SQL statement
$query = "UPDATE employee SET firstName='$firstname',lastName='$lastname',email='$email',title='$title' WHERE id = '$id'";	
//echo $query;

// Run it!
$result = mysqli_query($dbc, $query) or die('Unable to update to database!');

// Close connection
mysqli_close($dbc);

//Redirect
header( 'Location: ../index.php?rc=10' );
?>
