<?php
    include_once('../../include/database.php');

    $errors=array(
        "fname" => "", 
        "lname" => "", 
        "username" => "",
        "email" => "",  
        "password" => "",
        "role" => ""
    );

    $var=array(
        "fname" => "",
        "lname" => "",
        "username" => "", 
        "email" => "",
        "password" => "",
        "role" => ""
    );

    $database = new Connection();
    $db = $database->open();

    // strips unnecessary characters and backslashes
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if(isset($_POST['save'])){

        //validation for first name
        if(empty($_POST['fname'])){
            $errors['fname'] = "First Name field is Required";
        }
        else{
            $var['fname'] = test_input($_POST['fname']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$var['fname'])){
                $errors['fname'] = "Only letters and spaces are allowed";
            }
        }

        //validation for last name
        if(empty($_POST['lname'])){
            $errors['lname'] = "Last Name field is Required";
        }
        else{
            $var['lname'] = test_input($_POST['lname']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$var['lname'])){
                $errors['lname'] = "Only letters and spaces are allowed";
            }
        }

        //validation for email
        if(empty($_POST['email'])){
            $errors['email'] = "Email field is Required";
        }
        else{
            $var['email'] = test_input($_POST['email']);
            if (!filter_var($var['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Please enter a valid email address";
            }
            else{
                $email_check =$db->prepare("SELECT * FROM user WHERE email=:email");
                $email_check->bindParam(':email', $var['email']);
                $email_check->execute();
                $count=$email_check->rowCount();
                if($count == 1){
                    $errors['email'] = "Email Already Taken. Please Try Another one.";
                }
            }
        }

        //validation for username
        if(empty($_POST['username'])){
            $errors['username'] = "Username field is Required";
        }
        else{
            $var['username'] = test_input($_POST['username']);
        }

        //validation for password
        if(empty($_POST['password'])){
            $errors['password'] = "Password field is Required";
        }
        else{
            $var['password'] = test_input($_POST['password']);
        }
        
        //validation for role
        if(empty($_POST['role'])){
            $errors['role'] = "Please select 1 role";
        }
        else{
            $var['role'] = $_POST['role'];
        }

        if(!in_array("",$var)){
            try{
                //query to add new user
                $insertsql = $db->prepare("INSERT INTO user (first_name, last_name, email, username, password, role)
                                            VALUES (:firstname, :lastname, :email, :username, :password, :role)");

                $pw_hash = password_hash($var['password'], PASSWORD_DEFAULT);
                //bind params
                $insertsql->bindParam(':firstname', $var['fname']);
                $insertsql->bindParam(':lastname', $var['lname']);
                $insertsql->bindParam(':username', $var['username']);
                $insertsql->bindParam(':email', $var['email']);
                $insertsql->bindParam(':password', $pw_hash);
                $insertsql->bindParam(':role', $var['role']);
                $insertsql->execute();
    
                if($insertsql){
                    header('Location: manage_user.php');
                }
                else{
                    $_SESSION['add_user'] = "An error has occured. Please try again";
                }                    	
            }
            catch(PDOException $e){
                $_SESSION['add_user'] = $e->getMessage();
            }
        }
    }

    //close connection
    $database->close();
?>