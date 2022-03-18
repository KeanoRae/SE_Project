<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../../include/header.php');
    include('../../../include/navbar.php');
    include('../process/update_product.php'); 
?>
<div class="container-fluid admin p-0">
    <br>
    <br>
    <?php
        if(isset($_SESSION['msg']) && $_SESSION['msg'] != ""){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['msg']; ?>
        </div>
    <?php
        unset($_SESSION['msg']);
        }
    ?>
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
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="../admin-transaction/pending.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
                </a>
            </div>
            <hr>
            <div class="ms-2">
                <div class="accordion" id="product-collapse">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fs-3 ps-2 py-1 fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="product">
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
                                                <!-- button for product -->
                                                <a href="updateproduct.php?productname=<?php echo $row['product_name']; ?>"
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
                                <a class="text-reset text-decoration-none" href="addproduct.php">+ add product</a>
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
            <p class="header fs-2 fw-bold mb-4 mt-5 mx-5">UPDATE PRODUCT</p>
            <div class="tmp">
                <form class="mx-5" action="" method="POST">
                    <h4 class="text-center mb-3">Upload product cover</h4>
                    <div class="form-group mb-5">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group mb-3">
                        <label style="font-size: 24px;" for="productname">Product name</label>
                        <input type="text" class="form-control my-2" name="productname" value="<?php echo $pname; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label style="font-size: 24px;" for="productdetails">Product details</label>
                        <textarea class="form-control border-dark shadow-none rounded-0" name="productdetails" rows="3"><?php echo $product_details; ?></textarea>
                    </div>
                    <?php
                        include_once('../../../include/database.php');
                        $database = new Connection();
                        $db = $database->open();
                        //query to get the price and addons values
                        $sql = $db->prepare("SELECT 1ch_price, 2ch_price, add_char, add_dedication FROM product WHERE id=:pid");
                        //bind param
                        $sql->bindParam(':pid', $product_id);
                        $sql->execute();
                        $row=$sql->fetch(PDO::FETCH_ASSOC);

                        foreach ($row as $key => $value){
                    ?>
                    <div class="form-group mb-3">
                        <label style="font-size: 24px;" for="price"><?php echo $key; ?></label>
                        <input type="text" class="form-control my-2" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
                    </div>
                    <?php 
                        }
                    ?>
                    <div class="form-group mb-3">
                        <label style="font-size: 24px;" for="shippinginfo">Category</label>
                        <input type="text" class="form-control my-2" name="category" value="<?php echo $category; ?>">
                    </div>
                    <div class="form-group mb-5">
                        <label style="font-size: 24px;" for="shippinginfo">Upload product image</label>
                        <input class="form-control my-2" type="file" name="formFile">
                    </div>
                    <?php
                        //close connection
                        $database->close();
                    ?>
                    <div class="d-grid col-3 float-end" style="font-size: 24px;">
                        <button type="submit" name="update-product" class="py-1 border-0 btn-pink btn-shadow">UPDATE PRODUCT</button>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<?php include('../../../include/footer.php');