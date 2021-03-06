<?php
	// Start a php session
	include('_CONNECT/server-connect.php');
	
	// Start a php session
	session_name("employee");
	session_start("employee");
		
	//Check to see if user is not logged in
	if(!isset($_SESSION['employee']))
	{
		header("Location: login.php");
		exit;
	}
	
	$_SESSION['tool'] = $_GET['tool'];
?>


<!DOCTYPE html>

<!--
ToolTime
checkout.php
CIS 440
Spring 2015
-->

<html>
	<head>
		<!--TITLE-->
			<title>ToolTime: Checkout</title>
		
		<!--REQ FOR RESPONSIVE BOOTSTRAP-->
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!--CDN JQUERY LINKS-->
			<!--JS 1.11.2-->	<script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
			<!--JS 2.1.3-->		<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
		<!--CDN JQUERY MOBILE LINKS-->
			<!--JS 1.4.5		<script src = "http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>-->
			<!--CSS 1.4.5		<script src = "http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.css"></script>-->
				<!--1.4.5 not hosted by Google. Also causes style issues w/Navbar.-->
				
		<!--CDN JQUERY UI LINKS-->
			<!--CSS 1.11.3-->	<link 	rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
			<!--JS 1.11.3-->	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
		
		<!--LOCAL CSS LINKS-->
			<!--BOOTSTRAP-->	<link 	href = "../css/bootstrap.min.css" rel = "stylesheet">
			<!--OVERWRITE-->	<link 	href = "../css/style.css" rel = "stylesheet">
		
		<!--LOCAL SCRIPT LINKS-->
			<!--BOOTSTRAP-->	<script src = "../js/bootstrap.js"></script>
			<!--NAVBAR-->		<script src = "../js/navbar.js"></script>
			<!--JQUERY-->		<script src = "../js/jquery-2.1.3.js"></script>
		
		<!--LOCAL CAKEPHP LINKS-->
			<!---->
		
		<!--LOCAL FAVICON LINK-->
			<link rel="icon" href="../images/favicon.ico" />	
	</head>
	
	<body>
		<!--FULL WRAPPER-->
		<div id="wrapper">
			<div class="overlay"></div>
			<!--PAGE CONTENT WRAPPER-->
			<div id="page-content-wrapper">
				<nav class="navbar navbar-default navbar-fixed-top navbarcolor">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="../index.php">
						  <img src = "../images/longlogo.png" id="headerimg" alt = "Logo">
						  </a>  
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav">
							<li class="fix"><a href="../toolcheckin.php">Tool Check-In <span class="sr-only">(current)</span></a></li>
							<!--<li><a href="#">Link</a></li>-->
							<?
								if($_SESSION['title'] == "Admin")
								{
									echo '<li class="dropdown">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin Panel <span class="caret"></span></a>
									  <ul class="dropdown-menu" role="menu">
										<li><a href="_ADMIN/registertool.php">Add Tools</a></li>
										<li><a href="_ADMIN/editselect.php">Update a Tool</a></li>										
										<li><a href="_ADMIN/removetool.php">Remove Tool</a></li>
										<li class="divider"></li>
										<li><a href="_ADMIN/createjob.php">Add a Job</a></li>
										<li><a href="_ADMIN/updatejob_select.php">Update a Job</a></li>
										<li><a href="_ADMIN/removejob.php">Remove a Job</a></li>																				
										<li class="divider"></li>
										<li><a href="_ADMIN/register.php">Add A User</a></li>
										<li><a href="_ADMIN/updateemployee_select.php">Update A User</a></li>
										<li><a href="_ADMIN/removeemployee.php">Remove A User</a></li>
										<li class="divider"></li>
										<li><a href="_ADMIN/list_employee.php">All Employees</a></li>
										<li><a href="_ADMIN/list_job.php">All Jobs</a></li>
										<li><a href="_ADMIN/list_tool.php">All Tools</a></li>										
										<li class="divider"></li>
										<li><a href="_ADMIN/reporting.php">Reporting</a></li>
									  </ul>
									</li>';
								}
							?>
						  </ul>

						  <ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["employee"]; ?> <span class="caret"></span></a>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="history.php">Rental History</a></li>
								<li class="divider"></li>
								<li><a href="../logout.php">Sign Out</a></li>
							  </ul>
							</li>
						  </ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				
				<div class="container">
					<div class="col-lg-8 col-lg-offset-2">
						<ol class="breadcrumb breadcrumb-color">
							<li><a href="../index.php">Home</a></li>
							<li><a href="javascript:history.back()"><? echo $_GET['cat']; ?></a></li>
							<li class="active">Check-Out</li>
						</ol>
						
						<div class="jumbotron jumbotron-register center-block">
							<form action="processcheckout.php" method="post">
								<h3 class="dark-grey">Rental Information</h3>
								<h4 style="color: red;"><? echo $_GET['name'] . ' [' . $_SESSION['tool'] . ']'; ?></h4>											
								
								<!--<div class="form-group col-lg-6">
									<label>Job #:</label>
									<input type="text" name="jobno" class="form-control" id="jobno" value="" 
									required autofocus
									title="5 digit number!"
									pattern="[0-9]{5,5}"
									/>
								</div>-->
								
								<?	
									$query = "SELECT * FROM jobs";
									$result = mysqli_query($dbc, $query) or die('Category read error!');
									
									$array = array();
									
									$index = 0;
									while($row = mysqli_fetch_assoc($result))
									{
										$array[$index] = $row;
										$index++;
									}
									
									$max = $index;
									
									$numrows = mysqli_num_rows($result);
									
									if (mysqli_num_rows($result) == 0)
									{
										header('Location: index.php?rc=1');
										exit;
									}
									
									$x = 0;
								?>
								
								<div class="form-group col-lg-6">
								<label for ="location">Job #</label>
									<select name="jobno" class="form-control" value="" id="jobno" required>
										<?
											while($x < $max) {
												echo '<option value="' . $array[$x][jobNum] . '">' . $array[$x][jobNum] . ' - ' . $array[$x][jobName] . '</option>';
												$x++;
											}
										?>		
									</select>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Cost Code:</label>
									<input type="costcode" name="costcode" class="form-control" id="costcode" value="" 
									required autofocus
									title="8 digit number, no dashes or periods!"
									pattern="[0-9]{8,8}"
									/>
								</div>
			
								<div class="form-group">
									<button type="submit" class="btn btn-primary center-block">Confirm</button>		
								</div>	
							</form>
						</div>
						
						<div class="container">
							<p class="col-lg-8 text-center">Bayley Construction &copy; 2015</p>
						</div>
					</div>
				</div>
			</div>
			<!--/PAGE CONTENT WRAPPER-->
		</div>
		<!--/FULL WRAPPER-->	
	</body>
</html>