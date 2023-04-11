<?php 
    session_start();
    include('process/shipping_info_process.php');
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
                    <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span>
                    <div class="icons mx-4">
                        <a class="text-reset" href="order-details/user-pending.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="cart.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid shipping-info p-0">
        <?php
            if(isset($_SESSION['msg']) and $_SESSION['msg'] !=''){
            ?>
            <div class="alert alert-danger py-4" role="alert">
                <h4><?php echo $_SESSION['msg']; ?></h4>
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
            <a class="d-inline fw-normal fs-4 text-decoration-none text-reset" href="cart.php">cart</a>
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
                        <?php
                            include_once('../../include/database.php');
                            $database = new Connection();
                            $db = $database->open();

                            $sql = $db->prepare("SELECT first_name, last_name, email, phone_number FROM user WHERE id=:uid");
                            //bind
                            $sql->bindParam(':uid', $_SESSION['pid']);
                            $sql->execute();
                            if($display=$sql->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <div class="col-6 mb-3">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $display['first_name']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $display['last_name']; ?>">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $display['email']; ?>">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="number">Phone No.</label>
                            <input type="text" class="form-control" name="number" value="<?php echo $display['phone_number']; ?>">
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-12 mb-3">
                            <label for="address">Unit or House No. & Street No.</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $var['addr']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['addr']; ?>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="barangay">Barangay</label>
                            <input type="text" class="form-control" name="barangay" value="<?php echo $var['brgy']; ?>">
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
                            <div>
                                <select name="region" class="w-100">
                                    <option value="" selected disabled hidden></option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "NCR") echo "selected"; ?>>NCR</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "CAR") echo "selected"; ?>>CAR</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region I") echo "selected"; ?>>Region I</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region II") echo "selected"; ?>>Region II</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region III") echo "selected"; ?>>Region III</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region IV") echo "selected"; ?>>Region IV</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region V") echo "selected"; ?>>Region V</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region VI") echo "selected"; ?>>Region VI</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region VII") echo "selected"; ?>>Region VII</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region VIII") echo "selected"; ?>>Region VIII</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region IX") echo "selected"; ?>>Region IX</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region X") echo "selected"; ?>>Region X</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region XI") echo "selected"; ?>>Region XI</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region XII") echo "selected"; ?>>Region XII</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "Region XIII") echo "selected"; ?>>Region XIII</option>
                                    <option <?php if(isset($_POST['region']) and $_POST['region'] == "BARMM") echo "selected"; ?>>BARMM</option>
                                </select>
                            </div>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['region']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="ms-5 mb-2">
                        <p class="my-0 fs-3"><span class="iconify pb-1 fs-1" data-icon="fluent:vehicle-truck-profile-24-regular"></span>Shipping Method</p>
                    </div>
                    <div class="col-12">
                        <div class="btn-group-vertical w-75 ms-5" data-toggle="buttons">
                            <label class="p-2 border border-dark text-start w-100">
                                <input type="radio" name="options" id="option1" value="JRS - Express" <?php if (isset($_POST['options']) && $_POST['options']=="JRS - Express") echo "checked";?>> JRS - Express
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
                    <!--display for cart checkout option-->
                    <?php
                        if(isset($_SESSION['cart_checkout_id'])){
                    ?>
                    <div class="displaytotal border border-dark mx-5">
                        <?php
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
                            <p>Total</p>
                            <p><?php echo "₱".number_format($sum,2); ?></p>
                        </div>
                        <br>
                    </div>
                    <?php             
                            }
                            catch(PDOException $e){
                                $_SESSION['msg'] = $e->getMessage();
                            }
                        }
                        elseif(isset($_SESSION['buynow_id'])){
                    ?>
                    <!--display for buy now option-->
                    <div class="displaytotal border border-dark mx-5">
                        <div class="display-content-container mx-3 py-3">
                            <div class="display-content d-flex justify-content-between py-3">
                                <div class="d-flex">
                                    <div class="img-container me-3">
                                        <img src="<?php echo "../../".$_SESSION['img_path']; ?>" alt="">
                                    </div>
                                    <p class="fs-3"><?php echo $_SESSION['product_name']; ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fs-3 me-5"><?php echo $_SESSION['qty']; ?></p>
                                    <p class="fs-3 ms-5"><?php echo "₱".$_SESSION['subtotal']; ?></p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <hr class="mx-3">
                        <div class="d-flex justify-content-between mx-4">
                            <p>Total</p>
                            <p><?php echo "₱".$_SESSION['subtotal']; ?></p>
                        </div>
                        <br>
                    </div>
                    <?php
                         }
                    ?>
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
