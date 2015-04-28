<?php
//REMOVE JOB

// Connect to DB
include('../_CONNECT/server-connect.php');

//Collect & escape form inputs
$ojobno = $_POST['jobno'];
$jobno = mysqli_real_escape_string($dbc,$ojobno);

// Build SQL statement
$query = "DELETE FROM jobs WHERE '$jobno' = jobNum";	
//echo $query;

// Run it!
$result = mysqli_query($dbc, $query) or die('Unable to remove from database!');

// Close connection
mysqli_close($dbc);

//Redirect
header( 'Location: ../index.php?rc=9' );
?>
