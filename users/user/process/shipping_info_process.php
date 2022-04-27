<?php
    include_once('../../include/database.php');
    $database = new Connection();
    $db = $database->open();

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

    //get the image from database
    $get_img = $db->prepare("SELECT img_name, img_path FROM customer_uploads WHERE img_name=:name");
    //bind
    $get_img->bindParam(':name',$_SESSION['upload_img']);
    $get_img->execute();
    $row=$get_img->fetch(PDO::FETCH_ASSOC);
    if($row){
        $img_path = $row['img_path'];
    }

    //for shipping fee
    $luzon=array("Region I", "Region II", "Region III", "Region IV", "Region V", "CAR");
    $visayas=array("Region VI", "Region VII", "Region VIII");
    $mindanao=array("Region IX", "Region X", "Region XI", "Region XII", "Region XIII", "BARMM");

    //$fname = $lname = $email = $addr = $brgy = $postal = $city = $region = $phone = "";
    
    if(isset($_POST['ship-btn'])){
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
                //shipping fee for metro manila
                if($var['region'] == "NCR"){
                    $_SESSION['shipping_fee'] = 135;
                }
                //shipping fee for luzon
                elseif(in_array($var['region'],$luzon)){
                    $_SESSION['shipping_fee'] = 130;
                }
                //shipping fee for visayas
                elseif(in_array($var['region'],$visayas)){
                    $_SESSION['shipping_fee'] = 120;
                }
                //shipping fee for mindanao
                elseif(in_array($var['region'],$mindanao)){
                    $_SESSION['shipping_fee'] = 105;
                }
                $_SESSION['address'] = $var['addr']." ".$var['brgy'];
                $_SESSION['city'] = ucwords($var['city']);
                $_SESSION['postal'] = $var['postal'];
                $_SESSION['region'] = $var['region'];
                $_SESSION['ship_method'] = $var['method'];
                header('Location: payment.php');
            }
    }
    //close connection
    $database->close();
?>
