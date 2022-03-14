<?php
    include_once('../../include/database.php');

    $error['pay_method'] = "";
 

    $var=array("name" => "",
                "email" => "",
                "addr" => "",
                "phonenumber" => "",
                "ship_method" => "",
                "pay_method" => ""
        );
    //$name = $email = $addr = $ship_method = $pay_method = "";
    
    if(isset($_POST['submit'])){
        $database = new Connection();
        $db = $database->open();

        // strips unnecessary characters and backslashes
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //store payment info to array var
        $var['name'] = test_input($_POST['name']);
        $var['email'] = test_input($_POST['email']);
        $var['phonenumber'] = test_input($_POST['phonenumber']);
        $var['addr'] = test_input($_POST['addr']);
        $var['ship_method'] = test_input($_POST['ship_method']);

        //validation for payment method
        if(empty($_POST['payment-option'])){
            $error['pay_method'] = "*Payment Method field is Required";
        }
        else{
            $var['pay_method'] = test_input($_POST['payment-option']);
        }
           
        if(!in_array("",$var)){
            try{
                //status id for pending
                $status=1;
                $city = $_SESSION['city'].", ".$_SESSION['region'];
                $ordersql = $db->prepare("INSERT INTO orders (customer_id, ship_name, email, shipping_address, shipping_city, ship_postal_code, contact_number, shipping_method, message, order_status)
                    VALUES (:uid, :name, :email, :ship_addr, :city, :postal, :phone_number, :method, :message, :status)");
                    
                    //bind
                    $ordersql->bindParam(':uid', $_SESSION['pid']);
                    $ordersql->bindParam(':name', $var['name']);
                    $ordersql->bindParam(':email', $var['email']);
                    $ordersql->bindParam(':ship_addr', $_SESSION['address']);
                    $ordersql->bindParam(':city', $city);
                    $ordersql->bindParam(':postal', $_SESSION['postal']);
                    $ordersql->bindParam(':phone_number', $var['phonenumber']);
                    $ordersql->bindParam(':method', $var['ship_method']);
                    $ordersql->bindParam(':message', $_POST['message']);
                    $ordersql->bindParam(':status', $status);
    
                    if($ordersql->execute()){

                        //$sql = $db->prepare("SELECT id FROM product WHERE product_name=:name");
                        //bind
                        //$sql->bindParam(':name', $_SESSION['product_name']);
                        //$sql->execute();

                        //if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                            //$productid = $row['id'];
                        //}

                        $detailsql = $db->prepare("INSERT INTO order_details (order_id, product_id, quantity, product_price)
                                                   SELECT orders.id, :productid, :quantity, :price FROM orders ORDER BY orders.id DESC LIMIT 1");
                            //bind
                            $detailsql->bindParam(':productid', $_SESSION['product_id']);
                            $detailsql->bindParam(':quantity', $_SESSION['qty']);
                            $detailsql->bindParam(':price', $_SESSION['price']);
                            if($detailsql->execute()){
                                unset($_SESSION['product_id']);
                                unset($_SESSION['product_name']);
                                unset($_SESSION['price']);
                                unset($_SESSION['qty']);
                                unset($_SESSION['subtotal']);
                                unset($_SESSION['address']);
                                unset($_SESSION['city']);
                                unset($_SESSION['postal']);
                                unset($_SESSION['region']);
                                unset($_SESSION['ship_method']);
                                header('Location: order-details/user-pending.php');
                            }
                    }
                    else{
                        $_SESSION['msg'] = "Something wrong happened";
                    }                        	


                //$sql = $db->prepare("INSERT INTO payment (customer_id, payment_type) VALUES (:uid, :type)");

                //bind
                //$sql->bindParam(':uid', $_SESSION['pid']);
                //$sql->bindParam(':type', $var['pay_method']);

                //if($sql->execute()){
                    //unset($_SESSION['product_name']);
                    //unset($_SESSION['price']);
                    //unset($_SESSION['qty']);
                    //unset($_SESSION['subtotal']);
                    //header('Location: account.php');
                //}
                //else{
                    //$_SESSION['message'] = "Something wrong happened";
                //}                        	
            }
            catch(PDOException $e){
                $_SESSION['msg'] = $e->getMessage();
            }
        }
        else{
            $_SESSION['msg'] = "Please fill out the form!";
        }
    
    //close connection
    $database->close();
    }
?>
