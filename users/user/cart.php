<?php
    session_start();
    include('process/cart_process.php');
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
    <div class="container-fluid cart p-0">
        <?php
            if(isset($_SESSION['msg']) and $_SESSION['msg'] !=''){
            ?>
            <div class="alert alert-danger py-4" role="alert">
                <h4><?php echo $_SESSION['msg']; ?></h4>
            </div>
                <?php
                unset($_SESSION['msg']);
            }
            elseif(isset($_SESSION['checkout_error']) and $_SESSION['checkout_error'] !=''){
            ?>
            <div class="alert alert-danger py-4" role="alert">
                <h4><?php echo $_SESSION['checkout_error']; ?></h4>
            </div>
                <?php
                unset($_SESSION['checkout_error']);
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
            $sql = $db->prepare("SELECT c.id, c.product_name, c.product_price, c.quantity, c.add_ons, c.subtotal, cu.img_path
                        FROM cart c JOIN cart_uploads cu WHERE c.id=cu.cart_id");
            $sql->execute();
            $count = $sql->rowCount();

            if($count == 0){     
        ?>
            <div class="ms-5">
                <h1>Your Cart is empty.</h1>
            </div>
        <?php
            }else{
        ?>
        <?php
                while($row=$sql->fetch(PDO::FETCH_ASSOC)){          
        ?>
            <hr>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="content d-flex align-items-center justify-content-between">
                        <div class="mx-3 d-flex align-items-center mt-2">
                            <div class="checkbox">
                                <input type="checkbox" name="checkboxes[]" onClick="get_val(this)" class="shadow-none border-dark rounded-0 cart-checkbox" style="height:30px;width:30px;" value="<?php echo $row['id']; ?>">
                            </div>
                            <div class="box border border-dark ms-3">
                                <img src="<?php echo "../../".$row['img_path']; ?>" class="img-fluid" alt="">
                            </div>
                            <div class="text ms-3 mx-3">
                                <div class="mx-auto">
                                    <p class="fs-4"><?php echo $row['product_name']; ?></p>
                                </div>
                                <div id="qty" class="d-flex border border-dark" style="width:100px;">
                                    <div role="button" class="inc border-0 w-25 fs-3 text-center align-self-center px-2">+</div>
                                    <input type="text" id="cart-qtybox" name="cart-qtybox" class="text-center border-0 fs-5" value="<?php echo $row['quantity']; ?>" readonly style="height:50px;width:50px;">
                                    <div role="button" class="dec border-0 w-25 fs-3 text-center align-self-center px-2">-</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <!-- holds the price of the product -->
                            <input type="text" id="price-holder" hidden value="<?php echo $row['product_price']; ?>">
                            <!-- holds the value of add-ons -->
                            <input type="text" id="addons-holder" hidden value="<?php echo $row['add_ons']; ?>">
                            <!-- holds the subtotal value -->
                            <input type="text" id="subtotal-holder" class="text-end border-0 fs-5 mb-1 me-5" value="<?php echo "₱".$row['subtotal']; ?>">
                            <!-- button for modal -->
                            <a class="border-0" style="background-color:#fff;" data-bs-toggle="modal" data-bs-target="#deletecart<?php echo $row['id']; ?>">
                                <span class="iconify fs-1" data-icon="bi:x" style="color: #c4c4c4;"></span>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="deletecart<?php echo $row['id']; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletecartLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <input type="text" name="modal_id" value="<?php echo $row['id']; ?>" hidden>
                                            <p class="fs-4 text-center">Remove from cart?</p>
                                            <div class="d-grid col-3 mx-auto mb-3">
                                                <button type="submit" name="delete_cart" class="d-block btn btn-dark btn-shadow mb-3">Confirm</button>
                                                <button type="button" class="btn btn-light btn-shadow" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
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
                            <button type="button" name="delete_checkbox" class="text-center py-1 px-2 fs-4 border-0 btn-pink btn-shadow" data-bs-toggle="modal" data-bs-target="#del_checkbox">
                                <span style="width:35px;height:30px;" class="iconify" data-icon="bi:trash"></span> Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="del_checkbox" data-bs-keyboard="false" tabindex="-1" aria-labelledby="del_checkboxLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p class="fs-4 text-center">Remove selected items from cart?</p>
                                            <div class="d-grid col-3 mx-auto mb-3">
                                                <button type="submit" name="delete_checkbox" class="d-block btn btn-dark btn-shadow mb-3">Confirm</button>
                                                <button type="button" class="btn btn-light btn-shadow" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="checkout-box btn-shadow float-end me-4" style="width: 650px;height: 200px;background: rgba(196, 196, 196, 0.47);">
                        <div class="d-flex justify-content-between mx-5 my-4">
                            <label for="subtotal" class="fs-4">Subtotal</label>
                            <input type="text" id="display-subtotal" name="subtotal" class="text-center border-0" placeholder="3" value="₱0.00">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="checkout" class="text-reset text-decoration-none text-center py-1 w-100 mx-5 fs-4 border-0 btn-pink btn-shadow">
                                CHECK OUT ORDER
                            </button>
                        </div>
                    </div>
                </form>
        <?php
            }
        ?>
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
