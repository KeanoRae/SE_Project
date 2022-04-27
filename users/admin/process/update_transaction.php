<?php
    include_once('../../../include/database.php');
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
                    header('Location: ../admin-transaction/confirmed.php');
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