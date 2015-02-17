<!DOCTYPE html>

<!--
ToolTime
index.php
CIS 440
Spring 2015
-->

<!--
<?php
	// Start a php session
	include('_CONNECT/server-connect.php');
?>
-->

<html>
	<head>
		<!--TITLE-->
			<title>ToolTime: Home</title>
		
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
			<!--BOOTSTRAP-->	<link 	href = "css/bootstrap.min.css" rel = "stylesheet">
			<!--OVERWRITE-->	<link 	href = "css/style.css" rel = "stylesheet">
		
		<!--LOCAL SCRIPT LINKS-->
			<!--BOOTSTRAP-->	<script src = "js/bootstrap.js"></script>
			<!--NAVBAR-->		<script src = "js/navbar.js"></script>		
		
		<!--LOCAL CAKEPHP LINKS-->
			<!---->
		
		<!--LOCAL FAVICON LINK-->
			<link rel="icon" href="images/favicon.ico" />
	</head>
	
	<body>
		<!--FULL WRAPPER-->
		<div id="wrapper">
			<div class="overlay"></div>
			
			<!--SIDEBAR WRAPPER-->
			<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
			  <ul class="nav sidebar-nav">
				<li><a href="index.php">HOME</a></li>
				<li><a href="index.php">HISTORY</a></li>
				<li><a href="index.php">ADMIN</a></li>
				<li><a href="index.php">LOGOUT</a></li>
				<li><a href="index.php">FEEDBACK</a></li>
			  </ul>
			</nav>
			<!--/SIDEBAR WRAPPER-->
			
			<!--PAGE CONTENT WRAPPER-->
			<img src = "images/longlogo.png" class="img-responsive" alt = "Logo" id ="headerimg">
			
			<div id="page-content-wrapper">
				<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
					<span class="hamb-top"></span>
					<span class="hamb-middle"></span>
					<span class="hamb-bottom"></span>
				</button>
			  
				<div class="row"></div>
			  
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<h1>
								Hello, world!
							</h1>
							<h2>
								Its Tool Time.
							</h2>

							<p>
								Bayley Construction was established in Mercer Island, Washington in 1963. Since then, 
								their work in commerical construction has expanded throughout the west coast and across the US. 
								They currently have offices in Arizona, California and Washington. Bayley is constantly seeking to 
								improve their internal business practices and has sought our team to develop an efficient, user-friendly 
								way to manage their existing tool rental system. Internally, Bayley rents tools to employees from their 
								warehouses and currently has no way of managing these rentals. They would like our team to develop a 
								system that will allow employees to rent and return tools by scanning barcodes, create reports based on 
								rental history, and manage tool inventory.
							</p>

							<p id="timestamp">
								<?php
									date_default_timezone_set('America/Phoenix');
									$current_date = date('d/m/Y - H:i:s');
									echo $current_date; 
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!--/PAGE CONTENT WRAPPER-->
			
		</div>
		<!--/FULL WRAPPER-->
		
	</body>
</html>