<?php 
    session_start();
    //echo 'email = '.$_SESSION['email'];
    //echo "<br>";
    //echo 'id = '.$_SESSION['pid'];
    //echo "<br>";
    //echo 'type = '.$_SESSION['user_type'];
    //echo "<br>";
    //if(isset($_SESSION['product_name'])){
        //echo $_SESSION['product_name'];
    //}
    //else{
        //echo "Not set";
    //}
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
            $sql = $db->prepare("SELECT o.id, o.ship_name, p.product_name, od.quantity, od.product_price
                                FROM orders o JOIN order_details od JOIN product p ON o.id=od.order_id AND od.product_id=p.id
                                WHERE customer_id=:uid AND o.order_status=2"
                                 );
            $sql->bindParam(':uid',$_SESSION['pid'],PDO::PARAM_INT);
            $sql->execute();
            $count = $sql->rowCount();

            if($count == 0){           
        ?>
        <div class="content mx-5">
            <p class="header m-0 ms-4">Order History</p>
            <p class="placeholder ms-5">You haven't placed any orders yet.</p>
        </div>
        <?php
            }
            else{
                
        ?>
            <div class="tmp mx-3 mb-4">
                <div class="title d-flex justify-content-between mx-2 py-2 px-3 border border-dark">
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="user-pending.php">pending</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 fw-bolder" href="#">to pay</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="#">on-process</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="#">to ship</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="#">cancelled</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="#">completed</a>
                </div>
            </div>

        <?php
                while($row=$sql->fetch(PDO::FETCH_ASSOC)){
        ?>
            <form action="">
                <div class="box border border-dark mb-2 mx-4">
                    <div class="row ms-2 pt-1">
                        <?php echo $row['ship_name']; ?>
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
                                <div class="txt"><p style="color:#8D8B8B;">Add-ons: </p></div>
                                <div class="txt"><p>Add-ons Price</p></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="bot">
                        <div class="txt text-end me-3 mb-4">
                            <p class="fs-5" style="word-spacing:40px;">Total ₱420</p>
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

        <!------------------------------------------footer------------------------------------------>
        <footer>
            <div class="row">
                <div class="col d-flex flex-column">
                    <a class="text-decoration-none text-reset mt-3" href="contact.php">Contact</a>
                    <a class="text-decoration-none text-reset" href="about.php">About</a>
                    <a class="text-decoration-none text-reset mb-4" href="policy.php">Return Policy</a>
                </div>
                <div class="col">
                    <p class="fw-bold mt-3">Social Media</p>
                    <p class="text-decoration-underline">https://www.facebook.com/NJglasspainting</p>
                    <p class="mb-4">https://www.instagram.com/njglasspainting/</p>
                </div>
            </div>
        </footer>
    </div>




  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
