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
    include('process/payment_process.php');
?>
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
            <a class="d-inline fw-normal fs-4 text-decoration-none text-reset" href="#">cart</a>
            <p class="d-inline fw-normal fs-4">></p>
            <p class="d-inline fw-normal fs-4">shipping</p>
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
            //close connection
            $database->close();
            }
        ?>
                    <div class="row mb-3">
                        <label for="ship" class="col-sm-2 col-form-label">Ship</label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <textarea id="form-input" class="form-control border-dark shadow-none rounded-0" name="addr" rows="3" readonly><?php echo $_SESSION['address'].", ".$_SESSION['city'].", ".$_SESSION['postal'].", ".$_SESSION['region']; ?></textarea>
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
                    <div class="col-8 delivery ms-5">
                        <div class="btn-group-vertical w-100" data-toggle="buttons">
                            <label class="p-2 border border-dark border-bottom-0 text-start w-100">
                                <input type="radio" name="payment-option" id="option1" value="Gcash" <?php if (isset($_POST['payment-option']) && $_POST['payment-option']=="Gcash") echo "checked";?>> Gcash
                            </label>
                            <label class="p-2 border border-dark border-bottom-0 text-start w-100">
                                <input type="radio" name="payment-option" id="option2" value="M Lhuillier Padala" <?php if (isset($_POST['payment-option']) && $_POST['payment-option']=="M Lhuillier Padala") echo "checked";?>> M Lhuillier Padala
                            </label>
                            <label class="p-2 border border-dark border-bottom-0 text-start w-100">
                                <input type="radio" name="payment-option" id="option3" value="Cebuana Lhuillier" <?php if (isset($_POST['payment-option']) && $_POST['payment-option']=="Cebuana Lhuillier") echo "checked";?>> Cebuana Lhuillier
                            </label>
                            <label class="p-2 border border-dark text-start w-100">
                                <input type="radio" name="payment-option" id="option4" value="Palawan Express" <?php if (isset($_POST['payment-option']) && $_POST['payment-option']=="Palawan Express") echo "checked";?>> Palawan Express
                            </label>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $error['pay_method']; ?>
                            </div>
                        </div>
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
                    <div class="displaytotal border border-dark mx-5">
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
                        <hr class="mx-3">
                        <div class="d-flex justify-content-between mx-4">
                            <p class="mb-2">Subtotal</p>
                            <p><?php echo "₱".$_SESSION['subtotal']; ?></p>
                        </div>
                        <div class="sp">
                            <p class="ms-4">Shipping Fee</p>
                            <p><?php ?></p>
                        </div>
                        <hr class="mx-3">
                        <div class="d-flex justify-content-between mx-4">
                            <p class="mb-2">Total</p>
                            <p><?php echo "₱".$_SESSION['subtotal']; ?></p>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="checkout d-grid mx-5">
                        <button type="submit" name="submit" class="btn-pink btn-shadow btn btn-lg active py-2 border-0 fw-normal">PLACE ORDER</button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </form>
    </div>
    <script src="../../assets/javascript/index.js"></script>

<?php include('../../include/footer.php');
