<?php 
    session_start();
    include('../../../include/header.php');
    include('../../../include/navbar.php');
?>
    <div class="container-fluid account p-0">
        <p class="header text-center mt-4">My Account</p>
        <br>
        <br>
        <?php
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

                 $sql = $db->prepare("SELECT o.id, o.receiver_name, p.product_name, od.quantity, od.product_price, od.add_ons, od.add_ons_details
                                FROM orders o JOIN order_details od JOIN product p ON o.id=od.order_id AND od.product_id=p.id
                                WHERE customer_id=:uid AND o.order_status=5 ORDER BY o.id DESC"
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
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 fw-bolder" href="user-completed.php">completed</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="user-cancelled.php">cancelled</a>
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
                        <div class="box border border-dark ms-3" style="height: 77px;width: 68px;"></div>
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
