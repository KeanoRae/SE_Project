<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../../include/header.php');
    include('../../../include/navbar.php');
    include('../process/product_process.php');
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
                <p class="header fs-2 fw-bold mb-4 mt-5 mx-5">ADD PRODUCT</p>
                <div class="mx-5">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <h4 class="text-center mb-3">Upload product cover</h4>
                        <div class="form-group mb-5">
                            <input class="form-control" type="file" name="cover" value="<?php echo $fileName; ?>">
                            <div class="mb-2 mt-1" style="color:red;">
                                <?php echo $error1['cover']; ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: 24px;" for="productname">Product name</label>
                            <input type="text" class="form-control my-2" name="productname" value="<?php echo $var1['productname']; ?>">
                            <div class="mb-2" style="color:red;">
                                <?php echo $error1['productname']; ?>
                            </div>
                        </div> 
                        <div class="form-group mb-3">
                            <label style="font-size: 24px;" for="productdetails">Product details</label>
                            <textarea name="productdetails" class="form-control" cols="30" rows="3"><?php echo $var1['productdetails']; ?></textarea>
                            <div class="mb-2" style="color:red;">
                                <?php echo $error1['productdetails']; ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: 24px;" for="category">Category</label>
                            <input type="text" class="form-control my-2" name="category" value="<?php echo $var1['category']; ?>">
                            <div class="mb-2" style="color:red;">
                                <?php echo $error1['category']; ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: 24px;" for="shippinginfo">How to Order</label>
                            <input type="text" class="form-control my-2" name="instruction">
                        </div>
                        <div class="form-group mb-5">
                            <label style="font-size: 24px;" for="shippinginfo">Upload product image</label>
                            <input class="form-control my-2" type="file" name="carousel_img[]" multiple>
                            <div class="mb-2 mt-1" style="color:red;">
                                <?php echo $error1['carousel']; ?>
                            </div>
                        </div>
                        <div class="d-grid col-2 float-end mb-5" style="font-size: 24px;">
                            <button type="submit" name="next" class="text-center py-1 btn-pink btn-shadow">NEXT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('../../../include/footer.php'); ?>