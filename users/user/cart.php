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
        <?php
            if(isset($_SESSION['msg']) and $_SESSION['msg'] !=''){
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
        <p class="text-center fs-1 fw-bolder mt-4">CART</p>
        <?php
            include_once('../../include/database.php');
            $database = new Connection();
            $db = $database->open();
            $sql = $db->prepare("SELECT * FROM cart WHERE customer_id=:uid");
            $sql->bindParam(':uid',$_SESSION['pid'],PDO::PARAM_INT);
            $sql->execute();
            $count = $sql->rowCount();

            if($count == 0){     
                echo "";   
        ?>
        <?php
            }else{
        ?>
        <?php
                while($row=$sql->fetch(PDO::FETCH_ASSOC)){          
        ?>
            <hr>
            <div class="content d-flex align-items-center justify-content-between">
                <div class="mx-3 d-flex align-items-center mt-2">
                    <div class="checkbox">
                        <input type="checkbox" id="cart-checkbox" class="shadow-none border-dark rounded-0" style="height:30px;width:30px;" value="">
                    </div>
                    <div class="box border border-dark ms-3" style="height: 124px;width: 112px;"></div>
                    <div class="text ms-3 mx-3">
                        <div class="mx-auto">
                            <p class="fs-4"><?php echo $row['product_name']; ?></p>
                        </div>
                        <div id="qty" class="d-flex border border-dark" style="width:100px;">
                            <button type="button" class="border-0 ms-2" onClick="increase()"><i class="fas fa-plus"></i></button>
                            <input type="text" id="qtybox" name="qtybox" class="text-center border-0" value="<?php echo $row['quantity']; ?>" style="height:50px;width:50px;">
                            <button type="button" class="border-0 me-2" onClick="decrease()"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <!-- holds the subtotal value -->
                    <p id="subtotal-holder" class="mb-1 me-3"><?php echo "₱".$row['subtotal']; ?></p>
                    <!-- button for modal -->
                    <a class="border-0" style="background-color:#fff;" data-bs-toggle="modal" data-bs-target="#deletecart<?php echo $row['id']; ?>">
                        <span class="iconify fs-1" data-icon="bi:x" style="color: #c4c4c4;"></span>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="deletecart<?php echo $row['id']; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletecartLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="process/cart_process.php?id=<?php echo $row['id']; ?>" method="POST">
                                    <div class="modal-body">
                                        <p class="fs-4 text-center">Remove from cart?</p>
                                        
                                        <div class="d-grid col-3 mx-auto mb-3">
                                            <button type="submit" name="delete_cart" class="d-block btn btn-dark btn-shadow mb-3">Confirm</button>
                                            <button type="button" class="btn btn-light btn-shadow" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <?php
                }
        ?>
            <div class="d-flex text-start me-2 mb-5">
                <div class="d-flex align-items-center ms-3 me-5">
                    <input type="checkbox" id="selectall-box" onClick="checkall(this)" class="shadow-none border-dark rounded-0" style="height:30px;width:30px;">
                    <label for="selectall-box" class="fs-4 ms-2">Select All</label>
                </div>
                <button id="cart-multidelete" class="text-center py-1 fs-4 border-0 btn-pink btn-shadow">
                    <span style="width:35px;height:30px;" class="iconify" data-icon="bi:trash"></span> Delete
                </button>
            </div>
            <div class="checkout-box btn-shadow float-end me-4" style="width: 650px;height: 200px;background: rgba(196, 196, 196, 0.47);">
                <div class="d-flex justify-content-between mx-5 my-4">
                    <p class="fs-4">Subtotal</p>
                </div>
                <div class="btt d-flex justify-content-center">
                    <button class="text-reset text-decoration-none text-center py-1 w-100 mx-5 fs-4 border-0 btn-pink btn-shadow">
                        CHECK OUT ORDER
                    </button>
                </div>
            </div>
        <?php
            }
        ?>
        <script>
        </script>
        <script src="../../assets/javascript/index.js"></script>
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
