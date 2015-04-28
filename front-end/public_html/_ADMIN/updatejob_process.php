<?php
//EDIT JOB

// Connect to DB
include('../_CONNECT/server-connect.php');

//Collect & escape form inputs
$ojobno = $_POST['jobno'];
$jobno = mysqli_real_escape_string($dbc,$ojobno);

$oname = $_POST['name'];
$name = mysqli_real_escape_string($dbc,$oname);

// Build SQL statement
$query = "UPDATE jobs SET jobName='$name' WHERE jobNum = '$jobno'";	
//echo $query;

// Run it!
$result = mysqli_query($dbc, $query) or die('Unable to update to database!');

// Close connection
mysqli_close($dbc);

//Redirect
header( 'Location: ../index.php?rc=8' );
?>
