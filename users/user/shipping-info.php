<?php 
    session_start();
    echo 'email = '.$_SESSION['email'];
    echo "<br>";
    echo 'id = '.$_SESSION['pid'];
    echo "<br>";
    echo 'type = '.$_SESSION['user_type'];
    echo "<br>";
    if(isset($_SESSION['product_name'])){
        echo $_SESSION['product_name'];
    }
    include('../../include/header.php');
    include('../../include/navbar.php');
    include('process/shipping-info_process.php');
?>
    <div class="container-fluid shipping-info p-0">
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
        <div class="header ms-5">
            <a class="d-inline fw-normal fs-4 text-decoration-none text-reset" href="#">cart</a>
            <p class="d-inline fw-normal fs-4">></p>
            <p class="d-inline fw-bolder fs-4">shipping</p>
            <div class="title">
                <p class="fs-3 mb-0 mt-1"><span class="iconify pb-1 fs-1" data-icon="carbon:location"></span>Shipping Address</p>
            </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="row">
                <div class="col">
                    <br>
                    <div class="row ms-5">
                        <div class="col-6 mb-3">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $var['fname']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['fname']; ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $var['lname']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['lname']; ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $var['email']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['email']; ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="address">Unit or House No. & Street No.</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $var['addr']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['addr']; ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="baranggay">Baranggay</label>
                            <input type="text" class="form-control" name="baranggay" value="<?php echo $var['brgy']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['brgy']; ?>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="postal">Postal</label>
                            <input type="text" class="form-control" name="postal" value="<?php echo $var['postal']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['postal']; ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" value="<?php echo $var['city']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['city']; ?>
                            </div>
                        </div>
                        <div class="col-6 mb-5">
                            <label for="region">Region</label>
                            <input type="text" class="form-control" name="region" value="<?php echo $var['region']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['region']; ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="number">Phone No.</label>
                            <input type="text" class="form-control" name="number" value="<?php echo $var['phone']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['phone']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="ms-5 mt-5 mb-2">
                        <p class="my-0 fs-3"><span class="iconify pb-1 fs-1" data-icon="fluent:vehicle-truck-profile-24-regular"></span>Shipping Method</p>
                    </div>
                    <div class="col-12">
                        <div class="btn-group-vertical w-75 ms-5" data-toggle="buttons">
                            <label class="p-2 border border-dark border-bottom-0 text-start w-100">
                                <input type="radio" name="options" id="option1" value="JRS - Express" <?php if (isset($_POST['options']) && $_POST['options']=="JRS - Express") echo "checked";?>> JRS - Express
                            </label>
                            <label class="p-2 border border-dark text-start w-100">
                                <input type="radio" name="options" id="option2" value="M Lhuillier Padala" <?php if (isset($_POST['options']) && $_POST['options']=="M Lhuillier Padala") echo "checked";?>> M Lhuillier Padala
                            </label>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['method']; ?>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col mx-3">
                    <div class="displaytotal border border-dark mx-5">
                        <div class="content d-flex justify-content-between px-4 py-5">
                            <div class="left d-flex">
                                <div class="box border border-dark me-3"></div>
                                <p class="fs-3"><?php echo $_SESSION['product_name']; ?></p>
                            </div>
                            <div class="right d-flex justify-content-between">
                                <p class="me-5">1</p>
                                <p class="ms-5">₱ 390.00</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <hr class="mx-3">
                        <div class="bot d-flex justify-content-between mx-4">
                            <p class="">Subtotal</p>
                            <p>₱ 390.00</p>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="checkout d-grid mx-5">
                        <button type="submit" name="ship-btn" class="btn-pink btn-shadow btn btn-lg active py-2 border-0 fw-normal">CONTINUE TO PAYMENT</button>
                    </div>
                </div>
            </div>
        </form>

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
