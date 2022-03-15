<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../../include/header.php');
    include('../../../include/navbar.php');
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
                                                            <button type="submit" name="delete_cart" class="d-block btn btn-dark rounded-pill btn-shadow mb-3">delete</button>
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
                                <a class="text-reset text-decoration-none" data-parent="#product" href="admin-product/addproduct.php">+ add product</a>
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
            <p class="fs-2 fw-bold mb-4 mt-5 mx-5">TRANSACTION</p>
            <div class="mx-3 mb-4">
                <div id="title" class="title d-flex justify-content-between mx-2 py-2 px-3 border-bottom">
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="pending.php">pending</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="confirmed.php">confirmed</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="onprocess.php">on-process</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="ship.php">to ship</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0" href="complete.php">completed</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 fw-bolder" href="cancelled.php">cancelled</a>
                </div>
            </div>
            <div class="row m-4">
                <div class="button-group d-flex align-items-center">
                    <div>
                        <select class="form-select shadow-none border-dark border-end-0 rounded-0 py-1" name="sort" aria-label="Floating label select example">
                            <option selected>Order ID</option>
                            <option value="buyername">Buyer name</option>
                            <option value="product">Product</option>
                        </select>
                    </div>
                    <div class="d-flex me-3">
                        <input type="search" class="ps-2 py-1 border border-dark border-end-0" placeholder="search">
                        <button type="button" class="border border-dark border-start-0"><span><i class="fas fa-search mx-2"></i></span></button>
                    </div>
                    <h5 class="mb-0 me-4 lh-normal">Order Creation Date</h5>
                    <div class="col-3 me-3">
                        <input class="form-control" type="text">
                    </div>
                    <div class="mb-1" style="font-size: 20px;">
                        <button type="button" class="p-1 border-0 btn-pink btn-shadow">
                            <span class="iconify" data-icon="bxs:download"></span>report
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mx-4">
                <table class="table table-responsive">
                    <thead align="center" class="align-middle">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" class="col-1">Q</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Receipt Status</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <tr class="d-none">
                                <td colspan="7"></td>
                            </tr>
                            <?php
                                include_once('../../../include/database.php');
                                $database = new Connection();
                                $db = $database->open();
                                try{	
                                    $sql = "SELECT CONCAT(u.first_name,' ',u.last_name) AS fullname, product_name, o.id, od.quantity, (od.product_price*od.quantity) as total, os.name, DATE_FORMAT(o.order_date, '%m-%d-%Y') as date
                                            FROM orders o JOIN order_details od JOIN user u JOIN product p JOIN order_status os
                                            ON o.id=od.order_id AND o.customer_id=u.id AND p.id=od.product_id AND o.order_status=os.id
                                            WHERE o.order_status=3
                                            ORDER BY o.id";
                                    foreach ($db->query($sql) as $row) {  
                            ?>
                            <tr style="background: rgba(196, 196, 196, 0.28);">
                                <td colspan="5"><?php echo $row['fullname']; ?></td>
                                <td class="text-end" colspan="2"><?php echo $row['id']."|".$row['date']; ?></td>
                            </tr>
                            <tr align="center">
                                <th scope="row"><?php echo $row['product_name'] ?></th>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['total']; ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td></td>
                                <td>Gcash</td>
                                <td>
                                    <a href="orderdetails.php?vieworder=<?php echo $row['id']; ?>" 
                                        class="text-reset text-decoration-none px-2 py-1 border border-dark btn-pink btn-shadow">
                                        view order
                                    </a>
                                </td>
                            </tr>
                        </tr>
                        <?php 
                            }
                        }
                        catch(PDOException $e){
                            echo "There is some problem in connection: " . $e->getMessage();
                        }

                        //close connection
                        $database->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('../../../include/footer.php'); ?>
