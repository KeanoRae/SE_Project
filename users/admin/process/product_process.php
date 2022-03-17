<?php
    include_once('../../../include/database.php');
    $database = new Connection();
    $db = $database->open();
    
    if(isset($_POST['delete-product'])){
        $sql = $db->prepare("DELETE FROM product WHERE id=:pid");
        //bind
        $sql->bindParam(':pid', $_GET['id']);
        if($sql->execute()){
            header('Location: ../dashboard.php');
        }           
    }
    //declare array variable for error and value of each text input in page 1
    $var1 = array("productname" => "","productdetails" => "", "category" => "");
    $error1 = array("productname" => "","productdetails" => "", "category" => "", "file" => "");

    if(isset($_POST['next'])){

        //function for removing unnecessary characters on text input
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //display an error if product name field is empty
        if(empty($_POST['productname'])){
            $error1['productname'] = "Product Name field is Required";
        } else {
            //check for duplicate product name
            $checkname = $db->prepare("SELECT product_name FROM product WHERE product_name=:productname");
            $checkname->bindParam(':productname', $_POST['productname']);
            $checkname->execute();
            $count=$checkname->rowCount();
            //display an error if product name exists
            if($count == 1){
                $error1['productname'] = "*Product Name Already Exists. Please Try Another one.";
            }
            $var1['productname'] = test_input($_POST['productname']);

        }

        //display an error if product name field is empty
        if(empty($_POST['productdetails'])){
            $error1['productdetails'] = "Product Details field is Required";
        } else {
            $var1['productdetails'] = test_input($_POST['productdetails']);
        }

        //display an error if product name field is empty
        if(empty($_POST['category'])){
            $error1['category'] = "Category field is Required";
        } else {
            $var1['category'] = test_input($_POST['category']);
        }

        //declare variables that store image information
        $fileName = $_FILES['cover']['name'];
        $fileType = $_FILES['cover']['type'];
        $fileError = $_FILES['cover']['error'];
        $fileSize = $_FILES['cover']['size'];
        $fileTmpPath = $_FILES['cover']['tmp_name'];
        
        //get the extension of the image
        $get_ext = explode(".",$fileName);
        $img_ext = end($get_ext);
        $extension = array("jpg", "jpeg", "png");

        //display an error if no file is chosen
        if(empty($fileName)){
            $error1['file'] = "Upload cover image is required";
        }

        //check if the text inputs are empty
        if(!in_array("", $var1)){
            $_SESSION['productname'] = $var1['productname'];
            $_SESSION['productdetails'] = $var1['productdetails'];
            $_SESSION['category'] = $var1['category'];

            //check if file has image extension
            if(in_array($img_ext,$extension)){
                //check for error
                if($fileError === 0){
                    //check for size limit
                    if($fileSize <= 10 * 1024 * 1024){
                        move_uploaded_file($fileTmpPath, '../../../assets/images/temp_storage/'.$fileName);
                        $_SESSION['fileName'] = $fileName;
                        header('Location: addproduct2.php');
                    } else{
                        $error1['file'] = "File size exceeded! Maximum size is 10mb only.";
                    }
                } else{
                    $error1['file'] = "Error ".$fileError." has occured.";
                }
            } else{
                $error1['file'] = "File extension not applicable. Please upload image files only.";
            }
        }
    }

    //declare array variable for error and value of each text input in page 2
    $var2 = array("1ch" => "", "2ch" => "", "addchar" => "", "add_dedication" => "");
    $error2 = array("1ch" => "", "2ch" => "", "addchar" => "", "add_dedication" => "");

    if(isset($_POST['add-product'])){

        //display an error if 1 Character price field is empty
        if(empty($_POST['1ch'])){
            $error2['1ch'] = "1 Character field is Required";
        } else {
            $var2['1ch'] = $_POST['1ch'];
        }

        //display an error if 2 Character price field is empty
        if(empty($_POST['2ch'])){
            $error2['2ch'] = "2 Character field is Required";
        } else {
            $var2['2ch'] = $_POST['2ch'];
        }

        //display an error if Add character price field is empty
        if(empty($_POST['addchar'])){
            $error2['addchar'] = "Add Character Character field is Required";
        } else {
            $var2['addchar'] = $_POST['addchar'];
        }

        //display an error if Add dedication price field is empty
        if(empty($_POST['add_dedication'])){
            $error2['add_dedication'] = "Add Dedication Character field is Required";
        } else {
            $var2['add_dedication'] = $_POST['add_dedication'];
        }

        //check if the text inputs are empty
        if(!in_array("", $var2)){
            $sql2 = $db->prepare("INSERT INTO product (product_name, product_cover, product_details, 1ch_price, 2ch_price, add_char, add_dedication, category)
                VALUES (:product_name, :productcover, :productdetails, :1_ch, :2_ch, :add_char, :add_dedication, :category)");
            //bind param
            $sql2->bindParam(':product_name', $_SESSION['productname']);
            $sql2->bindParam(':productcover', $_SESSION['fileName']);
            $sql2->bindParam(':productdetails', $_SESSION['productdetails']);
            $sql2->bindParam(':1_ch', $var2['1ch']);
            $sql2->bindParam(':2_ch', $var2['2ch']);
            $sql2->bindParam(':add_char', $var2['addchar']);
            $sql2->bindParam(':add_dedication', $var2['add_dedication']);
            $sql2->bindParam(':category', $_SESSION['category']);

            //remove the file extension and convert all letters into lowercase and add dash in between
            $ext = explode('.',$_SESSION['fileName']);
            $foldername = str_replace(" ","-",strtolower(reset($ext)))."/cover";
            //create a new directory for the new product
            $path = "../../../assets/images/admin-uploads/";
            //checks if directory exists
            if(!file_exists($path.$foldername) and !is_dir($path.$foldername)){
                mkdir($path.$foldername, 0777, true);
            } else{
                $_SESSION['error'] = "Folder already exists!";
            }

            

            //get the uploaded file from the temporary storage and place it to the new directory
            $file = file_get_contents("../../../assets/images/temp_storage/".$_SESSION['fileName']);
            file_put_contents($path.$foldername."/".$_SESSION['fileName'], $file);
            $tmp_path = "../../../assets/images/temp_storage/";

            if($sql2->execute() and unlink($tmp_path.$_SESSION['fileName'])){
                header('Location: ../dashboard.php');
                unset($_SESSION['fileName']);
                unset($_SESSION['productname']);
                unset($_SESSION['productdetails']);
                unset($_SESSION['category']);
            }
            else {
                $_SESSION['upload_err'] = "An error has occured. Please try again";
            }
        }
        else{
            $_SESSION['upload_err'] = "Please fill out all the inputs";
        }

    }

    //close connection
    $database->close();

?>