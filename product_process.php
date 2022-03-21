<?php
    include_once('include/database.php');
    $database = new Connection();
    $db = $database->open();

    $errors=array("price" => "");
	$var=array("price" => "", "qty" => "");

    if(isset($_GET['shopnowid'])){
        $id = $_GET['shopnowid'];

        try{
            $sql = $db->prepare("SELECT product_name, product_details, 1ch_price, 2ch_price, add_char, add_dedication FROM product
                                WHERE id=:pid");
                //bind
                $sql->bindParam(':pid', $id);
                $sql->execute();
                if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                    $product_name = $row['product_name'];
                    $product_details = $row['product_details'];
                    $price1 = $row['1ch_price'];
                    $price2 = $row['2ch_price'];
                    $addons1 = $row['add_char'];
                    $addons2 = $row['add_dedication'];
                    $_SESSION['product_name'] = $product_name;
                }           
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }
    }
    //close connection
    $database->close();
?>