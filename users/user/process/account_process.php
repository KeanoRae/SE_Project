<?php
    include_once('../../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = $db->prepare("SELECT o.id, DATE_FORMAT(o.order_date, '%m/%d/%Y %H:%i:%s') as date, o.receiver_name, u.phone_number, 
                            u.email, CONCAT(o.shipping_address,', ',o.shipping_city) AS address, o.shipping_fee, o.shipping_method, o.message, p.product_name,
                            os.name AS status, pm.payment_type, pm.receipt_status, pm.uploaded_receipt
                            FROM orders o JOIN order_details od JOIN user u JOIN product p JOIN order_status os JOIN payment pm
                            ON o.customer_id=u.id AND os.id=o.order_status AND o.id=od.order_id AND od.id=pm.order_details_id
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
                $shipping_fee = $row['shipping_fee'];
                $ship_method = $row['shipping_method'];
                $message = $row['message'];
                $status = $row['status'];
                $payment = $row['payment_type'];
                $receipt_status = $row['receipt_status'];
                $receipt = $row['uploaded_receipt'];
            }             
    }

    $errors['receipt'] = "";

    if(isset($_POST['upload_receipt'])){
        //get the extension of the image
        $get_ext = explode(".",$_FILES['receipt']['name']);
        $img_ext = end($get_ext);
        $extension = array("jpg", "jpeg", "png");

        //display an error if no image file is chosen
        if(empty($_FILES['receipt']['name'])){
            $errors['receipt'] = "Receipt image is required";
        }
        else{
            $get_id = $db->prepare("SELECT p.id FROM payment p JOIN order_details od JOIN orders o
                                    ON p.order_details_id=od.id AND od.order_id=o.id WHERE o.id=:id");
            //bind
            $get_id->bindParam(':id',$id);
            $get_id->execute();
            if($row=$get_id->fetch(PDO::FETCH_ASSOC)){
                $payment_id = $row['id'];
                $status = "uploaded";

                //check if the file has image extension
                if(in_array($img_ext,$extension)){
                   //check for error
                   if($_FILES['receipt']['error'] === 0){
                       //check for size limit
                       if($_FILES['receipt']['size'] <= 10 * 1024 * 1024){
                            //create unique id for file name
                            $newname = uniqid("",true).".".$img_ext;
                            //temporary path
                            $receipt_path = 'assets/images/customer-uploads/receipts/'.$newname;
                            if(move_uploaded_file($_FILES['receipt']['tmp_name'], "../../../".$receipt_path)){
                                //execute the query
                                $insert_receipt = $db->prepare("UPDATE payment SET uploaded_receipt=:receipt, receipt_status=:status WHERE id=:id");
                                //bind
                                $insert_receipt->bindParam(':id', $payment_id);
                                $insert_receipt->bindParam(':status', $status);
                                $insert_receipt->bindParam(':receipt', $receipt_path);
                                $insert_receipt->execute();
                                if($insert_receipt){
                                    header('Location: user-to-pay.php');
                                }
                                else{
                                    $errors['receipt'] = "Upload failed. Please try again.";
                                }
                            }
                            else{
                                $errors['receipt'] = "Upload failed. Please try again. 11111";
                            }
                       } 
                       else{
                           $errors['receipt'] = "File size exceeded! Maximum size is 10mb only.";
                       }
                   } 
                   else{
                       $errors['receipt'] = "Error ".$_FILES['receipt']['error']." has occured.";
                   }
               } 
               else{
                   $errors['receipt'] = "File extension not applicable. Please receipt image files only.";
               }
            }
        }
    }

    if(isset($_POST['cancel_btn'])){
        $getid = $_GET['id'];
        //status for cancel
        $new_status = 3;

        $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
        //bind
        $sql->bindParam(':id', $getid);
        $sql->bindParam(':status', $new_status);
        if($sql->execute()){
            header('Location: user-cancelled.php');
        }
    }

    if(isset($_POST['to-complete'])){
        $getid = $_GET['id'];
        //status for complete
        $new_status = 5;

        $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
        //bind
        $sql->bindParam(':id', $getid);
        $sql->bindParam(':status', $new_status);
        if($sql->execute()){
            header('Location: user-completed.php');
        }
    }

    //close connection
    $database->close();
?>