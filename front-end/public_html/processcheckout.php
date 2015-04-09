<?
	// Start a php session
	include('_CONNECT/server-connect.php');
	
	// Start a php session
	
	session_name("employee");
	session_start("employee");
	
	// Check connection 
	
		
	//Check to see if user is not logged in
	if(!isset($_SESSION['employee']))
	{
		header("Location: ../login.php");
		exit;
	}
	
	
	//Get variables
	$jobno = $_POST['jobno'];
	$costcode = $_POST['costcode'];
	$tool = $_SESSION['tool'];
	$employee = $_SESSION['id'];
	$type = 'out';
		
	//Test for all variables
	//echo ' Job ' . $jobno . ' CC ' . $costcode . ' Tool ' . $tool . ' Employee ' . $employee;
	
	//Add row to transactions
	$query= "INSERT INTO trans_log (type,tool_id,employee_id,job_no,costcode,timestamp) VALUES('$type','$tool','$employee','$jobno','$costcode',now())";
	//Update tools status to 'out'
	$query1= "UPDATE tools SET status='out' WHERE toolID='$tool'";
	
	//echo $query;
	
	// Run queries
	$result = mysqli_query($dbc, $query) or die('Unable to write to DB');
	$result1 = mysqli_query($dbc, $query1) or die('Unable to write to DB');
	//Update status in tools
	mysqli_close($dbc);
	header("Location: ../index.php?rc=1");
	
	//Email
	// The message
	$message = "Rental request from Employee No. $employee for Tool No. $tool";

	// In case any of our lines are larger than 70 characters, we should use wordwrap()
	$message = wordwrap($message, 70, "\r\n");

	// Send
	mail('brlacquement@gmail.com', 'Rental Request', $message);

	exit;
	
?>