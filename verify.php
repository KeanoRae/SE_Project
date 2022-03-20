<?php
    session_start();
	include_once('include/database.php');
    $database = new Connection();
    $db = $database->open();

	if(isset($_GET['key'])){
        $key = $_GET['key'];

		//verify the verify_key
        $verify_sql = $db->prepare("SELECT verify_key, verify_status FROM user WHERE verify_key=:vkey");
        //bind params
        $verify_sql->bindParam(':vkey', $key);
        $verify_sql->execute();
        $count=$verify_sql->rowCount();
        $row=$verify_sql->fetch(PDO::FETCH_ASSOC);

        if($count == 1){
            if($row['verify_status'] == 0){
                //update the verify_status to 1
                $update_sql = $db->prepare("UPDATE user SET verify_status=1 WHERE verify_key=:vkey");
                //bind param
                $update_sql->bindParam(':vkey', $key);
                $update_sql->execute();
                if($update_sql){
                    $_SESSION['verify_status'] = "Your email has been verified."."<br>"."You can now sign in with your new account";
                    header('Location: login.php');
                }
                else{
                    $_SESSION['verify_status'] = "Verification failed! Please try again.";
                    header('Location: login.php');
                }
            }
            else{
                $_SESSION['verify_status'] = "Your account is already verified. Please login";
                header('Location: login.php');
            }

        }
        else{
            $_SESSION['verify_status'] = "The link is already expired. Please register again.";
            header('Location: login.php');
        }
	}	
    //close connection
    $database->close();
?>