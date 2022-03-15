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
        ?>
            <div class="d-flex align-items-center mb-1">
            <a href="<?php echo $backpage; ?>" class="text-reset text-decoration-none fs-3">
                <span class="iconify fs-1" data-icon="ep:arrow-left"></span>Back
            </a>
            </div>
            <div class="detail-header text-end py-2">
                <p class="d-inline fw-bold fs-3">|</p>
                <p class="d-inline fs-6 me-4">IN-PROCESS</p>
            </div>
            <div class="detail-topbox mt-3 mb-2">
                <div class="row mx-2">
                    <div class="col-md-6">
                        <div>
                            <div class="d-flex align-items-center">
                                <input type="hidden" name="getid" value="<?php echo $id; ?>">
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
            <div class="detail-botbox">
                <table class="table text-center">
                    <thead>
                        <tr class="fs-4">
                            <th scope="col" class="col-sm-1">No.</th>
                            <th scope="col" class="col-sm-6 text-start">Product</th>
                            <th scope="col" class="col-sm-1">Q</th>
                            <th scope="col" class="col-sm-3">Price</th>
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
                                    <p class="mb-0 fs-4">Shipping Fee</p>
                                </div>
                                <div class="text-start">
                                    <p class="mb-0 fs-4">Total</p>
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
                        <tr>
                            <td colspan="5">
                                <div class="text-start">
                                    <p class="mb-0 fs-4">uploaded image</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="tmpbox d-flex">
                    <?php
                        if($status == "Confirmed"){
                    ?>
                    <div class="receipt col-9">
                        <!--
                        <button name="#" class="px-4 py-1 my-2 ms-2 fs-4 me-3 btn-shadow">upload receipt</button>
                        <input type="file">
                        -->
                        <!-- actual upload which is hidden -->
                        <input type="file" id="actual-btn" onClick="uploadimg()" hidden/>

                        <!-- our custom upload button -->
                        <label for="actual-btn" class="ms-2 mt-2 p-2">upload receipt</label>

                        <!-- name of file chosen -->
                        <span id="file-chosen"></span>
                    </div>
                    <script>
                        const actualBtn = document.getElementById('actual-btn');
                        const fileChosen = document.getElementById('file-chosen');
                        actualBtn.addEventListener('change', function(){
                        fileChosen.textContent = this.files[0].name
                        })
                    </script>
                    <div class="col-3 text-end">
                        <button name="#" class="px-5 py-1 my-2 me-2 fs-4 border border-dark btn-pink btn-shadow">UPLOAD</button>            
                    <?php 
                        }elseif($status == "Pending"){ 
                    ?>
                        <button name="#" class="px-4 py-1 fs-4 me-3 border border-dark btn-pink btn-shadow">cancel</button>  
                    <?php 
                        }elseif($status == "To ship"){
                    ?>
                        <button name="to-complete" class="px-3 py-1 fs-4 border border-dark btn-pink btn-shadow">completed</button>            
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
<script src="../../../assets/javascript/index.js"></script>
<?php include('../../../include/footer.php'); ?>
