<?php
	include_once('../../include/database.php');

	if(isset($_POST['buynow_btn'])){
		header('Location: shipping-info.php');
	}
	elseif(isset($_POST['cart_btn'])){
		//$database = new Connection();
        //$db = $database->open();

			//try{
				//make use of prepared statement to prevent sql injection
				//$insertsql = $db->prepare("INSERT INTO cart (customer_id, product_id, product_name)
				//SELECT id FROM product WHERE product_name=:pname");
				
				//bind
				//$insertsql->bindParam(':uid', $_SESSION['pid']);
				//$insertsql->bindParam(':firstname', $var['fname']);
			//}
			//catch(PDOException $e){
				//$_SESSION['message'] = $e->getMessage();
			//}
		header('Location: cart.php');

		//close connection
        //$database->close();
	}
?>