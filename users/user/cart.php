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
    include('../../include/header.php');
    include('../../include/navbar.php');
?>
    <div class="container-fluid cart p-0">
        <p class="text-center fs-1 fw-bolder mt-4">CART</p>
        <form action="" method="POST" class="mx-3">
            <div class="text-end me-3">
                <button class="border-0 fs-4" style="background-color:#fff;">edit</button>
            </div>
        <?php
            include_once('../../include/database.php');
            $database = new Connection();
            $db = $database->open();
            $sql = $db->prepare("SELECT * FROM cart WHERE customer_id=:uid");
            $sql->bindParam(':uid',$_SESSION['pid'],PDO::PARAM_INT);
            $sql->execute();

            while($row=$sql->fetch(PDO::FETCH_ASSOC)){          
        ?>
            <hr>
            <div class="content d-flex align-items-center justify-content-between">
                <div class="left d-flex align-items-center mt-2">
                    <div class="form-check">
                        <input class="form-check-input shadow-none border-dark rounded-0" style="height:30px;width:30px;" type="checkbox" value="">
                    </div>
                    <div class="box border border-dark ms-3" style="height: 124px;width: 112px;"></div>
                    <div class="text ms-3 mx-3">
                        <div class="mx-auto">
                            <p class="fs-4"><?php echo $row['product_name']; ?></p>
                        </div>
                        <div class="d-flex mx-auto border border-dark" style="width:100px;">
                            <button type="button" class="border-0 ms-2" onClick="increase()"><i class="fas fa-plus"></i></button>
                            <input type="text" id="qtybox" name="qtybox" class="text-center border-0" value="<?php echo $row['quantity']; ?>" style="height:50px;width:50px;" readonly>
                            <button type="button" class="border-0 me-2" onClick="decrease()"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="right d-flex align-items-center">
                    <p class="mb-1 me-3"><?php echo $row['subtotal']; ?></p>
                    <span class="iconify fs-1" data-icon="bi:x" style="color: #c4c4c4;"></span>
                </div>
            </div>
            <hr>
        <?php
            }
        ?>
            <div class="text-end me-2 mb-5">
                <button class="text-reset text-decoration-none text-center py-1 fs-4 border-0 btn-pink btn-shadow">
                    <span style="width:35px;height:30px;" class="iconify" data-icon="bi:trash"></span>
                </button>
            </div>
            <div class="checkout-box btn-shadow float-end" style="width: 650px;height: 200px;background: rgba(196, 196, 196, 0.47);">
                <div class="d-flex justify-content-between mx-5 my-4">
                    <p class="fs-4">Subtotal</ class="fs-4">
                    <p class="fs-4">390.00</p>
                </div>
                <div class="btt d-flex justify-content-center">
                    <button class="text-reset text-decoration-none text-center py-1 w-100 mx-5 fs-4 border-0 btn-pink btn-shadow">
                        CHECK OUT ORDER
                    </button>
                </div>
            </div>
            <script src="../../assets/javascript/index.js"></script>
        </form>
    </div>
    
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
        

<?php include('../../include/footer.php');
