<?php
    include_once('../../include/database.php');

    $errors=array(
                    "addr" => "",
                    "brgy" => "",
                    "postal" => "",
                    "city" => "",
                    "region" => "",
                    "method" => ""
    );

    $var=array(
                "addr" => "",
                "brgy" => "",
                "postal" => "",
                "city" => "",
                "region" => "",
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

        //validation for house and street number
        if(empty($_POST['address'])){
            $errors['addr'] = "*Unit or House No. & Street No. field is Required";
        }
        else{
            $var['addr'] = test_input($_POST['address']);
        }

        //validation for baranggay
        if(empty($_POST['barangay'])){
            $errors['brgy'] = "*Barangay is Required";
        }
        else{
            $var['brgy'] = test_input($_POST['barangay']);
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

        //validation for shipping method
        if (empty($_POST['options'])){
            $errors['method'] = "*Shipping Method field is Required";
        }
        else{
            $var['method'] = test_input($_POST['options']);
        }


            if(!in_array("",$var)){
                $_SESSION['address'] = $var['addr']." ".$var['brgy'];
                $_SESSION['city'] = ucwords($var['city']);
                $_SESSION['postal'] = $var['postal'];
                $_SESSION['region'] = $var['region'];
                $_SESSION['ship_method'] = $var['method'];
                header('Location: payment.php');
            }
                
        
        //close connection
        $database->close();
    }
?>
