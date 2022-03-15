<?php
    include_once('../../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    if(isset($_POST['delete_cart'])){
        
        try{
            $sql = $db->prepare("DELETE FROM cart WHERE id=:cartid");
            //bind
            $sql->bindParam(':cartid', $_GET['id']);
            if($sql->execute()){
                header('Location: ../cart.php');
            }           
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }

    }


    //close connection
    $database->close();

?>