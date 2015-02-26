<?php
//ADD TOOL

// Connect to DB
include('../_CONNECT/server-connect.php');

//Collect & escape form inputs
$obercoid = $_POST['bercoid'];
$bercoid = mysqli_real_escape_string($dbc,$obercoid);

$ocategory = $_POST['category'];
$category = mysqli_real_escape_string($dbc,$ocategory);

$oname = $_POST['name'];
$name = mysqli_real_escape_string($dbc,$oname);

$odailyprice = $_POST['dailyprice'];
$dailyprice = mysqli_real_escape_string($dbc,$odailyprice);

$oweeklyprice = $_POST['weeklyprice'];
$weeklyprice = mysqli_real_escape_string($dbc,$oweeklyprice);

$omonthlyprice = $_POST['monthlyprice'];
$monthlyprice = mysqli_real_escape_string($dbc,$omonthlyprice);

$otoolvalue = $_POST['toolvalue'];
$toolvalue = mysqli_real_escape_string($dbc,$otoolvalue);

$olocation = $_POST['location'];
$location = mysqli_real_escape_string($dbc,$olocation);

$status = 'IN';

//echo $bercoid . " " . $category . " " . $name . " " . $dailyprice . " " . $weeklyprice . " " . $monthlyprice . " " . $toolvalue . " " . $status . " " . $location;

// Build SQL statement
$query =
	"INSERT INTO tools(bayleyID, category, name, dailyPrice, weeklyPrice, monthlyPrice, toolValue, status, location) VALUES('$bercoid','$category','$name','$dailyprice','$weeklyprice','$monthlyprice','$toolvalue','$status','$location')";
	
//echo $query;
//echo $bercoid . " " . $category . " " . $name . " " . $dailyprice . " " . $weeklyprice . " " . $monthlyprice . " " . $toolvalue . " " . $status . " " . $location;

// Run it!
$result = mysqli_query($dbc, $query) or die('Unable to write to database!');

// Close connection
mysqli_close($dbc);

//Redirect
header( 'Location: ../index.php' );
?>
