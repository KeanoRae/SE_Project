<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="../../../assets/css/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">

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
                <a class="nav-link" href="../trackorders.php">order status</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="../../../logout.php">log out</a>
            </li>
        </ul>
    </nav>

    <!--header-->
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="../user_homepage.php"><img src="../../../assets/images/header-logo1.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-9">
                <div class="search-box d-flex mt-3 float-end">
                    <!-- <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span> -->
                    <div class="icons mx-4">
                        <a class="text-reset" href="user-pending.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="../cart.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid account p-0">
        <p class="header text-center mt-4">My Account</p>
        <br>
        <br>
        <?php
            session_start();
            include_once('../../../include/database.php');
            $database = new Connection();
            $db = $database->open();
            $check_order = $db->prepare("SELECT id FROM orders");
            //bind param                                 
            $check_order->execute();
            $count = $check_order->rowCount();

            if($count == 0){           
        ?>
        <div class="content mx-5">
            <p class="header m-0 ms-4">Order History</p>
            <p class="placeholder ms-5">You haven't placed any orders yet.</p>
        </div>
        <?php
            }
            else{

                 $sql = $db->prepare("SELECT o.id, o.receiver_name, p.product_name, od.quantity, od.product_price, od.add_ons, od.add_ons_details, od.uploaded_image
                                    FROM orders o JOIN order_details od JOIN product p ON o.id=od.order_id AND od.product_id=p.id
                                    WHERE customer_id=:uid AND o.order_status=3 GROUP BY o.id ORDER BY o.order_date DESC"
                                    );
                 // bind param
                $sql->bindParam(':uid',$_SESSION['pid'],PDO::PARAM_INT);
                $sql->execute();
                                
        ?>
            <div class="tmp mx-3 mb-4">
                <div class="title d-flex justify-content-between mx-2 py-2 px-3 border border-dark">
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="user-pending.php">pending</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="user-to-pay.php">to pay</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="user-onprocess.php">on-process</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="user-ship.php">to ship</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="user-completed.php">completed</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 fw-bolder" href="user-cancelled.php">cancelled</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="user-declined.php">declined</a>
                </div>
            </div>

        <?php
                while($row=$sql->fetch(PDO::FETCH_ASSOC)){
        ?>
            <form action="">
                <div class="box border border-dark mb-2 mx-4">
                    <div class="row ms-2 pt-1">
                        <?php echo $row['receiver_name']; ?>
                    </div>
                    <hr class="mt-1">
                    <div class="inner-box d-flex">
                        <div class="box ms-3" style="height: 77px;width: 77px;">
                            <img src="<?php echo "../../../".$row['uploaded_image']; ?>" class="img-fluid" alt="">
                        </div>
                        <div class="text w-100 mx-3">
                            <div class="row1 d-flex justify-content-between">
                                <div class="txt"><p><?php echo $row['product_name']; ?></p></div>
                                <div class="txt"><p><?php echo "x".$row['quantity']; ?></p></div>
                                <div class="txt"><p><?php echo "₱".$row['product_price']; ?></p></div>
                            </div>
                            <div class="row2 d-flex justify-content-between">
                                <div class="txt"><p style="color:#8D8B8B;">Add-ons: <?php echo $row['add_ons_details']; ?></p></div>
                                <div class="txt"><p><?php echo "₱".$row['add_ons']; ?></p></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="bot">
                        <div class="txt text-end me-3 mb-4">
                            <p class="fs-5" style="word-spacing:40px;">Subtotal <?php echo "₱".number_format(($row['product_price']*$row['quantity']) + $row['add_ons'], 2);?></p>
                        </div>
                        <div class="text-end me-3 mb-3">
                            <a href="account-details.php?id=<?php echo $row['id']; ?>" class="px-3 py-1 border text-decoration-none border-dark btn-pink btn-shadow py-2">VIEW DETAILS</a>
                            <!--
                            <button type="submit" class="px-5 py-1 border border-dark btn-pink btn-shadow">CANCEL</button>
                            -->
                        </div>
                    </div>
                </div>
            </form>
        <?php
                }
            }           
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

<?php include('../../../include/footer.php'); ?>