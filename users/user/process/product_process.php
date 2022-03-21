<?php
    include_once('../../include/database.php');
    $database = new Connection();
    $db = $database->open();

    $errors=array("price" => "");
	$var=array("price" => "", "qty" => "");

    if(isset($_GET['shopnowid'])){
        $id = $_GET['shopnowid'];

        try{
            $sql = $db->prepare("SELECT product_name, product_details, 1ch_price, 2ch_price, add_char, add_dedication FROM product
                                WHERE id=:pid");
                //bind
                $sql->bindParam(':pid', $id);
                $sql->execute();
                if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                    $product_name = $row['product_name'];
                    $product_details = $row['product_details'];
                    $price1 = $row['1ch_price'];
                    $price2 = $row['2ch_price'];
                    $addons1 = $row['add_char'];
                    $addons2 = $row['add_dedication'];
                    $_SESSION['product_name'] = $product_name;
                }           
        }
        catch(PDOException $e){
            $_SESSION['msg'] = $e->getMessage();
        }
    }

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
            $_SESSION['addons_price'] = $_POST['addons-price'];
            $_SESSION['addons_name'] = $_POST['addons-name'];
			$_SESSION['subtotal'] = $_POST['subtotal'];
            $_SESSION['product_id'] = $id;
			header('Location: shipping_info.php');
		}
	}

    elseif(isset($_POST['cart_btn'])){
		//$productid;

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

            $selectedprice = $var['price'];
            $qty = $var['qty'];
            $subtotal = $_POST['subtotal'];
            $_SESSION['addons_name'] = $_POST['addons-name'];
          
            $insertsql = $db->prepare("INSERT INTO cart (customer_id, product_id, product_name, product_price, quantity, add_ons, subtotal)
                                VALUES (:uid, :pid, :productname, :price, :quantity, :addons, :subtotal)");
                
                //bind
                $insertsql->bindParam(':uid', $_SESSION['pid']);
                $insertsql->bindParam(':pid', $id);
                $insertsql->bindParam(':productname', $product_name);
                $insertsql->bindParam(':price', $selectedprice);
                $insertsql->bindParam(':quantity', $qty);
                $insertsql->bindParam(':addons', $_POST['addons-price']);
                $insertsql->bindParam(':subtotal', $subtotal);

                if($insertsql->execute()){
                    header('Location: cart.php');
                }
                else{
                    $_SESSION['msg'] = "Something wrong happened";
                } 
        }
	}

    //close connection
    $database->close();

?>