<?php 
    session_start();
    //echo 'email = '.$_SESSION['email'];
    //echo "<br>";
    //echo 'id = '.$_SESSION['pid'];
    //echo "<br>";
    //echo 'type = '.$_SESSION['user_type'];
    //if(isset($_SESSION['product_name'])){
        //echo $_SESSION['product_name'];
    //}
    //else{
        //echo "Not set";
    //}
    include('process/payment_process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/css/all.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">

    <title>NJ Customized Glass Painting</title>
</head>
<body>
    <!--navbar-->
    <nav>
        <input type="checkbox" id="navbar-check">
        <label for="navbar-check" class="check-icon">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li class="nav-item">
                <a class="nav-link" href="trackorders.php">order status</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="../../logout.php">log out</a>
            </li>
        </ul>
    </nav>

    <!--header-->
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="user_homepage.php"><img src="../../assets/images/header-logo1.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-9">
                <div class="search-box d-flex mt-3 float-end">
                    <!-- <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span> -->
                    <div class="icons mx-4">
                        <a class="text-reset" href="order-details/user-pending.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="cart.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid payment p-0">
        <?php
            if(isset($_SESSION['msg']) && $_SESSION['msg'] !=''){
        ?>
            <br>
            <div class="d-flex align-items-center mb-2">
                <span class="iconify fs-3 mb-1" data-icon="carbon:warning-alt" style="color: red;"></span>
                <h4 class="mb-0 ms-1" style="color:red;"><?php echo $_SESSION['msg']; ?></h4>
            </div>
        <?php
            unset($_SESSION['msg']);
            }
            else{
                echo "<br>";
                echo "<br>";
            }
        ?>
        <div class="header">
            <a class="d-inline fw-normal fs-4 text-decoration-none text-reset" href="cart.php">cart</a>
            <p class="d-inline fw-normal fs-4">></p>
            <a class="d-inline fw-normal fs-4 text-decoration-none text-reset" href="shipping_info.php">shipping</a>
            <p class="d-inline fw-normal fs-4">></p>
            <p class="d-inline fw-bolder fs-4">payment</p>
        </div>
        <?php
            include_once('../../include/database.php');
            $database = new Connection();
            $db = $database->open();

            $sql = $db->prepare("SELECT first_name, last_name, email, phone_number FROM user WHERE id=:uid");
            //bind
            $sql->bindParam(':uid', $_SESSION['pid']);
            $sql->execute();
            if($display=$sql->fetch(PDO::FETCH_ASSOC)){
                $fullname = $display['first_name']." ".$display['last_name'];
        ?>
        <!--form content-->
        <form class="payment-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
            <div class="row">
                <div class="col">
                    <div class="mt-3 text-end edit-btn">
                        <button id="paymentinfo-edit" onClick="edit_info(this)" type="button">
                            <span class="iconify" data-icon="ep:edit"></span>
                            <p id="btn-text" class="d-inline">edit</p>
                        </button>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <input id="form-input" type="text" class="form-control border-dark shadow-none rounded-0" name="name" value="<?php echo $fullname; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <input id="form-input" type="email" class="form-control border-dark shadow-none rounded-0" name="email" value="<?php echo $display['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phonenumber" class="col-sm-2 col-form-label">Phone #</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <input id="form-input" type="text" class="form-control border-dark shadow-none rounded-0" name="phonenumber" value="<?php echo $display['phone_number']; ?>" readonly>
                        </div>
                    </div>
        <?php
            }
            //close connection
            $database->close();
        ?>
                    <div class="row mb-3">
                        <label for="ship" class="col-sm-2 col-form-label">Ship</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <textarea id="form-input" class="form-control border-dark shadow-none rounded-0" name="addr" rows="3" readonly><?php echo $_SESSION['address'].", ".$_SESSION['city'].", ".$_SESSION['postal'].", ".$_SESSION['province']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="method" class="col-sm-2 col-form-label">Method</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <input id="form-input" type="text" class="form-control border-dark shadow-none rounded-0" name="ship_method" value="<?php echo $_SESSION['ship_method']; ?>" readonly>
                        </div>
                    </div>
                    <div class="mb-2 d-flex align-items-center mt-5">
                        <span class="iconify fs-1 me-3" data-icon="fluent:payment-16-regular"></span>
                        <p class="fs-3 mb-1">Payment Method</p>
                    </div>
                    <?php
                        include_once('../../include/database.php');
                        $database = new Connection();
                        $db = $database->open();

                        $sql = $db->prepare("SELECT name FROM payment_method");
                        //bind
                        $sql->execute();
                        while($display=$sql->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="col-8 delivery ms-5">
                        <div class="btn-group-vertical w-100" data-toggle="buttons">
                            <label class="p-2 border border-dark text-start w-100">
                                <?php
                                    if($display['name'] == "CashonDelivery"){
                                ?>
                                <input type="radio" name="payment-option" id="option" value="<?php echo $display['name']; ?>" <?php if (isset($_POST['payment-option'])) echo "checked";?>> Cash on Delivery
                                <?php
                                    }
                                    else{
                                ?>
                                <input type="radio" name="payment-option" id="option" value="<?php echo $display['name']; ?>" <?php if (isset($_POST['payment-option'])) echo "checked";?>> <?php echo $display['name']; ?>
                                <?php
                                    }
                                ?>
                            </label>
                        </div>
                    </div>
                    <?php
                        }
                        //close connection
                        $database->close();
                    ?>
                    <div class="error mb-2 ms-5" style="color:red;">
                        <?php echo $error['pay_method']; ?>
                    </div>
                    <div class="mt-3 d-flex">
                        <span class="iconify fs-1 me-3" data-icon="bx:comment-error"></span>
                        <p class="fs-3 mt-1">Message</p>
                    </div>
                    <div class="col-sm-10 ms-5 mb-5">
                        <textarea class="form-control border-dark shadow-none rounded-0" name="message" rows="3"></textarea>
                    </div>
                </div>
                <div class="col">
                    <!--display container-->
                    <div class="displaytotal border border-dark mx-5 mb-5">
                        <?php
                            if(isset($_SESSION['cart_checkout_id'])){
                                include_once('../../include/database.php');
                                $database = new Connection();
                                $db = $database->open();
                                $checkout_id = $_SESSION['cart_checkout_id'];
                                $sum = 0;

                                try{
                                    $sql = $db->prepare("SELECT c.product_name, c.quantity, c.subtotal, cu.img_path  FROM cart c JOIN cart_uploads cu 
                                                        WHERE c.id IN($checkout_id) AND c.id=cu.cart_id");
                                    $sql->execute();
                                    while($row=$sql->fetch(PDO::FETCH_ASSOC)){
                                        $sum += $row['subtotal'];
                        ?>
                        <div class="display-content-container mx-3 py-3">
                            <div class="display-content d-flex justify-content-between py-3">
                                <div class="d-flex">
                                    <div class="img-container me-3">
                                        <img src="<?php echo "../../".$row['img_path']; ?>" class="" alt="">
                                    </div>
                                    <p class="fs-3"><?php echo $row['product_name']; ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fs-3 me-5"><?php echo $row['quantity']; ?></p>
                                    <p class="fs-3 ms-5"><?php echo "₱".$row['subtotal']; ?></p>
                                </div>
                            </div>
                        </div>
                            <?php
                                    }
                            ?>
                        <hr class="mx-3">
                        <div class="d-flex justify-content-between mx-4">
                            <p>Subtotal</p>
                            <p><?php echo "₱".number_format(($sum),2); ?></p>
                        </div>
                        <div class="d-flex justify-content-between mx-4">
                            <p class="mb-2">Shipping Fee</p>
                            <p><?php echo "₱".number_format(($_SESSION['shipping_fee']),2); ?></p>
                        </div>
                        <hr class="mx-3">
                        <div class="d-flex justify-content-between mx-4">
                            <p class="mb-2">Total</p>
                            <p><?php echo "₱".number_format($sum+$_SESSION['shipping_fee'],2); ?></p>
                        </div>
                        <br>
                        <?php             
                                }
                                catch(PDOException $e){
                                    $_SESSION['msg'] = $e->getMessage();
                                }
                            }
                            elseif(isset($_SESSION['buynow_id'])){
                        ?>          
                        <div class="display-content-container mx-3 py-3">
                                <div class="display-content d-flex justify-content-between py-3">
                                    <div class="d-flex">
                                        <div class="img-container me-3">
                                            <img src="<?php echo "../../".$_SESSION['img_path']; ?>"  alt="">
                                        </div>
                                        <p class="fs-3"><?php echo $_SESSION['product_name']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-3 me-5"><?php echo $_SESSION['qty']; ?></p>
                                        <p class="fs-3 ms-5"><?php echo "₱".$_SESSION['subtotal']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr class="mx-3">
                            <div class="d-flex justify-content-between mx-4">
                                <p>Subtotal</p>
                                <p><?php echo "₱".$_SESSION['subtotal']; ?></p>
                            </div>
                            <div class="d-flex justify-content-between mx-4">
                                <p class="mb-2">Shipping Fee</p>
                                <p><?php echo "₱".number_format(($_SESSION['shipping_fee']),2); ?></p>
                            </div>
                            <hr class="mx-3">
                            <div class="d-flex justify-content-between mx-4">
                                <p class="mb-2">Total</p>
                                <p><?php echo "₱".number_format($_SESSION['subtotal']+$_SESSION['shipping_fee'],2); ?></p>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    <!--place order button-->
                    <div class="checkout d-grid mx-5 ">
                        <button type="submit" name="submit" class="btn-pink btn-shadow btn btn-lg active py-2 border-0 fw-normal">PLACE ORDER</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../../assets/javascript/index.js"></script>

<?php include('../../include/footer.php');
