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
            $database = new Connection();
            $db = $database->open();
            $sql = $db->prepare("SELECT ship_name, email, shipping_address, shipping_city, shipping_method FROM orders WHERE customer_id=:uid ORDER BY id DESC LIMIT 1");
            $sql->bindParam(':uid',$_SESSION['pid'],PDO::PARAM_INT);
            $sql->execute();
            if($row=$sql->fetch(PDO::FETCH_ASSOC)){
        ?>
        <form class="payment-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
            <div class="row">
                <div class="col">
                    <br>
                    <br>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-1 col-form-label me-5">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control border-dark shadow-none rounded-0" name="name" value="<?php echo $row['ship_name']; ?>" readonly>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['name']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-1 col-form-label me-5">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control border-dark shadow-none rounded-0" name="email" value="<?php echo $row['email']; ?>" readonly>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['email']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ship" class="col-sm-1 col-form-label me-5">Ship</label>
                        <div class="col-sm-10">
                            <textarea class="form-control border-dark shadow-none rounded-0" name="addr" rows="3" readonly><?php echo $row['shipping_address'].', '.$row['shipping_city']; ?>
                            </textarea>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['addr']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="method" class="col-sm-1 col-form-label me-5">Method</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control border-dark shadow-none rounded-0" name="method" value="<?php echo $row['shipping_method']; ?>" readonly>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['ship_method']; ?>
                            </div>
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
                                <?php echo $errors['pay_method']; ?>
                            </div>
                        </div>
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
        <?php
            //close connection
            $database->close();
            }
        ?>


        <!--------------------------------footer------------------------------->
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

  
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
