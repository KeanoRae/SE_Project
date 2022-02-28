<?php
    session_start();
    include_once('include/database.php');

    $errors=array("fname" => "", 
                    "lname" => "",  
                    "email" => "", 
                    "phone" => "",
                    "pw" => ""
            );
    $fname = $lname = $email = $phonenum = $pw = "";
    
    if(isset($_POST['signup_btn'])){
        $database = new Connection();
        $db = $database->open();
        $role = 'user';

        // strips unnecessary characters and backslashes
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        //validation for first name
        if(empty($_POST['firstname'])){
            $errors['fname'] = "*First Name field is Required";
        }
        else{
            $fname = test_input($_POST['firstname']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
                $errors['fname'] = "*Only letters and spaces are allowed";
            }
        }

        //validation for last name
        if(empty($_POST['lastname'])){
            $errors['lname'] = "*Last Name field is Required";
        }
        else{
            $lname = test_input($_POST['lastname']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)){
                $errors['lname'] = "*Only letters and spaces are allowed";
            }
        }

        //validation for email
        if(empty($_POST['email'])){
            $errors['email'] = "*Email field is Required";
        }
        else{
            $email = test_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "*Please enter a valid email address";
            }
            else{
                $email_check =$db->prepare("SELECT * FROM user WHERE email=:email");
                $email_check->bindParam(':email', $email);
                $email_check->execute();
                $count=$email_check->rowCount();
                if($count == 1){
                    $errors['email'] = "*Email Already Taken. Please Try Another one.";
                }
                else{
                    $errors['email'] = "*Email Not Taken";
                }
            }
        }
        
        //validation for mobile number
        if(empty($_POST['number'])){
            $errors['phone'] = "*Mobile number field is Required";
        }
        else{
            $phonenum = test_input($_POST['number']);
            if (strlen($phonenum) != 11){
                $errors['phone'] = "*Please enter a valid mobile number";
            }
        }

        //validation for password
        if(empty($_POST['password'])){
            $errors['pw'] = "*Password field is Required";
        }
        else{
            $pw = test_input($_POST['password']);
        }

        if(!isset($errors)){
            try{
                //make use of prepared statement to prevent sql injection
                $insertsql = $db->prepare("INSERT INTO user (first_name, last_name, email, phone_number, password, role)
                VALUES (:firstname, :lastname, :email, :phone_number, :password, :role)");
    
                //bind
                $insertsql->bindParam(':firstname', $fname);
                $insertsql->bindParam(':lastname', $lname);
                $insertsql->bindParam(':email', $email);
                $insertsql->bindParam(':phone_number', $phonenum);
                $insertsql->bindParam(':password', $pw);
                $insertsql->bindParam(':role', $role);
    
                if($insertsql->execute()){
                    $_SESSION['email'] = $email;
                    header('Location: users/user/user_homepage.php');
                }                        	
            }
            catch(PDOException $e){
                $_SESSION['message'] = $e->getMessage();
            }
        }  
        //close connection
        $database->close();
    }
?>
