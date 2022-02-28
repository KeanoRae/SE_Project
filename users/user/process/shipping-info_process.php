<?php
    include_once('../../include/database.php');

    $errors=array("fname" => "", 
                    "lname" => "",  
                    "email" => "", 
                    "addr" => "",
                    "brgy" => "",
                    "postal" => "",
                    "city" => "",
                    "region" => "",
                    "phone" => "",
                    "method" => ""
    );

    $var=array(
                "fname" => "", 
                "lname" => "",  
                "email" => "", 
                "addr" => "",
                "brgy" => "",
                "postal" => "",
                "city" => "",
                "region" => "",
                "phone" => "",
                "method" => ""
    );

    //$fname = $lname = $email = $addr = $brgy = $postal = $city = $region = $phone = "";
    
    if(isset($_POST['ship-btn'])){
        $database = new Connection();
        $db = $database->open();

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
            $var['fname'] = test_input($_POST['firstname']);
            $var['fname'] = test_input($_POST['firstname']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$var['fname'])){
                $errors['fname'] = "*Only letters and spaces are allowed";
            }
        }

        //validation for last name
        if(empty($_POST['lastname'])){
            $errors['lname'] = "*Last Name field is Required";
        }
        else{
            $var['lname'] = test_input($_POST['lastname']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$var['lname'])){
                $errors['lname'] = "*Only letters and spaces are allowed";
            }
        }

        //validation for email
        if(empty($_POST['email'])){
            $errors['email'] = "*Email field is Required";
        }
        else{
            $var['email'] = test_input($_POST['email']);
            if (!filter_var($var['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "*Please enter a valid email address";
            }
        }

        //validation for address
        if(empty($_POST['address'])){
            $errors['addr'] = "*Unit or House No. & Street No. field is Required";
        }
        else{
            $var['addr'] = test_input($_POST['address']);
        }

        //validation for baranggay
        if(empty($_POST['baranggay'])){
            $errors['brgy'] = "*Unit or House No. & Street No. field is Required";
        }
        else{
            $var['brgy'] = test_input($_POST['baranggay']);
        }

        //validation for postal
        if(empty($_POST['postal'])){
            $errors['postal'] = "*Postal field is Required";
        }
        else{
            $var['postal'] = test_input($_POST['postal']);
        }

        //validation for city
        if(empty($_POST['city'])){
            $errors['city'] = "*City field is Required";
        }
        else{
            $var['city'] = test_input($_POST['city']);
        }

        //validation for region
        if(empty($_POST['region'])){
            $errors['region'] = "*Region field is Required";
        }
        else{
            $var['region'] = test_input($_POST['region']);
        }
        
        //validation for mobile number
        if(empty($_POST['number'])){
            $errors['phone'] = "*Mobile number field is Required";
        }
        else{
            $var['phone'] = test_input($_POST['number']);
            if (strlen($var['phone']) != 11){
                $errors['phone'] = "*Please enter a valid mobile number";
            }
        }

        //validation for shipping method
        if (empty($_POST['options'])){
            $errors['method'] = "*Shipping Method field is Required";
        }
        else{
            $var['method'] = test_input($_POST['options']);
        }

        $addons = 390;

            if(!in_array("",$var)){
                try{
                    //make use of prepared statement to prevent sql injection
                    $insertsql = $db->prepare("INSERT INTO orders (customer_id, ship_name, email, shipping_address, shipping_city, ship_postal_code, contact_number, shipping_method)
                    VALUES (:uid, CONCAT(:firstname,' ',:lastname), :email, CONCAT(:addr,' ',:brgy), CONCAT(:city,' Region ',:region), :postal, :phone_number, :method)");
                    
                    //bind
                    $insertsql->bindParam(':uid', $_SESSION['pid']);
                    $insertsql->bindParam(':firstname', $var['fname']);
                    $insertsql->bindParam(':lastname', $var['lname']);
                    $insertsql->bindParam(':email', $var['email']);
                    $insertsql->bindParam(':addr', $var['addr']);
                    $insertsql->bindParam(':brgy', $var['brgy']);
                    $insertsql->bindParam(':city', $var['city']);
                    $insertsql->bindParam(':region', $var['region']);
                    $insertsql->bindParam(':postal', $var['postal']);
                    $insertsql->bindParam(':phone_number', $var['phone']);
                    $insertsql->bindParam(':method', $var['method']);
    
                    if($insertsql->execute()){
                        //$sql = $db->prepare("INSERT INTO order_details (order_id, product_id, product_price, add-ons)
                            //SELECT id, customer_id FROM orders WHERE customer_id=:uid ORDER BY id DESC LIMIT 1");
    
    
    
                        header('Location: payment.php');
                    }
                    else{
                        $_SESSION['message'] = "Something wrong happened";
                    }                        	
                }
                catch(PDOException $e){
                    $_SESSION['message'] = $e->getMessage();
                }
            }
            else{
                $_SESSION['message'] = "Please fill out the form!";
            }
        
        //close connection
        $database->close();
    }
?>
