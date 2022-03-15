<?php
    session_start();
	include_once('include/database.php');

	if(isset($_POST['login_btn'])){
		$database = new Connection();
		$db = $database->open();

		$email = $_POST['useremail'];
		$pw = $_POST['password'];

		if(empty($_POST['useremail']) or empty($_POST['password'])){
			$_SESSION['errormsg'] = "invalid username/email or password";
		}
		try{
			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("SELECT id, username, password, email, role FROM user WHERE (BINARY username=:useremail OR BINARY email=:useremail)");

			//bind
			$sql->bindParam(':useremail', $_POST['useremail']);
			$sql->execute();
			$count=$sql->rowCount();
			$row=$sql->fetch(PDO::FETCH_ASSOC);

			if( $count == 1){		
				if(($_POST['useremail'] == $row['username'] or $_POST['useremail'] == $row['email'])){
					if($row['role'] == "admin"){
						if($pw == $row['password']){
							$_SESSION['user_type'] = "admin";
							header('Location: users/admin/dashboard.php');
						}
						else{
							$_SESSION['errormsg'] = "invalid password";
							header('Location: login.php');
						}
					}
					else if($row['role'] == "customer"){
						if(password_verify($pw, $row['password'])){
							$_SESSION['email'] = $row['email'];
							$_SESSION['pid'] = $row['id'];
							$_SESSION['user_type'] = "customer";
							header('Location: users/user/user_homepage.php');
						}
						else{
							$_SESSION['errormsg'] = "invalid password";
							header('Location: login.php');
						}

					}
					//else if($row['role'] == "staff"){
						//$_SESSION['user_type'] = "staff";
						//header('Location:login.php');
					//}		
				}
				else{
					$_SESSION['errormsg'] = "invalid username or email";
					header('Location: login.php');
				}
			}
			else{
				$_SESSION['errormsg'] = "invalid email or password";
				header('Location: login.php');
			}		
		
		}
		catch(PDOException $e){
			$_SESSION['errormsg'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}	
?>