<?php
    include_once('../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    if(isset($_POST['shopnowbtn'])){
        $_SESSION['product_id_btn'] = $_POST['product_id_btn'];
        header('Location: user_productpage.php');
    }

    //close connection
    $database->close();
?>