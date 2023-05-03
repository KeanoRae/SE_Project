<?php
    include_once('../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    $errors=array(
        "addr" => "",
        "brgy" => "",
        "postal" => "",
        "city" => "",
        "province" => "",
        "method" => ""
    );

    $var=array(
        "addr" => "",
        "brgy" => "",
        "postal" => "",
        "city" => "",
        "province" => "",
        "method" => ""
    );

    //get the image from database
    $get_img = $db->prepare("SELECT img_name, img_path FROM orders_uploads WHERE img_name=:name");
    //bind
    $get_img->bindParam(':name', $_SESSION['upload_img']);
    $get_img->execute();
    $row=$get_img->fetch(PDO::FETCH_ASSOC);
    if($row){
        $_SESSION['img_path'] = $row['img_path'];
    }

    //for shipping fee
    $luzon=array("NCR, 2nd District Province","NCR, 3rd District Province","NCR, 4th District Province","NCR, City of Manila, 1st District Province",
                "Abra Province","Apayao Province","Benguet Province","Ifugao Province","Kalinga Province","Mountain Province",
                "Ilocos Norte Province","Ilocos Sur Province","La Union Province","Pangasinan Province",
                "Batanes Province","Cagayan Province","Isabela Province","Nueva Vizcaya Province","Quirino Province",
                "Aurora Province","Bataan Province","Bulacan Province","Nueva Ecija Province","Pampanga Province","Tarlac Province","Zambales Province",
                "Batangas Province","Cavite Province","Laguna Province","Quezon Province","Rizal Province",
                "Marinduque Province","Occidental Mindoro Province","Palawan Province","Romblon Province",
                "Albay Province","Camarines Norte Province","Camarines Sur Province","Catanduanes Province","Masbate Province",);

    $visayas=array("Aklan Province","Antique Province","Capiz Province","Guimaras Province","Iloilo Province","Negros Occidental Province",
                "Bohol Province","Cebu Province","Negros Oriental Province","Siquijor Province",
                "Biliran Province","Eastern Samar Province","Leyte Province","Northern Samar Province","Samar Province","Southern Leyte Province"
                );

    $mindanao=array("Zamboanga del Norte Province","Zamboanga del Sur Province","Zamboanga Sibugay Province",
                "Bukidnon Province","Camiguin Province","Lanao del Norte Province","Misamis Occidental Province","Misamis Oriental Province",
                "Davao de Oro Province","Davao del Norte Province","Davao del Sur Province","Davao Occidental Province","Davao Oriental Province",
                "Cotabato Province","Sarangani Province","South Cotabato Province","Sultan Kudarat Province",
                "Agusan del Norte Province","Agusan del Sur Province","Dinagat Islands Province","Surigao del Norte Province","Surigao del Sur Province",
                "Basilan Province","Lanao del Sur Province","Maguindanao Province","Sulu Province","Tawi-Tawi Province"
                );

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

        //validation for region
        if(empty($_POST['province'])){
            $errors['province'] = "*Province field is Required";
        }
        else{
            $var['province'] = test_input($_POST['province']);
        }

        //validation for city
        if(empty($_POST['city'])){
            $errors['city'] = "*City field is Required";
        }
        else{
            $var['city'] = test_input($_POST['city']);
        }

        //validation for shipping method
        if (empty($_POST['options'])){
            $errors['method'] = "*Shipping Method field is Required";
        }
        else{
            $var['method'] = test_input($_POST['options']);
        }


            if(!in_array("",$var)){
                //shipping fee for luzon
                if(in_array($var['province'],$luzon)){
                    $_SESSION['shipping_fee'] = 130;
                }
                //shipping fee for visayas
                elseif(in_array($var['province'],$visayas)){
                    $_SESSION['shipping_fee'] = 120;
                }
                //shipping fee for mindanao
                elseif(in_array($var['province'],$mindanao)){
                    $_SESSION['shipping_fee'] = 105;
                }
                $_SESSION['address'] = $var['addr']." ".$var['brgy'];
                $_SESSION['city'] = ucwords($var['city']);
                $_SESSION['postal'] = $var['postal'];
                $_SESSION['province'] = $var['province'];
                $_SESSION['ship_method'] = $var['method'];
                header('Location: payment.php');
            }
    }
    //close connection
    $database->close();
?>
