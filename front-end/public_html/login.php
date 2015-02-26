<?php
	// Start a php session
	session_name("employee");
	session_start("employee");
	
	//Check to see if user is already logged in
	if(isset($_SESSION['employee']))
	{
		header('Location: index.php');
		exit;
	}
?>

<!DOCTYPE html>

<!--
index.php (LOGIN)
-->

<html lang="en">
  	
<head>
		<!--TITLE-->
			<title>ToolTime: Login</title>
		
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
		<div class="container">
			<div class="jumbotron jumbotron-set center-block">
				<form role="form" action="process.php" method="post">
					<img src="../images/bayleysmall.png" alt="Bayley Logo">
					<h2>Bayley Construction</h2>
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email" required autofocus>
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" name="pwd" required>
					</div>
					<button type="submit" class="btn btn-default center-block">Login!</button>
					<?php
						// Check return code from process.php
						if($_GET["rc"] == 1)
						{
							echo '<p class="logerr">No match!</p>';
						}
						if($_GET["rc"] == 2)
						{
							echo '<p class="logerr">No match!</p>';
						}
						if($_GET["rc"] == 3)
						{
							echo '<p class="logerr">Returned from process.php...</p>';
						}
					?>
				</form>
			</div>		
		</div>
	</body>
</html>