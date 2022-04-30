<?php
    include_once('include/database.php');
    $database = new Connection();
    $db = $database->open();

    $var=array(
        "fname" => "",
        "lname" => "",
        "username" => "",
        "password" => "",
        "role" => ""
    );

    $errors=array(
        "fname" => "",
        "lname" => "",
        "username" => "",
        "password" => "",
        "role" => ""
    );

    $fname = "";
    $lname = "";
    $username = "";
    $password = "";
    $role = "";

    if(isset($GET['table_id'])){
        $id = $GET['table_id'];
        echo $id;
        //query
        $display_sql = $db->prepare("SELECT first_name, last_name, username, password, role FROM user WHERE id=:id");
        $display_sql->bindParam(':id', $id);
        $display_sql->execute();
        if($display_sql){
            $inform=$display_sql->fetch(PDO::FETCH_ASSOC);
            //$var['fname'] = $inform['first_name'];
            //$var['lname'] = $inform['last_name'];
            //$var['username'] = $inform['username'];
            //$var['password'] = $inform['password'];
            //$var['role'] = $inform['role'];
            $fname = $inform['first_name'];
            $lname = $inform['last_name'];
            $username = $inform['username'];
            $password = $inform['password'];
            $role = $inform['role'];
            //header('Location: test.php');
            $_SESSION['add_user'] = "success";
            header('Location: test.php?success');
        }
        else{
            $_SESSION['add_user'] = "failed";
        }
    }

    $database->close();
?>