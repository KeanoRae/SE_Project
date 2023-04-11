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
            $status = 2;

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
                        $mail->Username = 'njglasspainting@gmail.com'; 
                        $mail->Password = 'zlpysoueottecbjd';
                        $mail->SMTPSecure = 'ssl';          
                        $mail->Port = 465;                  
                        
                        // Sender info 
                        $mail->setFrom('njglasspainting@gmail.com', 'NJ Glass Painting'); 
                        
                        // Add a recipient 
                        $mail->addAddress($_SESSION['confirm_email']); 
                        
                        // Set email format to HTML 
                        $mail->isHTML(true); 
                        
                        // Mail subject 
                        $mail->Subject = 'Order Confirmation FROM NJ Customized Glass Painting'; 
                        
                        // Mail body content 
                        $bodyContent = 'Thank you for purchasing!'."<br><br>";
                        $bodyContent .= 'Your order was confirmed by the seller, please upload your payment proof by click the link below:.'."<br><br>";
                        $bodyContent .= "
                                        <div style='margin: 10px 0;'>
                                            <a href='http://localhost/SE_project/users/user/order-details/user-to-pay.php'></a>
                                        </div>
                                        "."<br>";
                        $bodyContent .= 'Please note that this link will expire in 48 hours.';
                        $mail->Body    = $bodyContent; 
                        $mail->AltBody = strip_tags($bodyContent);
                        
                        //Send email 
                        if(!$mail->send()) { 
                            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
                        } else { 
                            echo 'Message has been sent.'; 
                        } 
                    } 
                    catch (Exception $e) {
                        $_SESSION['mail_err'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    header('Location: ../admin-transaction/confirmed.php');
                    unset($_SESSION['confirm_email']);
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
            $getid = $_POST['getid'];
            $status = 4;

            try{
                $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
                //bind
                $sql->bindParam(':id', $getid);
                $sql->bindParam(':status', $status);
                if($sql->execute()){
                    header('Location: ../admin-transaction/ship.php');
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