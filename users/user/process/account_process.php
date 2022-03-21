<?php
    include_once('../../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        try{
            $sql = $db->prepare("SELECT o.id, DATE_FORMAT(o.order_date, '%m/%d/%Y %H:%i:%s') as date, o.receiver_name, u.phone_number, 
                                u.email, CONCAT(o.shipping_address,', ',o.shipping_city) AS address, o.shipping_method, p.product_name,
                                od.quantity, od.product_price, ((od.quantity*od.product_price)+od.add_ons) AS subtotal, os.name AS status
                                FROM orders o JOIN user u JOIN product p JOIN order_details od JOIN order_status os
                                ON o.customer_id=u.id AND o.id=od.order_id AND p.id=od.product_id AND o.id=od.order_id AND os.id=o.order_status
                                WHERE o.id=:id");
                //bind
                $sql->bindParam(':id', $id);
                $sql->execute();
                if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                    $date = $row['date'];
                    $name = $row['receiver_name'];
                    $num = $row['phone_number'];
                    $email = $row['email'];
                    $addr = $row['address'];
                    $ship_method = $row['shipping_method'];
                    $productname = $row['product_name'];
                    $quantity = $row['quantity'];
                    $price = $row['product_price'];
                    $subtotal = $row['subtotal'];
                    $status = $row['status'];
                }           
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }    
    }



    //close connection
    $database->close();
?>