<?php
//REMOVE EMPLOYEE

// Connect to DB
include('../_CONNECT/server-connect.php');

//Collect & escape form inputs
$oid = $_POST['id'];
$id = mysqli_real_escape_string($dbc,$oid);

// Build SQL statement
$query = "DELETE FROM employee WHERE '$id' = id";	
//echo $query;

// Run it!
$result = mysqli_query($dbc, $query) or die('Unable to remove from database!');

// Close connection
mysqli_close($dbc);

//Redirect
header( 'Location: ../index.php?rc=11' );
?>
