<?php
	include_once('../../include/database.php');

	$errors=array("price" => "");
	$var=array("price" => "", "qty" => "");

	if(isset($_POST['buynow_btn'])){
		if(empty($_POST['baseprice'])){
			$errors['price'] = "*Please select 1 button";
		}
		else{
			$var['price'] = $_POST['baseprice'];
		}
		if(isset($_POST['qtybox'])){
			$var['qty'] = $_POST['qtybox'];
		}



		//if(!in_array("",$var)){
		if(!empty($var['price'])){
			$_SESSION['price'] = $var['price'];
			$_SESSION['qty'] = $var['qty'];
			$_SESSION['subtotal'] = $var['price']*$var['qty'];
			header('Location: shipping-info.php');
		}
	}
	elseif(isset($_POST['cart_btn'])){
		$database = new Connection();
        $db = $database->open();
		$productid;

			if(empty($_POST['baseprice'])){
				$errors['price'] = "*Please select 1 button";
			}
			else{
				$var['price'] = $_POST['baseprice'];
			}
			if(isset($_POST['qtybox'])){
				$var['qty'] = $_POST['qtybox'];
			}

			if(!empty($var['price'])){

				$price = $var['price'];
				$qty = $var['qty'];
				$subtotal = $var['price']*$var['qty'];



				$sql = $db->prepare("SELECT id FROM product WHERE product_name=:name");
				//bind
				$sql->bindParam(':name', $_SESSION['product_name']);
				$sql->execute();
				if($row=$sql->fetch(PDO::FETCH_ASSOC)){
					$productid = $row['id'];
				}

				
				$insertsql = $db->prepare("INSERT INTO cart (customer_id, product_id, product_name, product_price, quantity, subtotal)
                    				VALUES (:uid, :pid, :productname, :price, :quantity, :subtotal)");
                    
                    //bind
                    $insertsql->bindParam(':uid', $_SESSION['pid']);
					$insertsql->bindParam(':pid', $productid);
                    $insertsql->bindParam(':productname', $_SESSION['product_name']);
					$insertsql->bindParam(':price', $price);
                    $insertsql->bindParam(':quantity', $qty);
                    $insertsql->bindParam(':subtotal', $subtotal);

					if($insertsql->execute()){
						unset($_SESSION['product_name']);
						unset($_SESSION['price']);
						unset($_SESSION['qty']);
						unset($_SESSION['subtotal']);
						header('Location: cart.php');
					}
					else{
                        $_SESSION['msg'] = "Something wrong happened";
                    } 
			}
			

		//close connection
        $database->close();
	}
?>