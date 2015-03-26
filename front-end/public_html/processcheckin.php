<?
	// Start a php session
	include('_CONNECT/server-connect.php');
	
	// Start a php session
	session_name("employee");
	session_start("employee");
		
	//Check to see if user is not logged in
	if(!isset($_SESSION['employee']))
	{
		header("Location: ../login.php");
		exit;
	}
	
	//1. Grab tool and employee id from session
	//Get variables
	$tool = $_SESSION['tool_id'];
	$employee = $_SESSION['id'];
	
	//echo $tool . $employee;
	
	//2. Find most recent checkout row from trans_log for this tool and employee
	//The below SQL statement will get you the most recent timestamp of the employee and tool, but it keeps showing the "die" error message
	$query1 = "SELECT timestamp,job_no,costcode FROM trans_log WHERE tool_id='$tool' AND employee_id='$employee' ORDER BY timestamp DESC LIMIT 1";
	$result1 = mysqli_query($dbc, $query1) or die('Timestamp query problem');
	$row1 = $result1->fetch_array();
	//echo $row1['timestamp'];
	$time = $row1['timestamp'];
	$jobno = $row1['job_no'];
	$costcode = $row1['costcode'];
	//echo 'Past query1!';
	
	//3. Add a row in trans_log for the checkin 
	$query2 = "INSERT INTO trans_log (type,tool_id,employee_id,job_no,costcode,timestamp) VALUES('in','$tool','$employee','$jobno','$costcode',now())";
	$result2 = mysqli_query($dbc, $query2) or die('Could not write to DB! trans_log');
	//echo 'Past query 2!';
	
	//4. Calculate time rented (in hours) with the two most recent trans_log rows for this tool and employee
	/*$query3 = "SELECT TIMEDIFF('$time', NOW()) AS diff";
	$result3 = mysqli_query($dbc, $query3) or die('Failure to calculate time');
	$row3 = $result3->fetch_array();
	echo $row3['diff'];
	$diff = $row3['diff'];
	echo 'Past query 3!';*/
	
	//4.5 Get tool cost (NEEDS UPDATED)
	$query35 = "SELECT dailyPrice FROM tools WHERE '$tool' = toolID";
	$result35 = mysqli_query($dbc, $query35);
	$row35 = $result35->fetch_array();
	$price = $row35['dailyPrice'];
	//echo $price;
	//echo 'Past query 3.5!';
	
	//4.7 Convert diff to days
	$query37 = "SELECT FLOOR(HOUR(TIMEDIFF(NOW(), '$time')) / 24) AS days";
	$result37 = mysqli_query($dbc, $query37);
	$row37 = $result37->fetch_array();
	$days = $row37['days'];
	//echo $days;
	//echo 'Past query 3.7!';
	
	//5. Add row to rental_log with all necessary info
	//I left the values below empty as I was unable to find them
	if($days == '0')
	{
		$days = 1; //Always charge one day!
	}
	$cost = $price * $days;
	$query4 = "INSERT INTO rental_log (time_out, time_in, tool_id, employee_id, job_no, costcode, time_rented, cost) VALUES ('$time',NOW(),'$tool','$employee','$jobno','$costcode','$days','$cost')";
	$result4 = 	mysqli_query($dbc,$query4);
	//echo 'Past query 4!';	
		
	//6. Update status in the tools table
	$query5= "UPDATE tools SET status='in' WHERE toolID='$tool'";
	$result5 = mysqli_query($dbc, $query5) or die('Unable to write to DB');
	//echo 'Past query 5!';
	
	//Close
	mysqli_close($dbc);

	header('Location: index.php');
	exit;
?>