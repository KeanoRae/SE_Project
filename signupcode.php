<?php
    session_start();
	include_once('include/database.php');

	if(isset($_POST['signup_btn'])){
        $database = new Connection();
		$db = $database->open();
        $role = 'user';

        $errors[]= (empty($_POST['firstname'])) ? "First Name field is Required" : "";
        $errors[]= (empty($_POST['lastname'])) ? "First Name field is Required" : "";
        if(empty($_POST['email'])){
            $errors[]="email field is Required";
        }
        else{
            $email_check =$db->prepare("SELECT * FROM user WHERE email=:email");
            $email_check->bindParam(':email', $_POST['email']);
            $email_check->execute();
            $count=$email_check->rowCount();
            $errors[] = (($count==1)) ? "Email Already Taken. Please Try Another one." : "";

        }
        if(empty($_POST['number'])){
            $errors[]="email field is Required";
        }



        try{
            $email_check =$db->prepare("SELECT COUNT(*) FROM user WHERE email=:email");
            $email_check->bindParam(':email', $_POST['email']);
            $email_check->execute();
            $count=$email_check->fetchColumn();
            if($count>0){
                $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
                header('Location: signup.php');  
            }
            else if($count==0){
                //make use of prepared statement to prevent sql injection
                $insertsql = $db->prepare("INSERT INTO user (first_name, last_name, email, phone_number, password, role)
                VALUES (:firstname, :lastname, :email, :username, :password, :role)");

                //bind
                $insertsql->bindParam(':firstname', $_POST['firstname']);
                $insertsql->bindParam(':lastname', $_POST['lastname']);
                $insertsql->bindParam(':email', $_POST['email']);
                $insertsql->bindParam(':phone_number', $_POST['number']);
                $insertsql->bindParam(':password', $_POST['password']);
                $insertsql->bindParam(':role', $role);

                if($insertsql->execute()){
                    header('Location: user/user_homepage.html');
                }                        
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
?>
