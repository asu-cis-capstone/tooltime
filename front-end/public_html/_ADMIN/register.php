<?php
	// Start a php session
	include('../_CONNECT/server-connect.php');
	
	// Start a php session
	session_name("employee");
	session_start("employee");
		
	//Check to see if user is not logged in
	if(!isset($_SESSION['employee']))
	{
		header("Location: ../login.php");
		exit;
	}
?>


<!DOCTYPE html>

<!--
ToolTime
register.php (USER)
CIS 440
Spring 2015
-->

<html>
	<head>
		<!--TITLE-->
			<title>ToolTime: Add User</title>
		
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
										<li><a href="registertool.php">Add Tools</a></li>
										<li><a href="editselect.php">Update a Tool</a></li>										
										<li><a href="removetool.php">Remove Tool</a></li>
										<li class="divider"></li>
										<li><a href="createjob.php">Add a Job</a></li>
										<li><a href="updatejob_select.php">Update a Job</a></li>
										<li><a href="removejob.php">Remove a Job</a></li>																				
										<li class="divider"></li>
										<li><a href="register.php">Add A User</a></li>
										<li><a href="updateemployee_select.php">Update A User</a></li>
										<li><a href="removeemployee.php">Remove A User</a></li>
										<li class="divider"></li>
										<li><a href="list_employee.php">All Employees</a></li>
										<li><a href="list_job.php">All Jobs</a></li>
										<li><a href="list_tool.php">All Tools</a></li>										
										<li class="divider"></li>
										<li><a href="reporting.php">Reporting</a></li>
									  </ul>
									</li>';
								}
							?>
						  </ul>
						  <ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["employee"]; ?> <span class="caret"></span></a>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="../history.php">Rental History</a></li>
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
							<li class="active">Admin: Add User</li>
						</ol>
						
						<div class="jumbotron jumbotron-register center-block">
							<form action="adduser.php" method="post">
								<h3 class="dark-grey">User Registration</h3>
																	
								<div class="form-group col-lg-6">
									<label>Email Address</label>
									<input type="email" name="email" class="form-control" id="email" value="" 
									required autofocus
									title="Email: 6-50 chars, l/c, valid email only!"
									pattern="[a-z0-9.-_$]+@[a-z0-9-]+\.[a-z]{2,6}"
									maxlength="50"
									/>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Title</label>
									<input type="text" name="title" class="form-control" id="title" value="" 
									required autofocus
									title="Title: 4-20 chars, texts only!"
									pattern="[a-zA-Z]{4,20}"
									 />
								</div>
								
								<div class="form-group col-lg-6">
									<label>First Name</label>
									<input type="text" name="firstname" class="form-control" id="firstname" value=""
									title="Text only!"
									required autofocus
									pattern="[a-zA-Z]{2,16}"
									/>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Last Name</label>
									<input type="text" name="lastname" class="form-control" id="lastname" value="" 
									required autofocus
									title="Text only!"
									pattern="[a-zA-Z]{2,16}"
									/>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Password</label>
									<input type="password" name="password" class="form-control" id="password" value="" 
									required autofocus 
									title="Password: 5-15 chars, U/l, 0-9, . - _ ! $ only!"
									onchange="form.rpassword.pattern=this.value;"									
									pattern="[a-zA-Z0-9.-_!$]{5,15}"
									
									/>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Repeat Password</label>
									<input type="password" name="rpassword" class="form-control" id="rpassword" value="" 
									required autofocus 
									title="Passwords must match!" 
									/>
								</div>
			
								<div class="form-group">
									<button type="submit" class="btn btn-primary center-block">Register</button>		
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