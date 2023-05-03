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
<?php 
    session_start();
    include('../process/account_process.php');
?>

    <!--content-->
    <div class="container-fluid p-0">
        <p class="header fs-2 fw-bold mt-5 mb-0 mx-5 mb-3">Order History</p>
        <div class="detail-container mx-auto">
        <?php
            $backpage;
            if($status == "Pending"){
                $backpage = "user-pending.php";
            }
            elseif($status == "Confirmed"){
                $backpage = "user-to-pay.php";
            }
            elseif($status == "On Process"){
                $backpage = "user-onprocess.php";
            }
            elseif($status == "To ship"){
                $backpage = "user-ship.php";
            }
            elseif($status == "Cancelled"){
                $backpage = "user-cancelled.php";
            }
            elseif($status == "Completed"){
                $backpage = "user-completed.php";
            }
        ?>
            <div class="d-flex align-items-center mb-1">
            <a href="<?php echo $backpage; ?>" class="text-reset text-decoration-none fs-3">
                <span class="iconify fs-1" data-icon="ep:arrow-left"></span>Back
            </a>
            </div>
            <div class="detail-header text-end py-2">
                <p class="d-inline fw-bold fs-3">|</p>
                <p class="d-inline fs-6 me-4">
                    <?php
                        if($status == "Pending"){
                            echo "PENDING";
                        }
                        elseif($status == "Confirmed"){
                            echo "TO PAY";
                        }
                        elseif($status == "On Process"){
                            echo "ON-PROCESS";
                        }
                        elseif($status == "To ship" OR $status == "Order Received"){
                            echo "TO SHIP";
                        }
                        elseif($status == "Cancelled"){
                            echo "CANCELLED";
                        }
                        elseif($status == "Completed"){
                            echo "COMPLETED";
                        }
                        
                    ?>
                </p>
            </div>
            <div class="detail-topbox mt-3 mb-2">
                <div class="row mx-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <input type="text" name="getid" value="<?php echo $id; ?>" hidden>
                            <input type="text" name="customer" value="<?php echo $customer_id; ?>" hidden>
                            <span class="iconify fs-2 me-3" data-icon="bx:id-card"></span>
                            <p class="mb-0 fs-4">Order ID</p>
                        </div>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $id; ?></p>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3"  data-icon="healthicons:i-schedule-school-date-time"></span>
                            <p class="mb-0 fs-4">Order Date/Time</p>
                        </div>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $date; ?></p>
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3" data-icon="carbon:user-avatar-filled-alt"></span>
                            <p class="mb-0 fs-4">Name</p>
                        </div>
                        <p class="my-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $name; ?></p>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3"  data-icon="akar-icons:phone"></span>
                            <p class="mb-0 fs-4">Phone Number</p>
                        </div>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $num; ?></p>
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3" data-icon="carbon:email"></span>
                            <p class="mb-0 fs-4">Email</p>
                        </div>
                        <input type="text" name="email" value="<?php echo $email; ?>" hidden>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $email; ?></p>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3"  data-icon="fluent:payment-16-regular"></span>
                            <p class="mb-0 fs-4">Payment Method</p>
                        </div>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">Gcash</p>
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3" data-icon="entypo:location"></span>
                            <p class="mb-0 fs-4">Delivery Address</p>
                        </div>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $addr; ?></p>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3"  data-icon="grommet-icons:deliver"></span>
                            <p class="mb-0 fs-4">Shipping Method</p>
                        </div>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $ship_method; ?></p>
                    </div>
                </div>
                <?php
                    if($status == "To ship" or $status == "Completed"){
                        include_once('../../../include/database.php');
                        $database = new Connection();
                        $db = $database->open();

                        $sql = $db->prepare("SELECT OR_Number, BC_Number FROM tracking_details WHERE order_id=:oid");
                        //bind Param
                        $sql->bindParam(':oid', $id);
                        $sql->execute();
                        if($row=$sql->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="row mx-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3"  data-icon="material-symbols:receipt-outline"></span>
                            <p class="mb-0 fs-4">OR Number</p>
                        </div>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $row['OR_Number']; ?></p>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <span class="iconify fs-2 me-3"  data-icon="icon-park-solid:branch-one"></span>
                            <p class="mb-0 fs-4">BC Number</p>
                        </div>
                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $row['BC_Number']; ?></p>
                    </div>
                </div>
                <?php
                        }
                        else{
                            echo $id;
                            echo "error";
                        }
                    }
                ?>
            </div>
            <div class="my-2 border border-dark">
                <div class="d-flex px-2 py-1 align-items-center">
                    <span class="iconify fs-2 me-2"  data-icon="fa-regular:comment-dots"></span>
                    <p class="mb-0 fs-4">Message</p>
                </div>
                <textarea class="form-control border-0 shadow-none rounded-0 mb-2 fs-4" name="message" rows="3" readonly><?php echo $message; ?></textarea>
            </div>
            
            <div class="detail-botbox">
                <table class="table text-center">
                    <thead>
                        <tr class="fs-4">
                            <th scope="col" class="col-sm-1">No.</th>
                            <th scope="col" class="col-sm-4 text-start">Product</th>
                            <th scope="col" class="col-sm-1">Q</th>
                            <th scope="col" class="col-sm-2">Price</th>
                            <th scope="col" class="col-sm-3">Add-ons</th>
                            <th scope="col" class="col-sm-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once('../../../include/database.php');
                        $database = new Connection();
                        $db = $database->open();
                        $counter = 1;
                        $order_sum = 0;

                        $sql = $db->prepare("SELECT p.product_name, od.quantity, od.product_price, od.add_ons, (od.quantity*od.product_price)+od.add_ons AS subtotal,
                                             od.uploaded_image FROM product p JOIN orders o JOIN order_details od WHERE od.order_id=o.id AND 
                                             od.product_id=p.id AND o.id=:id");

                        //bind Param
                        $sql->bindParam(':id', $id);
                        $sql->execute();
                        while($row=$sql->fetch(PDO::FETCH_ASSOC)){ 
                    ?>
                        <tr>
                            <td>
                                <p class="mb-0 fs-4"><?php echo $counter; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 fs-4 text-start"><?php echo $row['product_name']; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 fs-4"><?php echo $row['quantity']; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 fs-4"><?php echo "₱".$row['product_price']; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 fs-4"><?php echo "₱".$row['add_ons']; ?></p>
                            </td>
                            <td>
                                <p class="mb-5 fs-4"><?php echo "₱".$row['subtotal']; ?></p>
                            </td>
                        <?php
                            $counter++;
                            $order_sum += $row['subtotal'];
                            $img_path[] = $row['uploaded_image'];
                        }
                        ?>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td>
                                <div class="text-start">
                                    <p class="mb-0 fs-4">Shipping Fee</p>
                                </div>
                                <div class="text-start">
                                    <p class="mb-0 fs-4">Total</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <p class="mb-0 me-4 fs-4 text-end"><?php echo "₱".$shipping_fee; ?></p>
                                </div>
                                <div>
                                    <p class="mb-0 me-4 fs-4 text-end"><?php echo "₱".number_format($order_sum+$shipping_fee,2); ?></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p class="text-start ms-3 fs-4">Uploaded Image</p>
                                <div class="display-image d-flex">
                                    <?php
                                        foreach($img_path as $val){
                                    ?>
                                    <img src="<?php echo "../../../".$val; ?>" class="img-fluid p-2">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php
                                    if($status == "Cancelled"){
                                        echo "";
                                ?>
                                <?php }
                                    elseif($status == "Pending"){ 
                                ?>
                                    <!--Cancel Button for Pending Status-->
                                    <div class="text-start float-end">
                                        <button type="button" class="px-5 py-2 fs-3 my-2 ms-2 border border-dark btn-pink btn-shadow" data-bs-toggle="modal" data-bs-target="#cancelbtn">cancel</button>
                                    </div>
                                    <!--Modal for Cancel Button-->
                                    <div class="modal fade" id="cancelbtn" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cancelbtnLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="fs-4 text-center">Do you wish to cancel your order?</p>
                                                    <div class="d-grid col-3 mx-auto mb-3">
                                                        <button type="submit" name="cancel_btn" class="d-block btn btn-dark btn-shadow mb-3">Confirm</button>
                                                        <button type="button" class="btn btn-light btn-shadow" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                      }
                                      elseif($status !== "Pending") {
                                        if($receipt_status == "uploaded" or $receipt_status == "unverified"){
                                ?>
                                    <div class="col-9 display-image">
                                        <p class="text-start ms-3 fs-4">Uploaded Receipt</p>
                                        <img src="<?php echo "../../../".$receipt; ?>" class="img-fluid p-2">
                                    </div>
                                    <?php
                                            if($status == "To ship" or $status == "Order Received"){
                                    ?>
                                        <div class="text-end">
                                            <button name="to-complete" class="px-3 py-1 fs-4 my-2 ms-4 border border-dark btn-pink btn-shadow">ORDER RECEIVED</button>
                                        </div>
                                <?php
                                            }  
                                        }
                                        elseif($receipt_status == "verified"){
                                ?>
                                    <div class="col-9 d-inline-block text-start receipt">
                                        <input type="file" id="receipt-btn" name="receipt" hidden/>
                                        <label class="ms-2 px-3 py-1" for="receipt-btn">upload receipt</label>
                                        <span id="file-chosen">No file chosen</span>
                                    </div>
                                    <div class="d-inline-block text-end border-start">
                                        <button type="submit" name="upload_receipt" class="px-5 py-1 my-2 me-2 fs-4 border border-dark btn-pink btn-shadow">UPLOAD</button>
                                    </div>
                                <?php
                                      }
                                    }
                                ?>
                            </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
<script src="../../../assets/javascript/index.js"></script>
<script>
    window.onload = upload_receipt();
</script>
<?php include('../../../include/footer.php'); ?>
