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
    $error1 = array("productname" => "","productdetails" => "", "category" => "", "cover" => "", "carousel" => "");

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
        } 
        else {
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
        } 
        else {
            $var1['productdetails'] = test_input($_POST['productdetails']);
        }

        //display an error if product name field is empty
        if(empty($_POST['category'])){
            $error1['category'] = "Category field is Required";
        } 
        else {
            $var1['category'] = test_input($_POST['category']);
        }
        
        //get the extension of the image
        $get_ext = explode(".",$_FILES['cover']['name']);
        $img_ext = end($get_ext);
        $extension = array("jpg", "jpeg", "png");

        //display an error if no cover image file is chosen
        if(empty($_FILES['cover']['name'])){
            $error1['cover'] = "Upload cover image is required";
        }

        //display an error if no product image file is chosen
        if(empty($_FILES['carousel_img']['name'][0])){
            $error1['carousel'] = "Upload product image is required";
        }

        //check if the text inputs are empty
        if(!in_array("", $var1)){
            $_SESSION['productname'] = $var1['productname'];
            $_SESSION['productdetails'] = $var1['productdetails'];
            $_SESSION['category'] = $var1['category'];

            //check if cover image file has image extension
            if(in_array($img_ext,$extension)){
                //check for error
                if($_FILES['cover']['error'] === 0){
                    //check for size limit
                    if($_FILES['cover']['size'] <= 10 * 1024 * 1024){
                        //temporary path
                        $cover_path = '../../../assets/images/admin_temp_storage/'.$_FILES['cover']['name'];
                        //check if the file was moved from the temporary path to new path
                        if(move_uploaded_file($_FILES['cover']['tmp_name'], $cover_path)){
                            $_SESSION['cover_img'] = $_FILES['cover']['name'];
                            header('Location: addproduct2.php');
                        } 
                        else{
                            $error1['cover'] = "Upload failed. Please try again.";
                        }
                    } 
                    else{
                        $error1['cover'] = "File size exceeded! Maximum size is 10mb only.";
                    }
                } 
                else{
                    $error1['cover'] = "Error ".$_FILES['cover']['error']." has occured.";
                }
            } 
            else{
                $error1['cover'] = "File extension not applicable. Please upload image files only.";
            }

            //count total files uploaded from product image
            $count = count($_FILES['carousel_img']['name']);

            //loop all product image file
            for($i = 0; $i < $count; $i++){
                //get the extension of the image
                $get_ext2 = explode(".",$_FILES['carousel_img']['name'][$i]);
                $img_ext2 = end($get_ext2);

                //change the file name
                $newname = str_replace(" ","-",strtolower($_SESSION['productname'])).$_FILES['carousel_img']['name'][$i];

                //check if product image file has image extension
                if(in_array($img_ext2,$extension)){
                    //check for error
                    if($_FILES['carousel_img']['error'][$i] === 0){
                        //check for size limit
                        if($_FILES['carousel_img']['size'][$i] <= 10 * 1024 * 1024){
                            //temporary path
                            $product_path ='../../../assets/images/admin_temp_storage/'.$newname;
                            //check if the file was moved from the temporary path to new path
                            if(move_uploaded_file($_FILES['carousel_img']['tmp_name'][$i], $product_path)){
                                $_SESSION['carousel_img'][] = $newname;
                                header('Location: addproduct2.php');
                            } 
                            else {
                                $error1['carousel'] = "Upload failed. Please try again.";
                            }
                        } 
                        else{
                            $error1['carousel'] = "File size exceeded! Maximum size is 10mb only.";
                        }
                    } 
                    else{
                        $error1['carousel'] = "Error ".$_FILES['carousel_img']['error'][$i]." has occured.";
                    }
                } 
                else{
                    $error1['carousel'] = "File extension not applicable. Please upload image files only.";
                }

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
        } 
        else {
            $var2['1ch'] = $_POST['1ch'];
        }

        //display an error if 2 Character price field is empty
        if(empty($_POST['2ch'])){
            $error2['2ch'] = "2 Character field is Required";
        } 
        else {
            $var2['2ch'] = $_POST['2ch'];
        }

        //display an error if Add character price field is empty
        if(empty($_POST['addchar'])){
            $error2['addchar'] = "Add Character Character field is Required";
        } 
        else {
            $var2['addchar'] = $_POST['addchar'];
        }

        //display an error if Add dedication price field is empty
        if(empty($_POST['add_dedication'])){
            $error2['add_dedication'] = "Add Dedication Character field is Required";
        } 
        else {
            $var2['add_dedication'] = $_POST['add_dedication'];
        }

        //check if the text inputs are empty
        if(!in_array("", $var2)){
            //create the folder name
            $foldername = str_replace(" ","-",strtolower($_SESSION['productname']))."/cover";
            //create a new directory for the new product
            $new_cover_path = "../../../assets/images/admin-uploads/".$foldername;
            //checks if directory exists
            if(!file_exists($new_cover_path) or !is_dir($new_cover_path)){
                //create the directory
                mkdir($new_cover_path.'/', 0777, true);

                //get the uploaded file from the temporary storage and place it to the new directory
                $coverFile = file_get_contents("../../../assets/images/admin_temp_storage/".$_SESSION['cover_img']);
                $move_cover_path = $new_cover_path."/".$_SESSION['cover_img'];
                file_put_contents($move_cover_path, $coverFile);
                //path stored for database
                $cover_dbpath = "assets/images/admin-uploads/".$foldername."/".$_SESSION['cover_img'];
                //temporary storage
                $tmp_path = "../../../assets/images/admin_temp_storage/";

                //query to insert new product
                $sql2 = $db->prepare("INSERT INTO product (product_name, product_cover, product_cover_path, product_details, 1ch_price, 2ch_price, add_char, add_dedication, category)
                                        VALUES (:product_name, :productcover, :productcoverpath, :productdetails, :1_ch, :2_ch, :add_char, :add_dedication, :category)");
                //bind param
                $sql2->bindParam(':product_name', $_SESSION['productname']);
                $sql2->bindParam(':productcover', $_SESSION['cover_img']);
                $sql2->bindParam(':productcoverpath', $cover_dbpath);
                $sql2->bindParam(':productdetails', $_SESSION['productdetails']);
                $sql2->bindParam(':1_ch', $var2['1ch']);
                $sql2->bindParam(':2_ch', $var2['2ch']);
                $sql2->bindParam(':add_char', $var2['addchar']);
                $sql2->bindParam(':add_dedication', $var2['add_dedication']);
                $sql2->bindParam(':category', $_SESSION['category']);

                if($sql2->execute() and unlink($tmp_path.$_SESSION['cover_img'])){
                    //get the id of the new product
                    $productid = $db->prepare("SELECT id FROM products ORDER BY id DESC LIMIT 1");

                    //query for product image
                    $productimg = $db->prepare("INSERT INTO product_carousel (product_id, carousel_image, carousel_image_path) VALUES (?,?,?)");

                    //create a prefix to uniquely identify each product's images
                    $prefix = str_replace(" ","-",strtolower($_SESSION['productname']));
                    //create a new directory for the new product
                    $new_product_path = "../../../assets/images/admin-uploads/".$prefix."/";

                    //loop all product item from temporary storage
                    foreach($_SESSION['carousel_img'] as $key => $value){
                        //checks if directory exists
                        if(!file_exists($new_product_path) or !is_dir($new_product_path)){
                            $_SESSION['product_error'] = "Directory doesn't exists!";
                            header('Location: addproduct2.php');
                        } 
                        else{
                            //get the uploaded file from the temporary storage and place it to the new directory
                            $productFile = file_get_contents("../../../assets/images/admin_temp_storage/".$value);
                            $move_product_path = $new_product_path.$value;
                            file_put_contents($move_product_path, $productFile);
                            //path stored for database
                            $product_dbpath = "assets/images/admin-uploads/".$prefix."/".$value;
                            $tmp_path = "../../../assets/images/admin_temp_storage/";

                            //execute the query
                            $productimg->execute(array($productid,$value,$product_dbpath));

                            if(unlink($tmp_path.$value)){
                                unset($_SESSION['cover_img']);
                                unset($_SESSION['carousel_img']);
                                unset($_SESSION['productname']);
                                unset($_SESSION['productdetails']);
                                unset($_SESSION['category']);
                                header('Location: ../dashboard.php');
                            } 
                            else{
                                $_SESSION['product_error'] = "An error has occured. Please try again";
                                header('Location: addproduct.php');
                            }
                        }
                    }
                } 
                else {
                    $_SESSION['cover_error'] = "An error has occured. Please try again";
                    header('Location: addproduct2.php');
                }
            } 
            else{
                $_SESSION['cover_error'] = "directory already exists!";
                header('Location: addproduct2.php');
            }    
        } 
        else{
            $_SESSION['upload_err'] = "Please fill out all the inputs";
        }
    }
    //close connection
    $database->close();

?>