<?php
    include_once('../../../include/database.php');

    if(isset($_POST['confirm'])){
        $database = new Connection();
        $db = $database->open();
        $getid = $_POST['getid'];
        $status = 7;

        try{
            $sql = $db->prepare("UPDATE orders SET order_status=:status WHERE id=:id");
            //bind
            $sql->bindParam(':id', $getid);
            $sql->bindParam(':status', $status);
            if($sql->execute()){
                header('Location: ../transaction-confirmed.php');
            }
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }
        //close connection
        $database->close();
    }
?>