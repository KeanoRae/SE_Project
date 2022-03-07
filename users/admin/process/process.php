<?php
    include_once('../../include/database.php');
    if(isset($_GET['vieworder'])){
        $id = $_GET['vieworder'];
        $database = new Connection();
        $db = $database->open();

        try{
            $sql = $db->prepare("SELECT o.id, DATE_FORMAT(o.order_date, '%m/%d/%Y %H:%i:%s') as date, CONCAT(u.first_name,' ',u.last_name) AS name, 
                                u.phone_number, u.email, CONCAT(o.shipping_address,', ',o.shipping_city) AS address, o.shipping_method, p.product_name,
                                od.quantity, od.product_price, (od.quantity*od.product_price) AS subtotal
                                FROM orders o JOIN user u JOIN product p JOIN order_details od
                                ON o.customer_id=u.id AND o.id=od.order_id AND p.id=od.product_id AND o.id=od.order_id
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
				}           
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }    
        //close connection
        $database->close();
    }
?>