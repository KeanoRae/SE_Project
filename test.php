<?php
        session_start();
        include('include/header.php');
        include('include/navbar.php');
	    include_once('include/database.php');

		$database = new Connection();
		$db = $database->open();
        $uname = "admin";

        //query for admins
        $adminsql = $db->prepare("SELECT username, password, role FROM admins WHERE username=:uname");
        //bind param
        $adminsql->bindParam(':uname',$uname);
        //$adminsql->bindParam(':username', $_POST['useremail']);
        $adminsql->execute();
        $admin=$adminsql->fetch(PDO::FETCH_ASSOC);
        $arr = array("arr" => "1", "arr2" =>"2");

        if($admin){
            print_r($admin);
        }
        else{
            echo "error occured";
        }


include('include/footer.php');

?>