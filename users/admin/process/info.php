<?php
    include_once('../../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    if(isset($_GET['vieworder'])){
        $id = $_GET['vieworder'];

        try{
            $sql = $db->prepare("SELECT o.id, DATE_FORMAT(o.order_date, '%m/%d/%Y %H:%i:%s') as date, CONCAT(u.first_name,' ',u.last_name) AS name, 
                u.phone_number, u.email, CONCAT(o.shipping_address,', ',o.shipping_city) AS address, o.shipping_method, p.product_name,
                od.quantity, od.product_price, (od.quantity*od.product_price) AS subtotal, o.message, os.name AS status, pm.receipt_status, pm.uploaded_receipt
                FROM orders o JOIN user u JOIN product p JOIN order_details od JOIN order_status os JOIN payment pm
                ON o.customer_id=u.id AND o.id=od.order_id AND p.id=od.product_id AND o.id=od.order_id AND os.id=o.order_status AND pm.order_details_id=od.id
                WHERE o.id=:id");
                //bind
                $sql->bindParam(':id', $id);
                $sql->execute();
                if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                    $date = $row['date'];
                    $name = $row['name'];
                    $num = $row['phone_number'];
                    $email = $row['email'];
                    $addr = $row['address'];
                    $ship_method = $row['shipping_method'];
                    $productname = $row['product_name'];
                    $quantity = $row['quantity'];
                    $price = $row['product_price'];
                    $subtotal = $row['subtotal'];
                    $message = $row['message'];
                    $status = $row['status'];
                    $receipt_status = $row['receipt_status'];
                    $receipt = $row['uploaded_receipt'];
                }           
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }    
    }
    //close connection
    $database->close();
?>