<?php
    include_once('../../include/database.php');
    $database = new Connection();
    $db = $database->open();
    
    if(isset($_POST['delete_product'])){
        $sql = $db->prepare("DELETE FROM product WHERE id=:pid");
        //bind
        $sql->bindParam(':pid', $_POST['modal_id']);
        if($sql->execute()){
            header('Location: admin-product.php');
        }           
    }
    //declare array variable for error and value of each text input in page 1
    $var = array("productname" => "","size" => "", "category" => "", "medium" => "", "material" => "",
                    "1ch" => "", "2ch" => "", "addchar" => "", "add_dedication" => "");
    $error = array("productname" => "","size" => "", "category" => "", "medium" => "", "material" => "", "cover" => "", "sample" => "",
                    "1ch" => "", "2ch" => "", "addchar" => "", "add_dedication" => "");

    if(isset($_POST['add_product'])){

        //function for removing unnecessary characters on text input
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //display an error if product name field is empty
        if(empty($_POST['productname'])){
            $error['productname'] = "Product Name field is Required";
        } 
        else {
            //check for duplicate product name
            $checkname = $db->prepare("SELECT product_name FROM product WHERE product_name=:productname");
            $checkname->bindParam(':productname', $_POST['productname']);
            $checkname->execute();
            $count=$checkname->rowCount();
            //display an error if product name exists
            if($count == 1){
                $error['productname'] = "*Product Name Already Exists. Please Try Another one.";
            }
            $var['productname'] = test_input($_POST['productname']);
        }

        //display an error if size field is empty
        if(empty($_POST['size'])){
            $error['size'] = "Product Details field is Required";
        } 
        else {
            $var['size'] = test_input($_POST['size']);
        }

        //display an error if category field is empty
        if(empty($_POST['category'])){
            $error['category'] = "Category field is Required";
        } 
        else {
            $var['category'] = test_input($_POST['category']);
        }

        //display an error if medium field is empty
        if(empty($_POST['medium'])){
            $error['medium'] = "medium field is Required";
        } 
        else {
            $var['medium'] = test_input($_POST['medium']);
        }

        //display an error if material field is empty
        if(empty($_POST['material'])){
            $error['material'] = "material field is Required";
        } 
        else {
            $var['material'] = test_input($_POST['material']);
        }

        //display an error if 1 Character price field is empty
        if(empty($_POST['1ch'])){
            $error['1ch'] = "1 Character field is Required";
        } 
        else {
            $var['1ch'] = $_POST['char1'];
        }

        //display an error if 2 Character price field is empty
        if(empty($_POST['2ch'])){
            $error['2ch'] = "2 Character field is Required";
        } 
        else {
            $var['2ch'] = $_POST['char2'];
        }

        //display an error if Add character price field is empty
        if(empty($_POST['addchar'])){
            $error['addchar'] = "Add Character Character field is Required";
        } 
        else {
            $var['addchar'] = $_POST['add_char'];
        }

        //display an error if Add dedication/description price field is empty
        if(empty($_POST['add_dedication'])){
            $error['add_dedication'] = "Add Dedication Character field is Required";
        } 
        else {
            $var['add_dedication'] = $_POST['add_desc'];
        }

        //display an error if no cover image file is chosen
        if(empty($_FILES['cover']['name'])){
            $error['cover'] = "Upload cover image is required";
        }

        //display an error if no product image file is chosen
        if(empty($_FILES['sample']['name'][0])){
            $error['sample'] = "Upload product image is required";
        }

        //get the extension of the image
        $get_ext = explode(".",$_FILES['cover']['name']);
        $img_ext = end($get_ext);
        $extension = array("jpg", "jpeg", "png");

        //check if the text inputs are empty
        if(!in_array("", $var)){
            //create the folder name
            $foldername = str_replace(" ","-",strtolower($var['productname']))."/cover";
            //create a new directory for the new product
            $new_cover_path = "../../assets/images/admin-uploads/".$foldername;
            //checks if directory exists
            if(!file_exists($new_cover_path) or !is_dir($new_cover_path)){
                //create the directory
                mkdir($new_cover_path.'/', 0777, true);

                //check if cover image file has image extension
                if(in_array($img_ext,$extension)){
                    //check for error
                    if($_FILES['cover']['error'] === 0){
                        //check for size limit
                        if($_FILES['cover']['size'] <= 10 * 1024 * 1024){
                            //move to folder
                            $cover_img = $new_cover_path.$_FILES['cover']['name'];
                            //check if the file was moved to cover path folder
                            if(move_uploaded_file($_FILES['cover']['tmp_name'], $cover_img)){
                                $cover_dbpath = "assets/images/admin-uploads/".$foldername."/".$_FILES['cover']['name'];

                                //count total files uploaded from product image
                                $count = count($_FILES['sample']['name']);

                                //loop all product sample image file
                                for($i = 0; $i < $count; $i++){
                                    //get the extension of the image
                                    $get_ext2 = explode(".",$_FILES['sample']['name'][$i]);
                                    $img_ext2 = end($get_ext2);

                                    //change the file name
                                    $sample_img = str_replace(" ","-",strtolower($var['productname'])).$_FILES['sample']['name'][$i];

                                    //check if product image file has image extension
                                    if(in_array($img_ext2,$extension)){
                                        //check for error
                                        if($_FILES['sample']['error'][$i] === 0){
                                            //check for size limit
                                            if($_FILES['sample']['size'][$i] <= 10 * 1024 * 1024){
                                                //move to folder
                                                $product_path =$foldername.$sample_img;
                                                //check if the file was moved to folder
                                                if(move_uploaded_file($_FILES['sample']['tmp_name'][$i], $product_path)){
                                                    $sample_arr[] = $sample_img;

                                                    //query to insert new product
                                                    $sql = $db->prepare("INSERT INTO product (product_name, product_cover, product_cover_path, 1ch_price, 2ch_price, add_char, add_dedication)
                                                    VALUES (:product_name, :productcover, :productcoverpath, :1_ch, :2_ch, :add_char, :add_dedication)");
                                                    //bind param
                                                    $sql->bindParam(':product_name', $var['productname']);
                                                    $sql->bindParam(':productcover', $_FILES['cover']['name']);
                                                    $sql->bindParam(':productcoverpath', $cover_dbpath);
                                                    $sql->bindParam(':1_ch', $var['char1']);
                                                    $sql->bindParam(':2_ch', $var['char2']);
                                                    $sql->bindParam(':add_char', $var['add_char']);
                                                    $sql->bindParam(':add_dedication', $var['add_desc']);

                                                    if($sql->execute() and unlink($tmp_path.$_SESSION['cover_img'])){
                                                        //get the id of the new product
                                                        $productid_sql = $db->prepare("SELECT id FROM product ORDER BY id DESC LIMIT 1");
                                                        $productid_sql->execute();
                                                        $get_id = $productid_sql->fetch(PDO::FETCH_ASSOC);
                                                        $product_id = $get_id['id'];
                                                        //print_r($product_id);

                                                        //query for product image
                                                        $productimg = $db->prepare("INSERT INTO product_carousel (product_id, carousel_image, carousel_image_path) VALUES (?,?,?)");

                                                        //create a prefix to uniquely identify each product's images
                                                        $prefix = str_replace(" ","-",strtolower($_SESSION['productname']));
                                                        //create a new directory for the new product
                                                        $new_product_path = "../../../assets/images/admin-uploads/".$prefix."/";

                                                        //loop all product item from temporary storage
                                                        foreach($_SESSION['sample'] as $key => $value){
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
                                                                $productimg->execute(array($product_id,$value,$product_dbpath));

                                                                if(unlink($tmp_path.$value)){
                                                                    unset($_SESSION['cover_img']);
                                                                    unset($_SESSION['sample']);
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
                                                else {
                                                    $error['sample'] = "Upload failed. Please try again.";
                                                }
                                            } 
                                            else{
                                                $error['sample'] = "File size exceeded! Maximum size is 10mb only.";
                                            }
                                        } 
                                        else{
                                            $error['sample'] = "Error ".$_FILES['sample']['error'][$i]." has occured.";
                                        }
                                    } 
                                    else{
                                        $error['sample'] = "File extension not applicable. Please upload image files only.";
                                    }
                                }  
                            } 
                            else{
                                $error['cover'] = "Upload failed. Please try again.";
                            }
                        } 
                        else{
                            $error['cover'] = "File size exceeded! Maximum size is 10mb only.";
                        }
                    } 
                    else{
                        $error['cover'] = "Error ".$_FILES['cover']['error']." has occured.";
                    }
                } 
                else{
                    $error['cover'] = "File extension not applicable. Please upload image files only.";
                }  
            } 
            else{
                $_SESSION['cover_error'] = "directory already exists!";
                header('Location: admin-product.php');
            } 
        } 
        else{
            $_SESSION['upload_err'] = "Please fill out all the inputs";
        }

        //check if the text inputs are empty
        if(!in_array("", $var)){

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
                            $error['cover'] = "Upload failed. Please try again.";
                        }
                    } 
                    else{
                        $error['cover'] = "File size exceeded! Maximum size is 10mb only.";
                    }
                } 
                else{
                    $error['cover'] = "Error ".$_FILES['cover']['error']." has occured.";
                }
            } 
            else{
                $error['cover'] = "File extension not applicable. Please upload image files only.";
            }

            //count total files uploaded from product image
            $count = count($_FILES['sample']['name']);

            //loop all product image file
            for($i = 0; $i < $count; $i++){
                //get the extension of the image
                $get_ext2 = explode(".",$_FILES['sample']['name'][$i]);
                $img_ext2 = end($get_ext2);

                //change the file name
                $newname = str_replace(" ","-",strtolower($_SESSION['productname'])).$_FILES['sample']['name'][$i];

                //check if product image file has image extension
                if(in_array($img_ext2,$extension)){
                    //check for error
                    if($_FILES['sample']['error'][$i] === 0){
                        //check for size limit
                        if($_FILES['sample']['size'][$i] <= 10 * 1024 * 1024){
                            //temporary path
                            $product_path ='../../../assets/images/admin_temp_storage/'.$newname;
                            //check if the file was moved from the temporary path to new path
                            if(move_uploaded_file($_FILES['sample']['tmp_name'][$i], $product_path)){
                                $_SESSION['sample'][] = $newname;
                                header('Location: addproduct2.php');
                            } 
                            else {
                                $error['carousel'] = "Upload failed. Please try again.";
                            }
                        } 
                        else{
                            $error['carousel'] = "File size exceeded! Maximum size is 10mb only.";
                        }
                    } 
                    else{
                        $error['carousel'] = "Error ".$_FILES['sample']['error'][$i]." has occured.";
                    }
                } 
                else{
                    $error['carousel'] = "File extension not applicable. Please upload image files only.";
                }

            }

        }
    }







    if(isset($_POST['add-product'])){

        //check if the text inputs are empty
        if(!in_array("", $var)){
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
                $sql2->bindParam(':1_ch', $var['1ch']);
                $sql2->bindParam(':2_ch', $var['2ch']);
                $sql2->bindParam(':add_char', $var['addchar']);
                $sql2->bindParam(':add_dedication', $var['add_dedication']);
                $sql2->bindParam(':category', $_SESSION['category']);

                if($sql2->execute() and unlink($tmp_path.$_SESSION['cover_img'])){
                    //get the id of the new product
                    $productid_sql = $db->prepare("SELECT id FROM product ORDER BY id DESC LIMIT 1");
                    $productid_sql->execute();
                    $get_id = $productid_sql->fetch(PDO::FETCH_ASSOC);
                    $product_id = $get_id['id'];
                    //print_r($product_id);

                    //query for product image
                    $productimg = $db->prepare("INSERT INTO product_carousel (product_id, carousel_image, carousel_image_path) VALUES (?,?,?)");

                    //create a prefix to uniquely identify each product's images
                    $prefix = str_replace(" ","-",strtolower($_SESSION['productname']));
                    //create a new directory for the new product
                    $new_product_path = "../../../assets/images/admin-uploads/".$prefix."/";

                    //loop all product item from temporary storage
                    foreach($_SESSION['sample'] as $key => $value){
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
                            $productimg->execute(array($product_id,$value,$product_dbpath));

                            if(unlink($tmp_path.$value)){
                                unset($_SESSION['cover_img']);
                                unset($_SESSION['sample']);
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