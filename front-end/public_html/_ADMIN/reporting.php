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
reporting.php
CIS 440
Spring 2015
-->

<html>
	<head>
		<!--TITLE-->
			<title>ToolTime: Reporting</title>
		
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
						  <a class="navbar-brand" href="../index.php
						  ">
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
										<li><a href="removetool.php">Remove Tools</a></li>
										<li><a href="editselect.php">Edit a Tool</a></li>
										<li class="divider"></li>
										<li><a href="#">Reporting</a></li>
										<li class="divider"></li>
										<li><a href="register.php">Add A User</a></li>
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
								<li><a href="../../logout.php">Sign Out</a></li>
							  </ul>
							</li>
						  </ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				
				<div class="container">
					<div class="col-lg-8 col-lg-offset-2">						<ol class="breadcrumb breadcrumb-color">							<li><a href="../../index.php">Home</a></li>							<li class="active"></li>						</ol>
						
						<div class="row">
							<!-- ADD PHP LOOP HERE -->
							<?/*	
								$query = "SELECT * FROM tools";
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
									header('Location: ../index.php?rc=1');
									exit;
								}
								
								$x = 0;
								
								function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") 
								{    
									// open raw memory as file so no temp files needed, you might run out of memory though    
									$f = fopen('php://memory', 'w');     
									
									// loop over the input array    
									foreach ($array as $line) 
									{         
										// generate csv lines from the inner arrays        
										fputcsv($f, $line, $delimiter);     
									}    
									
									// rewrind the "file" with the csv lines    
									fseek($f, 0);    
									
									// tell the browser it's going to be a csv file    
									header('Content-Type: application/csv');    
									
									// tell the browser we want to save it instead of displaying it    
									header('Content-Disposition: attachement; filename="'.$filename.'";');    
									
									// make php send the generated csv lines to the browser    
									fpassthru($f);}
									array_to_csv_download(array(  
									array(1,2,3,4), // this array is going to be the first row  
									array(1,2,3,4)), // this array is going to be the second row  
									"numbers.csv");
								*/
							?>
							<!-- END PHP LOOP -->
							</div>
							<footer class="footer">
								<div class="container-fluid">
									<p class="text-center">Bayley Construction &copy; 2015</p>
								</div>
							</footer>
						
					</div>
				</div>
				
			</div>
			<!--/PAGE CONTENT WRAPPER-->
		</div>
		<!--/FULL WRAPPER-->	
	</body>
</html>