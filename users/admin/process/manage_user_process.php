<?php
    include_once('../../include/database.php');

    $errors=array(
        "fname" => "", 
        "lname" => "", 
        "username" => "",  
        "password" => "",
        "role" => ""
    );

    $var=array(
        "fname" => "",
        "lname" => "",
        "username" => "", 
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

        //validation for username
        if(empty($_POST['username'])){
            $errors['username'] = "Username field is Required";
        }
        else{
            $var['username'] = test_input($_POST['username']);
            $username_check =$db->prepare("SELECT * FROM user WHERE username=:username");
            $username_check->bindParam(':username', $var['username']);
            $username_check->execute();
            $count=$username_check->rowCount();
            if($count == 1){
                $errors['username'] = "Username Already Taken. Please Try Another one.";
            }
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
                $insertsql = $db->prepare("INSERT INTO user (first_name, last_name, username, password, role)
                                            VALUES (:firstname, :lastname, :username, :password, :role)");

                $pw_hash = password_hash($var['password'], PASSWORD_DEFAULT);
                //bind params
                $insertsql->bindParam(':firstname', $var['fname']);
                $insertsql->bindParam(':lastname', $var['lname']);
                $insertsql->bindParam(':username', $var['username']);
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

    if(isset($GET['table_id'])){
        $id = $GET['table_id'];
        //query
        $display_sql = $db->prepare("SELECT first_name, last_name, username, password, role FROM user WHERE id=:id");
        $display_sql->bindParam(':id', $id);
        $display_sql->execute();
        $inform=$display_sql->fetch(PDO::FETCH_ASSOC);
        if($inform){
            $var['fname'] = $inform['first_name'];
            $var['lname'] = $inform['last_name'];
            $var['username'] = $inform['username'];
            $var['password'] = $inform['password'];
            $var['role'] = $inform['role'];
            //header('Location: manage_user.php');
        }
    }
    //close connection
    $database->close();
?>