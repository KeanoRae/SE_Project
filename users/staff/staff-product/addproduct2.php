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
            <p class="header text-center fw-bold fs-2 mt-3">ADMIN</p>
            <br>
            <div class="ms-1 d-flex align-items-center">
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="../dashboard.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="iwwa:dashboard"></span>Dashboard
                </a>
            </div>
            <hr>
            <div class="ms-1 d-flex align-items-center">
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="../staff-transaction/pending.php">
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
        </div>
        <div class="col right">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <p class="fs-3 mb-4 mt-5 mx-5">Characters</p>
                <div class="column-box row mx-5 mb-4">
                    <div class="row my-3">
                        <label for="1ch" class="col-sm-2 col-form-label">1 Character</label>
                        <div class="col-sm-10 d-flex align-items-center p-0">
                            <input type="text" class="form-control border-0 py-2 shadow-none rounded-0" name="1ch" value="<?php echo $var2['1ch']; ?>">
                            <div class="mb-2" style="color:red;">
                                <?php echo $error2['1ch']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="2ch" class="col-sm-2 col-form-label">2 Character</label>
                        <div class="col-sm-10 d-flex align-items-center p-0">
                            <input type="text" class="form-control border-0 py-2 shadow-none rounded-0" name="2ch" value="<?php echo $var2['2ch']; ?>">
                            <div class="mb-2" style="color:red;">
                                <?php echo $error2['2ch']; ?>
                            </div>
                        </div>                            
                    </div>
                    <div class="d-grid col-10 mb-4 mx-auto">
                        <button class="btn-pink btn-shadow">
                            <span class="iconify fs-1" data-icon="akar-icons:circle-plus"></span>
                        </button> 
                    </div>                                      
                </div>
                <hr class="mx-3">
                <p class="fs-3 mb-4 mt-2 mx-5">Addons</p>
                <div class="column-box row mx-5 mb-4">
                    <div class="row my-3">
                        <label for="addchar" class="col-sm-2 col-form-label">Add Character</label>
                        <div class="col-sm-10 d-flex align-items-center p-0">
                            <input type="text" class="form-control border-0 py-2 shadow-none rounded-0" name="addchar" value="<?php echo $var2['addchar']; ?>">
                            <div class="mb-2" style="color:red;">
                                <?php echo $error2['addchar']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="add_dedication" class="col-sm-2 col-form-label">Add Dedication</label>
                        <div class="col-sm-10 d-flex align-items-center p-0">
                            <input type="text" class="form-control border-0 py-2 shadow-none rounded-0" name="add_dedication" value="<?php echo $var2['add_dedication']; ?>">
                            <div class="mb-2" style="color:red;">
                                <?php echo $error2['add_dedication']; ?>
                            </div>
                        </div>                            
                    </div>
                    <div class="d-grid col-10 mb-4 mx-auto">
                        <button class="btn-pink btn-shadow">
                            <span class="iconify fs-1" data-icon="akar-icons:circle-plus"></span>
                        </button> 
                    </div>                 
                </div>
                <hr class="mx-3">
                <p class="fs-3 mb-4 mt-2 mx-5">Shipping Method</p>
                <div class="column-box row mx-5 mb-4">
                    <div class="d-grid col-10 my-4 mx-auto">
                        <button class="btn-pink btn-shadow">
                            <span class="iconify fs-1" data-icon="akar-icons:circle-plus"></span>
                        </button> 
                    </div>                 
                </div>
                <hr class="mx-3 my-0">
                <p class="fs-3 mb-4 mt-2 mx-5">Payment Method</p>
                <div class="column-box row mx-5 mb-4">
                    <div class="d-grid col-10 my-4 mx-auto">
                        <button class="btn-pink btn-shadow">
                            <span class="iconify fs-1" data-icon="akar-icons:circle-plus"></span>
                        </button> 
                    </div>                 
                </div>
                <hr class="mx-3 my-0">
                <div class="d-grid col-3 float-end mt-4 mb-5 me-3" style="font-size: 24px;">
                    <button type="submit" name="add-product" class="text-center border-0 py-1 btn-pink btn-shadow">ADD PRODUCT</button>
                </div>
            </form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>

<?php include('../../../include/footer.php');