<?php 



	session_start();
	
		include 'db_connect.php';
		// Update date & time
		
		$staff_id=$_SESSION['staff_id'];
	
		session_destroy();
		session_unset();
	
	header('location:staff_login.php');
	
	
?>