<?php
    include_once('../../../include/database.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../../../include/vendor/autoload.php';

    $database = new Connection();
    $db = $database->open();

        //for confirm order
        if(isset($_POST['confirm'])){
            $getid = $_POST['getid'];
            $email_rcv = $_POST['email'];
            $status = 2;
            $payment_type = $_POST['payment'];

            if($payment_type == "CashonDelivery"){
                $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
                //bind
                $sql->bindParam(':id', $getid);
                $sql->bindParam(':status', $status);
                if($sql->execute()){
                    header('Location: ../admin-transaction/confirmed.php');
                }
            }
            else{
                try{
                    $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
                    //bind
                    $sql->bindParam(':id', $getid);
                    $sql->bindParam(':status', $status);
                    if($sql->execute()){
                        try {
                            $mail = new PHPMailer(true);
                            $mail->isSMTP();                    
                            $mail->Host = 'smtp.gmail.com';     
                            $mail->SMTPAuth = true;             
                            $mail->Username = 'njglasspainting4@gmail.com'; 
                            $mail->Password = 'kcnmixbbwnkkexux';
                            $mail->SMTPSecure = 'ssl';          
                            $mail->Port = 465;                  
                            
                            // Sender info 
                            $mail->setFrom('njglasspainting4@gmail.com', 'NJ Glass Painting'); 
                            
                            // Add a recipient 
                            $mail->addAddress($email_rcv); 
                            
                            // Set email format to HTML 
                            $mail->isHTML(true); 
                            
                            // Mail subject 
                            $mail->Subject = 'Order Confirmation FROM NJ Customized Glass Painting'; 
                            
                            // Mail body content 
                            $bodyContent = 'Thank you for purchasing!'."<br><br>";
                            $bodyContent .= 'Your order was confirmed by the seller, please upload your payment proof by clicking the link below:.'."<br><br>";
                            $bodyContent .= "
                                            <div style='margin: 10px 0;'>
                                                <a href='#'>njglasspainting.com/confirm-order</a>
                                            </div>
                                            "."<br>";
                            $bodyContent .= 'Please note that this link will expire in 48 hours.';
                            $mail->Body    = $bodyContent; 
                            $mail->AltBody = strip_tags($bodyContent);
                            
                            //Send email 
                            if(!$mail->send()) { 
                                echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
                            } else { 
                                header('Location: ../admin-transaction/confirmed.php');
                                unset($_SESSION['confirm_email']);
                            } 
                        } 
                        catch (Exception $e) {
                            $_SESSION['mail_err'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    }
                }
                catch(PDOException $e){
                    $_SESSION['msg'] = $e->getMessage();
                }
            }
        }

        //for declined order
        if(isset($_POST['decline'])){
            $getid = $_POST['getid'];
            $status = 7;

            try{
                $sql = $db->prepare("UPDATE orders SET order_status=:status, decline_message=:msg WHERE id=:id");
                //bind param
                $sql->bindParam(':id', $getid);
                $sql->bindParam(':status', $status);
                $sql->bindParam(':msg', $_POST['decline_msg']);
                if($sql->execute()){
                    header('Location: ../admin-transaction/declined.php');
                }
            }
            catch(PDOException $e){
                $_SESSION['msg'] = $e->getMessage();
            }
        }

        //for process order
        if(isset($_POST['to-process'])){
            $getid = $_POST['getid'];
            $status = 6;
            $receipt_status = "verified";
            $payment_type = $_POST['payment'];
            if($payment_type == "CashonDelivery"){
                try{
                    $sql = $db->prepare("UPDATE orders o, order_details od SET o.order_status=:status 
                                        WHERE od.order_id=o.id AND o.id=:id");
                    //bind
                    $sql->bindParam(':id', $getid);
                    $sql->bindParam(':status', $status);
                    if($sql->execute()){
                        header('Location: ../admin-transaction/onprocess.php');
                    }
                }
                catch(PDOException $e){
                    $_SESSION['msg'] = $e->getMessage();
                }
            }
            else{
                try{
                    $sql = $db->prepare("UPDATE orders o, payment pm, order_details od SET o.order_status=:status, pm.receipt_status=:receipt 
                                        WHERE pm.order_details_id=od.id AND od.order_id=o.id AND o.id=:id");
                    //bind
                    $sql->bindParam(':id', $getid);
                    $sql->bindParam(':status', $status);
                    $sql->bindParam(':receipt', $receipt_status);
                    if($sql->execute()){
                        header('Location: ../admin-transaction/onprocess.php');
                    }
                }
                catch(PDOException $e){
                    $_SESSION['msg'] = $e->getMessage();
                }
            }
        }

        //for cancel order
        if(isset($_POST['cancel'])){
            $getid = $_POST['getid'];
            $status = 3;

            try{
                $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
                //bind
                $sql->bindParam(':id', $getid);
                $sql->bindParam(':status', $status);
                if($sql->execute()){
                    header('Location: ../admin-transaction/cancelled.php');
                }
            }
            catch(PDOException $e){
                $_SESSION['msg'] = $e->getMessage();
            }
        }

        //to ship an order
        if(isset($_POST['to-ship'])){
            $get_orderid = $_POST['getid'];
            $get_customerid = $_POST['customer'];
            $status = 4;

            try{
                $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
                //bind params
                $sql->bindParam(':id', $get_orderid);
                $sql->bindParam(':status', $status);
                if($sql->execute()){
                    //insert tracking info
                    $track = $db->prepare("INSERT INTO tracking_details (customer_id, order_id, OR_Number, BC_Number) 
                                           VALUES (:customer, :order, :or_num, :bc_num)");
                    //bind params
                    $track->bindParam(':customer', $get_customerid);
                    $track->bindParam(':order', $get_orderid);
                    $track->bindParam(':or_num', $_POST['or_num']);
                    $track->bindParam(':bc_num', $_POST['bc_num']);   

                    if($track->execute()){
                        $_SESSION['or_num'] = $_POST['or_num'];
                        $_SESSION['bc_num'] = $_POST['bc_num'];
                        header('Location: ../admin-transaction/ship.php');
                    }
                }
            }
            catch(PDOException $e){
                $_SESSION['msg'] = $e->getMessage();
            }
        }

        //to complete an order
        if(isset($_POST['to-complete'])){
            $getid = $_POST['getid'];
            $status = 5;

            try{
                $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
                //bind
                $sql->bindParam(':id', $getid);
                $sql->bindParam(':status', $status);
                if($sql->execute()){
                    header('Location: ../admin-transaction/complete.php');
                }
            }
            catch(PDOException $e){
                $_SESSION['msg'] = $e->getMessage();
            }
        }


    //close connection
    $database->close();
?>