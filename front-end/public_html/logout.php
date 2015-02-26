<?php
	session_name("employee");
	session_start("employee");
	session_unset("employee");
	session_destroy("employee");
	header('Location: login.php');
?>