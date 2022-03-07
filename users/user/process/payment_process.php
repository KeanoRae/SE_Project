<?php
    include_once('../../include/database.php');

    $errors=array("name" => "", 
                    "email" => "", 
                    "addr" => "",
                    "ship_method" => "",
                    "pay_method" => ""
            );

    $var=array("name" => "",
                "email" => "",
                "addr" => "",
                "ship_method" => "",
                "pay_method" => ""
        );
    //$name = $email = $addr = $ship_method = $pay_method = "";
    
    if(isset($_POST['submit'])){
        $database = new Connection();
        $db = $database->open();

        // strips unnecessary characters and backslashes
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //validation for last name
        if(empty($_POST['name'])){
            $errors['name'] = "*Name field is Required";
        }
        //else{
            $var['name'] = test_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$var['name'])){
                $errors['name'] = "*Only letters and spaces are allowed";
            }
        //}

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

        //validation for shipping address
        if(empty($_POST['addr'])){
            $errors['addr'] = "*Shipping address field is Required";
        }
        else{
            $var['addr'] = test_input($_POST['addr']);
        }

        //validation for shipping method
        if(empty($_POST['method'])){
            $errors['method'] = "*Shipping Method field is Required";
        }
        else{
            $var['ship_method'] = test_input($_POST['method']);
        }

        //validation for payment method
        if(empty($_POST['payment-option'])){
            $errors['pay_method'] = "*Payment Method field is Required";
        }
        else{
            $var['pay_method'] = test_input($_POST['payment-option']);
        }
           
        if(!in_array("",$var)){
            try{
                $sql = $db->prepare("INSERT INTO payment (customer_id, payment_type) VALUES (:uid, :type)");

                //bind
                $sql->bindParam(':uid', $_SESSION['pid']);
                $sql->bindParam(':type', $var['pay_method']);

                if($sql->execute()){
                    unset($_SESSION['product_name']);
                    unset($_SESSION['price']);
                    unset($_SESSION['qty']);
                    unset($_SESSION['subtotal']);
                    header('Location: account.php');
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
            $_SESSION['msg'] = "Please fill out the form!";
        }
    
    //close connection
    $database->close();
    }
?>
