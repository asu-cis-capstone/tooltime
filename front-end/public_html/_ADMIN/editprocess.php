<?php
//EDIT TOOL

// Connect to DB
include('../_CONNECT/server-connect.php');

//Collect & escape form inputs
$obercoid = $_POST['bercoid'];
$bercoid = mysqli_real_escape_string($dbc,$obercoid);

$ocategory = $_POST['category'];
$category = mysqli_real_escape_string($dbc,$ocategory);

if ($category == 'powertool')		{ $category = 'Power Tools';} 						
	elseif ($category == 'handtool') 	{ $category = 'Hand Tools';}
	elseif ($category == 'office') 	{ $category = 'Office';}
	elseif ($category == 'lift') 	{ $category = 'Lifts';}
	elseif ($category == 'safety') 	{ $category = 'Safety';}
	elseif ($category == 'traffic') { $category = 'Traffic';}
	elseif ($category == 'cleaning') 	{ $category = 'Cleaning';}
	elseif ($category == 'other') 	{ $category = 'Other';}

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

$status = 'in';

//echo $bercoid . " " . $category . " " . $name . " " . $dailyprice . " " . $weeklyprice . " " . $monthlyprice . " " . $toolvalue . " " . $status . " " . $location;

// Build SQL statement
$query = "UPDATE tools SET category='$category',name='$name',dailyPrice='$dailyprice',weeklyPrice='$weeklyprice',monthlyPrice='$monthlyprice',toolValue='$toolvalue',location='$location' WHERE bayleyID = '$bercoid'";	
//echo $query;
//echo $bercoid . " " . $category . " " . $name . " " . $dailyprice . " " . $weeklyprice . " " . $monthlyprice . " " . $toolvalue . " " . $status . " " . $location;

// Run it!
$result = mysqli_query($dbc, $query) or die('Unable to update to database!');

// Close connection
mysqli_close($dbc);

//Redirect
header( 'Location: ../index.php' );
?>
