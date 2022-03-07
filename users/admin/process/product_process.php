<?php
    include_once('../../include/database.php');
    $database = new Connection();
    $db = $database->open();
    $name;

    try{
        $sql = $db->prepare("SELECT product_name FROM product WHERE product_name=:name");
        //bind
        $sql->bindParam(':name', $name);
        $sql->execute();
        $row=$sql->fetch(PDO::FETCH_ASSOC);
        
        

    }
    catch(PDOException $e){
        $_SESSION['msg'] = $e->getMessage();
    }



    //close connection
    $database->close();

?>