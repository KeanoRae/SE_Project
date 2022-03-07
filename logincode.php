<?php
    session_start();
	include_once('include/database.php');

	if(isset($_POST['login_btn'])){
		$database = new Connection();
		$db = $database->open();

		$email = $_POST['email'];
		$pw = $_POST['password'];

		if(empty($email) or empty($pw)){
			$_SESSION['errormsg'] = "invalid email or password";
		}
		else{
			
		}

		try{
			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("SELECT id, email, password, role FROM user WHERE BINARY email=:email AND BINARY password=:password LIMIT 1");

			//bind
			$sql->bindParam(':email', $email);
			$sql->bindParam(':password', $pw);
			$sql->execute();
			$count=$sql->rowCount();
			$row=$sql->fetch(PDO::FETCH_ASSOC);

			if( $count == 1){
				$db_email = $row['email'];
				$db_pw = $row['password'];			

				if($email == $db_email AND $pw == $db_pw){
					$_SESSION['user_logged_in'] = true;
					if($row['role'] == "admin"){
						$_SESSION['user_type'] = "admin";
						header('Location: users/admin/dashboard.php');
					}
					else if($row['role'] == "user"){
						$_SESSION['email'] = $row['email'];
						$_SESSION['pid'] = $row['id'];
						$_SESSION['user_type'] = "user";
						header('Location: users/user/user_homepage.php');
					}
					else if($row['role'] == "staff"){
						$_SESSION['user_type'] = "staff";
						$_SESSION['status'] = "Email / Password is Invalid";
						header('Location:login.php');
					}		

				}
				else{
					$_SESSION['errormsg'] = "invalid email or password";
					header('Location: login.php');
				}
			}
			else{
				$_SESSION['errormsg'] = "invalid email or password";
				header('Location: login.php');
			}		
		
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}	
?>