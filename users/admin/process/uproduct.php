<?php
    include_once('../../include/database.php');
        $database = new Connection();
        $db = $database->open();

        try{
            $namecheck = $db->prepare("SELECT product_name FROM product");
            //bind
            $namecheck->bindParam(':id', $getid);
            if($sql->execute()){
                header('Location: ../confirmed.php');
            }

        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }    
        //close connection
        $database->close();
    
?>