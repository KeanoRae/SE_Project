<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../../include/header.php');
    include('../../../include/navbar.php');
    include('../process/account_process.php');
?>

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
                        elseif($status == "To ship"){
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
                    <div class="col-md-6">
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3 mt-2" data-icon="bx:id-card"></span>
                                <p class="mb-0 fs-4 mt-2">Order ID</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5 lh-1" style="color: #7F7B7B;"><?php echo $id; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3 mt-2" data-icon="carbon:user-avatar-filled-alt"></span>
                                <p class="mb-0 fs-4 mt-2">Name</p>
                            </div>
                            <p class="my-0 fs-4 ms-5 lh-1" style="color: #7F7B7B;"><?php echo $name; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3 mt-2" data-icon="carbon:email"></span>
                                <p class="mb-0 fs-4 mt-2">Email</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5 lh-1" style="color: #7F7B7B;"><?php echo $email; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3 mt-2" data-icon="entypo:location"></span>
                                <p class="mb-0 fs-4 mt-2">Delivery Address</p>
                            </div>
                            <p class="mb-4 fs-4 ms-5 lh-1" style="color: #7F7B7B;"><?php echo $addr; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3 mt-2"  data-icon="healthicons:i-schedule-school-date-time"></span>
                                <p class="mb-0 fs-4 mt-2">Order Date/Time</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5 lh-1" style="color: #7F7B7B;"><?php echo $date; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3 mt-2"  data-icon="akar-icons:phone"></span>
                                <p class="mb-0 fs-4 mt-2">Phone Number</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5 lh-1" style="color: #7F7B7B;"><?php echo $num; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3 mt-2"  data-icon="fluent:payment-16-regular"></span>
                                <p class="mb-0 fs-4 mt-2">Payment Method</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5 lh-1" style="color: #7F7B7B;">Gcash</p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3 mt-2"  data-icon="grommet-icons:deliver"></span>
                                <p class="mb-0 fs-4 mt-2">Shipping Method</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5 lh-1" style="color: #7F7B7B;"><?php echo $ship_method; ?></p>
                        </div>
                    </div>
                </div>
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
                        <tr>
                            <td>
                                <p class="mb-0 fs-4">1</p>
                            </td>
                            <td>
                                <p class="mb-0 fs-4 text-start"><?php echo $productname; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 fs-4"><?php echo $quantity; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 fs-4"><?php echo "₱".$price; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 fs-4"><?php echo "₱".$addons; ?></p>
                            </td>
                            <td>
                                <p class="mb-5 fs-4"><?php echo "₱".$subtotal; ?></p>
                            </td>
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
                                    <p class="mb-0 me-4 fs-4 text-end"><?php echo "₱".number_format($subtotal+$shipping_fee,2); ?></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p class="text-start ms-3 fs-4">Uploaded Image</p>
                                <div class="display-image text-start">
                                    <img src="<?php echo "../../../".$uploaded_img; ?>" class="img-fluid p-2">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php if($status == "Pending") { ?>
                                    <button name="#" class="px-4 py-1 fs-4 my-2 ms-2 border border-dark btn-pink btn-shadow">cancel</button>
                                <?php 
                                      }
                                      elseif($status !== "Pending") {
                                        if($receipt_status == "uploaded" or $receipt_status == "verified"){
                                ?>
                                    <div class="col-9 display-image">
                                        <p class="text-start ms-3 fs-4">Uploaded Receipt</p>
                                        <img src="<?php echo "../../../".$receipt; ?>" class="img-fluid p-2">
                                    </div>
                                    <?php
                                            if($status == "To ship" or $status == "Order Received"){
                                                $order_status = ($status == "Order Received") ? "disabled":"";
                                    ?>
                                        <div class="text-end">
                                            <button name="to-complete" class="px-3 py-1 fs-4 my-2 ms-4 border border-dark btn-pink btn-shadow" <?php echo $order_status; ?>>ORDER RECEIVED</button>
                                        </div>
                                <?php
                                            }  
                                        }
                                      }
                                      elseif($receipt_status == "unverified"){
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
