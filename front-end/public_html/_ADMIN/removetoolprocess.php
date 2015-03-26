<?php
//ADD TOOL

// Connect to DB
include('../_CONNECT/server-connect.php');

//Collect & escape form inputs
$obercoid = $_POST['bercoid'];
$bercoid = mysqli_real_escape_string($dbc,$obercoid);

//echo $bercoid;

// Build SQL statement
$query = "DELETE FROM tools WHERE '$bercoid' = toolID";	
//echo $query;

// Run it!
$result = mysqli_query($dbc, $query) or die('Unable to remove from database!');

// Close connection
mysqli_close($dbc);

//Redirect
header( 'Location: ../index.php' );
?>
