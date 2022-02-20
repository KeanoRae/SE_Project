<?php
	session_start();
	include_once('../include/database.php');

	if(isset($_POST['login_btn'])){
		$database = new Connection();
		$db = $database->open();


		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../index.php');
	
?>