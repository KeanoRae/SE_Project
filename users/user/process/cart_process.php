<?php
    include_once('../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    if(isset($_POST['delete_cart'])){
        try{
            $sql = $db->prepare("DELETE FROM cart WHERE id=:cartid");
            //bind
            $sql->bindParam(':cartid', $_POST['modal_id']);
            if($sql->execute()){
                header('Location: cart.php');
            }           
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }
    }

    if(isset($_POST['delete_checkbox'])){
        $check_id = $_POST['checkboxes'];
        $check_id_arr = implode(',', $check_id);
        try{
            $sql = $db->prepare("DELETE FROM cart WHERE id IN($check_id_arr)");
            if($sql->execute()){
                header('Location: cart.php');
            }           
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }
    }

    if(isset($_POST['checkout'])){
        if(empty($_POST['checkboxes'])){
            $_SESSION['checkout_error'] = "Please select an item to checkout!";
        }
        else{
            $check_id = $_POST['checkboxes'];
            $check_id_arr = implode(',', $check_id);
            $_SESSION['cart_checkout_id'] = $check_id_arr;
            header('Location: shipping_info.php');

            // foreach($_POST['checkboxes'] as $val){
            //     $check[] = $val;
            // }
            // $_SESSION['cart_checkout_id'] = $check;
            // header('Location: shipping_info.php');
        }
    }



    //close connection
    $database->close();

?>