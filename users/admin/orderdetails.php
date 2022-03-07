<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../include/header.php');
    include('../../include/navbar.php');
    include('sidebar.php');
    include('process/process.php'); 
?>
            <div class="col right">
                <p class="header fs-2 fw-bold mt-5 mb-0 mx-5">TRANSACTION</p>
                <p class="header fs-3 mx-5 mb-5">Order > <b>Order Details</b></p>
                <br>
                <br>
                <div class="table-responsive mx-5">
                    <table class="table">
                        <tbody>
                            <form action="process/update.php" method="POST">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <input type="hidden" name="getid" value="<?php echo $id; ?>">
                                            <span class="iconify fs-2 me-3" data-icon="bx:id-card"></span>
                                            <p class="mb-0 fs-4">Id</p>
                                        </div>
                                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $id; ?></p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="iconify fs-2 me-3"  data-icon="healthicons:i-schedule-school-date-time"></span>
                                            <p class="mb-0 fs-4">Order Date/Time</p>
                                        </div>
                                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $date; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="iconify fs-2 me-3" data-icon="carbon:user-avatar-filled-alt"></span>
                                            <p class="mb-0 fs-4">Name</p>
                                        </div>
                                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $name; ?></p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="iconify fs-2 me-3"  data-icon="akar-icons:phone"></span>
                                            <p class="mb-0 fs-4">Phone Number</p>
                                        </div>
                                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $num; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="iconify fs-2 me-3" data-icon="carbon:email"></span>
                                            <p class="mb-0 fs-4">Email</p>
                                        </div>
                                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $email; ?></p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="iconify fs-2 me-3"  data-icon="fluent:payment-16-regular"></span>
                                            <p class="mb-0 fs-4">Payment Method</p>
                                        </div>
                                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">Gcash</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="iconify fs-2 me-3" data-icon="entypo:location"></span>
                                            <p class="mb-0 fs-4">Delivery Address</p>
                                        </div>
                                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $addr; ?></p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="iconify fs-2 me-3"  data-icon="grommet-icons:deliver"></span>
                                            <p class="mb-0 fs-4">Shipping Method</p>
                                        </div>
                                        <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $ship_method; ?></p>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <table class="table t2 mt-1 text-center">
                        <thead>
                            <tr class="fs-4 rr">
                                <th scope="col" class="num">No.</th>
                                <th scope="col" class="product text-start">Product</th>
                                <th scope="col">Q</th>
                                <th scope="col" class="price">Price</th>
                                <th scope="col" class="subs">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="mb-3" >
                                <td>
                                    <p class="mb-0 fs-4">1</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-4"><?php echo $productname; ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-4"><?php echo $quantity; ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-4"><?php echo $price; ?></p>
                                </td>
                                <td>
                                    <p class="mb-5 fs-4"><?php echo $subtotal; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td>
                                    <div class="text-start">
                                        <p class="mb-0 ms-3 fs-4">Shipping Fee</p>
                                    </div>
                                    <div class="text-start">
                                        <p class="mb-0 ms-3 fs-4">Total</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p class="mb-0 fs-4">100.00</p>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-4">620.00</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-0">
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="text-start">
                                        <p class="mb-0 fs-4">uploaded image</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex mx-auto">
                                        <button class="px-1 py-1 fs-4 me-3 border border-dark btn-pink btn-shadow">cancel</button>
                                        <button name="confirm" class="px-1 py-1 fs-4 border border-dark btn-pink btn-shadow">confirm</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        </form>
                    </table>
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>


<?php include('../../include/footer.php'); ?>
