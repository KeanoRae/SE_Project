<?php
    include_once('../../include/database.php');
    $database = new Connection();
    $db = $database->open();
    
    if(isset($_POST['delete_product'])){
        $productname = $_POST['del_productname'];
        $del_name = str_replace(" ","-",strtolower($productname));
        $del_admin_path = "../../assets/images/admin-uploads/".$del_name."/";
        $del_customer_path = "../../assets/images/customer-uploads/".$del_name."/";
        //function to delete directory
        function rrmdir($dir) { 
            if (is_dir($dir)) { 
              $objects = scandir($dir); 
              foreach ($objects as $object) { 
                if ($object != "." && $object != "..") { 
                  if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
                } 
              } 
              reset($objects); 
              rmdir($dir); 
            } 
          }

        //query to delete product from database
        $sql = $db->prepare("DELETE FROM product WHERE id=:pid");
        //bind
        $sql->bindParam(':pid', $_POST['delete_id']);
        if($sql->execute()){
            rrmdir($del_admin_path);
            rrmdir($del_customer_path);
            header('Location: admin-product.php');
        }      
    }

    if(isset($_POST['edit_product'])){
        $sql = $db->prepare("UPDATE product p INNER JOIN product_details pd ON p.id=pd.product_id 
                             SET p.product_name=:pname, p.1ch_price=:1ch, p.2ch_price=:2ch, p.add_char=:addchar, p.add_dedication=:dedication, pd.material=:material, pd.medium=:medium, pd.category=:category 
                             WHERE p.id=:pid");
        //bind
        $sql->bindParam(':pid', $_POST['edit_id']);
        $sql->bindParam(':pname', $_POST['productname']);
        $sql->bindParam(':1ch', $_POST['char1']);
        $sql->bindParam(':2ch', $_POST['char2']);
        $sql->bindParam(':addchar', $_POST['add_char']);
        $sql->bindParam(':dedication', $_POST['add_desc']);
        $sql->bindParam(':material', $_POST['material']);
        $sql->bindParam(':medium', $_POST['medium']);
        $sql->bindParam(':category', $_POST['category']);
        
        if($sql->execute()){
            header('Location: admin-product.php');
        }
        else{
            $_SESSION['msg'] = "An error occured.";
        }           
    }

    //declare array variable for error and value of each text input
    $var = array("productname" => "","size" => "", "category" => "", "medium" => "", "material" => "",
                    "1ch" => "", "2ch" => "", "addchar" => "", "add_desc" => "");
    $error = array("productname" => "","size" => "", "category" => "", "medium" => "", "material" => "", "cover" => "", "sample" => "",
                    "1ch" => "", "2ch" => "", "addchar" => "", "add_desc" => "");

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
            $error['medium'] = "Medium field is Required";
        } 
        else {
            $var['medium'] = test_input($_POST['medium']);
        }

        //display an error if material field is empty
        if(empty($_POST['material'])){
            $error['material'] = "Material field is Required";
        } 
        else {
            $var['material'] = test_input($_POST['material']);
        }

        //display an error if 1 Character price field is empty
        if(empty($_POST['char1'])){
            $error['1ch'] = "1 Character field is Required";
        } 
        else {
            $var['1ch'] = $_POST['char1'];
        }

        //display an error if 2 Character price field is empty
        if(empty($_POST['char2'])){
            $error['2ch'] = "2 Character field is Required";
        } 
        else {
            $var['2ch'] = $_POST['char2'];
        }

        //display an error if Add character price field is empty
        if(empty($_POST['add_char'])){
            $error['addchar'] = "Add Character Character field is Required";
        } 
        else {
            $var['addchar'] = $_POST['add_char'];
        }

        //display an error if Add dedication/description price field is empty
        if(empty($_POST['add_desc'])){
            $error['add_desc'] = "Add Description Character field is Required";
        } 
        else {
            $var['add_desc'] = $_POST['add_desc'];
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
            $foldername = str_replace(" ","-",strtolower($var['productname']));
            //create a new directory for the new product
            $new_cover_path = "../../assets/images/admin-uploads/".$foldername."/cover"."/";
            $customer_upload_path = "../../assets/images/customer-uploads/".$foldername."/";
            //checks if directory exists
            if(!file_exists($new_cover_path) or !is_dir($new_cover_path)){
                //create the directory for admin
                mkdir($new_cover_path.'/', 0777, true);
                //create the directory for customer uploads
                mkdir($customer_upload_path.'/', 0777, true);

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
                                //cover path to insert in database
                                $cover_dbpath = "assets/images/admin-uploads/".$foldername."/".$_FILES['cover']['name'];

                                //query to insert new product
                                $product_sql = $db->prepare("INSERT INTO product (product_name, product_cover, product_cover_path, 1ch_price, 2ch_price, add_char, add_dedication)
                                VALUES (:product_name, :productcover, :productcoverpath, :1_ch, :2_ch, :add_char, :add_dedication)");
                                //bind params
                                $product_sql->bindParam(':product_name', $var['productname']);
                                $product_sql->bindParam(':productcover', $_FILES['cover']['name']);
                                $product_sql->bindParam(':productcoverpath', $cover_dbpath);
                                $product_sql->bindParam(':1_ch', $var['1ch']);
                                $product_sql->bindParam(':2_ch', $var['2ch']);
                                $product_sql->bindParam(':add_char', $var['addchar']);
                                $product_sql->bindParam(':add_dedication', $var['add_desc']);

                                if($product_sql->execute()){
                                    //get the id of the new product
                                    $productid_sql = $db->prepare("SELECT id FROM product ORDER BY id DESC LIMIT 1");
                                    $productid_sql->execute();
                                    if($get_id=$productid_sql->fetch(PDO::FETCH_ASSOC)){
                                        //store the new product id
                                        $product_id = $get_id['id'];

                                        //query to insert product details
                                        $product_details = $db->prepare("INSERT INTO product_details (product_id, material, medium, size, category) 
                                        VALUES (:pid, :material, :medium, :size, :category)");
                                        //bind params
                                        $product_details->bindParam(':pid', $product_id);
                                        $product_details->bindParam(':material', $var['material']);
                                        $product_details->bindParam(':medium', $var['medium']);
                                        $product_details->bindParam(':size', $var['size']);
                                        $product_details->bindParam(':category', $var['category']);

                                        if($product_details->execute()){
                                            //query to insert sample images
                                            $productimg = $db->prepare("INSERT INTO product_carousel (product_id, carousel_image, carousel_image_path) VALUES (?,?,?)");

                                            //count total files uploaded from product image
                                            $count = count($_FILES['sample']['name']);

                                            //loop all product image file
                                            for($i = 0; $i < $count; $i++){
                                                //get the extension of the image
                                                $get_ext2 = explode(".",$_FILES['sample']['name'][$i]);
                                                $img_ext2 = end($get_ext2);

                                                //product folder name
                                                $product_pathname = str_replace(" ","-",strtolower($var['productname']));
                                                //change the file name
                                                $sample_newname =  $product_pathname."-".$_FILES['sample']['name'][$i];

                                                //check if product image file has image extension
                                                if(in_array($img_ext2,$extension)){
                                                    //check for error
                                                    if($_FILES['sample']['error'][$i] === 0){
                                                        //check for size limit
                                                        if($_FILES['sample']['size'][$i] <= 10 * 1024 * 1024){
                                                            //product directory path
                                                            $product_path ='../../assets/images/admin-uploads/'. $product_pathname."/".$sample_newname;
                                                            //product database path
                                                            $product_dbpath = 'assets/images/admin-uploads/'. $product_pathname."/".$sample_newname;
                                                            //check if the file was moved from the temporary path to new path
                                                            if(move_uploaded_file($_FILES['sample']['tmp_name'][$i], $product_path)){
                                                                //execute the query
                                                                if($productimg->execute(array($product_id,$sample_newname,$product_dbpath))){
                                                                    header('Location: admin-product.php');
                                                                }
                                                            } 
                                                            else {
                                                                $_SESSION['msg'] = "Upload failed. Please try again.";
                                                            }
                                                        } 
                                                        else{
                                                            $_SESSION['msg'] = "File size exceeded! Maximum size is 10mb only.";
                                                        }
                                                    } 
                                                    else{
                                                        $_SESSION['msg'] = "Error ".$_FILES['sample']['error'][$i]." has occured.";
                                                    }
                                                }
                                            } 
                                        }

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
                $_SESSION['msg'] = "directory already exists!";
                $_SESSION['coverpath'] = $new_cover_path;
            } 
        } 
        else{
            $_SESSION['msg'] = "Please fill out all the inputs";
        }
    }

    //close connection
    $database->close();

?>