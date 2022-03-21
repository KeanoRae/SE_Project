<?php
    include_once('../../../include/database.php');
        $database = new Connection();
        $db = $database->open();


        if(isset($_GET['productname'])){
            $prodname = $_GET['productname'];
            $sql = $db->prepare("SELECT * FROM product WHERE product_name=:name");
            //bind
            $sql->bindParam(':name', $prodname);
            $sql->execute();
            if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                $product_id = $row['id'];
                $pname = $row['product_name'];
                $product_details = $row['product_details'];
                $category = $row['category'];
            }           
        }

        if(isset($_POST['update-product'])){
            //query for update
            $sql = $db->prepare("UPDATE product SET product_name=:productname, product_details=:details, 1ch_price=:1ch, 
            2ch_price=:2ch, add_char=:addchar, add_dedication=:dedication, category=:category WHERE id=:pid");
            //bind param
            $sql->bindParam(':pid', $product_id);
            $sql->bindParam(':productname', $_POST['productname']);
            $sql->bindParam(':details', $_POST['productdetails']);
            $sql->bindParam(':1ch', $_POST['1ch_price']);
            $sql->bindParam(':2ch', $_POST['2ch_price']);
            $sql->bindParam(':addchar', $_POST['add_char']);
            $sql->bindParam(':dedication', $_POST['add_dedication']);
            $sql->bindParam(':category', $_POST['category']);

            if($sql->execute()){
            header('Location: ../dashboard.php');
            }
    }
        //close connection
        $database->close();
    
?>