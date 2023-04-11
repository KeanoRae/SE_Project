<?php
    include_once('include/database.php');
    $database = new Connection();
    $db = $database->open();

    if(isset($_GET['shopnowid'])){
        $id = $_GET['shopnowid'];

        try{
            $sql = $db->prepare("SELECT p.product_name, p.1ch_price, p.2ch_price, p.add_char, p.add_dedication, pd.material, pd.medium, pd.size 
                                 FROM product p JOIN product_details pd WHERE p.id=pd.product_id AND p.id=:pid");
                //bind
                $sql->bindParam(':pid', $id);
                $sql->execute();
                if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                    $product_name = $row['product_name'];
                    $price1 = $row['1ch_price'];
                    $price2 = $row['2ch_price'];
                    $addons1 = $row['add_char'];
                    $addons2 = $row['add_dedication'];
                    $material = $row['material'];
                    $medium = $row['medium'];
                    $size = $row['size'];
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