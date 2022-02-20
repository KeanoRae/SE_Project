<?php
    session_start();
	include_once('include/database.php');

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		if(isset($_POST['login_btn'])){
			$database = new Connection();
			$db = $database->open();
	
			if(empty($_POST['email']) or empty($_POST['password'])){
				$_SESSION['errormsg'] = "invalid email or password";
			}
	
			try{
				//make use of prepared statement to prevent sql injection
				$sql = $db->prepare("SELECT email, password, role FROM user WHERE email=:email AND password=:password LIMIT 1");
	
				//bind
				$sql->bindParam(':email', $_POST['email']);
				$sql->bindParam(':password', $_POST['password']);
				$sql->execute();
				$row=$sql->fetch(PDO::FETCH_ASSOC);
	
				if($row['role'] == "admin"){
					//$_SESSION['username'] = $email_login;
					header('Location: admin/dashboard.html');
				}
				else if($row['role'] == "user"){
					//$_SESSION['cusername'] = $email_login;
					header('Location: user/user_homepage.html');
				}
				else{
					$_SESSION['status'] = "Email / Password is Invalid";
					header('Location: login.php');
				}				
			
			}
			catch(PDOException $e){
				$_SESSION['message'] = $e->getMessage();
			}
	
			//close connection
			$database->close();
		}
		else{
			$_SESSION['message'] = 'Fill up add form first';
		}

	}
	
?>
