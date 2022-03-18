<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../../include/header.php');
    include('../../../include/navbar.php');
    include('../process/info.php'); 
?>
<div class="container-fluid admin p-0">
    <br>
    <br>
    <div class="row gx-3 pb-5 px-4" style="min-height: 800px;">
        <div class="col-3 sidebar p-0 me-3">
            <p class="header text-center fw-bold fs-2 mt-2">ADMIN</p>
            <br>
            <div class="ms-1 d-flex align-items-center">
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="../dashboard.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="iwwa:dashboard"></span>Dashboard
                </a>
            </div>
            <hr>
            <div class="ms-1 d-flex align-items-center">
                <a class="text-reset text-decoration-none fw-bold fs-3 ms-2 mb-1 w-100" href="pending.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
                </a>
            </div>
            <hr>
            <div class="ms-2">
                <div class="accordion" id="product-collapse">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fs-3 ps-2 py-1 collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="product">
                                <span class="iconify fs-2 me-2" data-icon="bytesize:cart"></span>Product
                            </button>
                        </h2>
                        <div id="product" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#product-collapse">
                            <div class="accordion-body pt-0">
                                <?php
                                    include_once('../../../include/database.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    $sql = $db->prepare("SELECT id, product_name FROM product");
                                    $sql->execute();
                                    
                                    while($row=$sql->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <ul class="mb-0">
                                        <li>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a onClick="window.location()" type="submit" href="../admin-product/updateproduct.php?productname=<?php echo $row['product_name']; ?>"
                                                    class="text-decoration-none mb-1 border-0 text-reset" style="background-color:#fff;"><?php echo $row['product_name']; ?>
                                                </a>
                                                <!-- button for modal -->
                                                <a class="border-0" style="background-color:#fff;" data-bs-toggle="modal" data-bs-target="#deleteproduct<?php echo $row['id']; ?>">
                                                    <span style="color:#C4C4C4" class="iconify fs-5 me-2" data-icon="bi:trash"></span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteproduct<?php echo $row['id']; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteproductLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="../process/product_process.php?id=<?php echo $row['id']; ?>" method="POST">
                                                    <div class="modal-body mx-5">
                                                        <p class="fs-4 text-center mx-5">Are you sure you want to delete this product?</p>
                                                        <div class="d-grid col-4 mx-auto mb-3">
                                                            <button type="submit" name="delete-product" class="d-block btn btn-dark rounded-pill btn-shadow mb-3">delete</button>
                                                            <button type="button" class="btn btn-light rounded-pill btn-shadow" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="d-grid col-8 mx-auto px-0 btn btn-shadow" style="background: rgba(209, 209, 209, 0.77);color:#000">
                                <a class="text-reset text-decoration-none" data-parent="#product" href="../admin-product/addproduct.php">+ add product</a>
                            </div>
                        </div>
                    </div>
                </div>                            
            </div>
            <hr>
            <div class="ms-2 d-flex align-items-center">
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="../manage_user.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="ant-design:user-add-outlined"></span>Manage User
                </a>
            </div>
        </div>
        <div class="col right">
            <?php
                $backpage;
                if($status == "Pending"){
                    $backpage = "pending.php";
                }
                elseif($status == "Confirmed"){
                    $backpage = "confirmed.php";
                }
                elseif($status == "On process"){
                    $backpage = "onprocess.php";
                }
                elseif($status == "To ship"){
                    $backpage = "ship.php";
                }
                elseif($status == "Completed"){
                    $backpage = "complete.php";
                }
                elseif($status == "Cancelled"){
                    $backpage = "cancelled.php";
                }
            ?>
            <p class="header fs-2 fw-bold mt-5 mb-0 mx-5">TRANSACTION</p>
            <a href="<?php echo $backpage; ?>" class="text-reset text-decoration-none ms-5 fs-3">Order</a>
            <p class="d-inline header fs-3 ms-1 mb-5">> <b>Order Details</b></p>
            <br>
            <br>
            <form action="../process/update_transaction.php" method="POST">
                <div class="row border border-dark mx-5">
                    <div class="col-md-6">
                        <div>
                            <div class="d-flex align-items-center">
                                <input type="hidden" name="getid" value="<?php echo $id; ?>">
                                <span class="iconify fs-2 me-3" data-icon="bx:id-card"></span>
                                <p class="mb-0 fs-4">Order ID</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $id; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3" data-icon="carbon:user-avatar-filled-alt"></span>
                                <p class="mb-0 fs-4">Name</p>
                            </div>
                            <p class="my-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $name; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3" data-icon="carbon:email"></span>
                                <p class="mb-0 fs-4">Email</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $email; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3" data-icon="entypo:location"></span>
                                <p class="mb-0 fs-4">Delivery Address</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $addr; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3"  data-icon="healthicons:i-schedule-school-date-time"></span>
                                <p class="mb-0 fs-4">Order Date/Time</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $date; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3"  data-icon="akar-icons:phone"></span>
                                <p class="mb-0 fs-4">Phone Number</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $num; ?></p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3"  data-icon="fluent:payment-16-regular"></span>
                                <p class="mb-0 fs-4">Payment Method</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">Gcash</p>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="iconify fs-2 me-3"  data-icon="grommet-icons:deliver"></span>
                                <p class="mb-0 fs-4">Shipping Method</p>
                            </div>
                            <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;"><?php echo $ship_method; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                    if($message == ""){
                        echo "";
                    }
                    else{
                ?>
                <div class="my-2 mx-5 border border-dark">
                    <div class="d-flex px-2 py-1 align-items-center">
                        <span class="iconify fs-2 me-2"  data-icon="fa-regular:comment-dots"></span>
                        <p class="mb-0 fs-4">Message from buyer</p>
                    </div>
                    
                    <textarea class="form-control border-0 shadow-none rounded-0 mb-2 fs-4" name="message" rows="3" readonly><?php echo $message; ?></textarea>
                </div>
                <?php
                    }
                ?>
                <div class="mx-5">
                    <table class="table mt-1 text-center">
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
                            <tr class="mb-3" >
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
                            <tr class="border-0">
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="text-start">
                                        <p class="mb-0 fs-4">uploaded image</p>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <div class="d-flex float-end">
                                    <?php 
                                        if($status == "Pending"){ 
                                    ?>
                                        <button name="cancel" class="px-1 py-1 fs-4 me-3 border border-dark btn-pink btn-shadow">cancel</button>
                                        <button name="confirm" class="px-1 py-1 fs-4 border border-dark btn-pink btn-shadow">confirm</button>
                                    <?php 
                                        }elseif($status == "Confirmed"){
                                            //$setstatus = ($receipt_status == "unpaid") ? "disabled":"";
                                    ?>
                                        <button name="to-process" class="px-3 py-1 fs-4 border border-dark btn-pink btn-shadow">to process</button>
                                    <?php 
                                        }elseif($status == "To ship"){
                                    ?>
                                        <button name="to-complete" class="px-3 py-1 fs-4 border border-dark btn-pink btn-shadow">completed</button>            
                                    <?php
                                        }
                                    ?>      
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>


<?php include('../../../include/footer.php'); ?>
