<?php
    include_once('../../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    if(isset($_GET['vieworder'])){
        $id = $_GET['vieworder'];

        try{
            $sql = $db->prepare("SELECT o.id, o.customer_id, DATE_FORMAT(o.order_date, '%m/%d/%Y %H:%i:%s') as date, CONCAT(u.first_name,' ',u.last_name) AS name, 
                u.phone_number, u.email, CONCAT(o.shipping_address,', ',o.shipping_city) AS address, o.shipping_fee, o.shipping_method, p.product_name,
                o.message, o.decline_message, os.name AS status, pm.payment_type, pm.receipt_status, pm.uploaded_receipt
                FROM orders o JOIN user u JOIN product p JOIN order_details od JOIN order_status os JOIN payment pm
                ON o.customer_id=u.id AND os.id=o.order_status AND o.id=od.order_id AND od.id = pm.order_details_id
                WHERE o.id=:id");
                //bind
                $sql->bindParam(':id', $id);
                $sql->execute();
                if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                    $customer_id = $row['customer_id'];
                    $date = $row['date'];
                    $name = $row['name'];
                    $num = $row['phone_number'];
                    $email = $row['email'];
                    $addr = $row['address'];
                    $shipping_fee = $row['shipping_fee'];
                    $ship_method = $row['shipping_method'];
                    $message = $row['message'];
                    $decline_msg = $row['decline_message'];
                    $status = $row['status'];
                    $payment_type = $row['payment_type'];
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