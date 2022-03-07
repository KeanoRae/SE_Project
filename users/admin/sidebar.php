<div class="container-fluid admin p-0">
        <br>
        <br>
        <div class="row gx-3 pb-5 px-4" style="min-height: 800px;">
            <div class="col-3 sidebar p-0 me-3">
                <p class="header text-center fw-bold fs-2 mt-2">ADMIN</p>
                <br>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="dashboard.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="iwwa:dashboard"></span>Dashboard
                    </a>
                </div>
                <hr>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="transaction-pending.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
                    </a>
                </div>
                <hr>
                <div class="ms-2">
                    <form action="" method="POST">
                        <div class="accordion" id="product-collapse">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button fs-3 ps-2 py-1 collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="product">
                                        <span class="iconify fs-2 me-2" data-icon="bytesize:cart"></span>Product
                                    </button>
                                </h2>
                                <div id="product" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#product-collapse">
                                    <div class="accordion-body pt-0">
                                        <ul>
                                        <?php
                                            include_once('../../include/database.php');
                                            $database = new Connection();
                                            $db = $database->open();
                                            try{	
                                                $sql = "SELECT product_name FROM product";
                                                foreach ($db->query($sql) as $row) {  
                                        ?>
                                            <li>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button type="submit" name="<?php echo $row['product_name']; ?>" class="mb-1 border-0 text-reset" style="background-color:#fff;"><?php echo $row['product_name']; ?></button>
                                                    <span style="color:#C4C4C4" class="iconify fs-5 me-2" data-icon="bi:trash"></span>
                                                </div>
                                            </li>
                                        <?php 
                                                }
                                            }
                                            catch(PDOException $e){
                                                echo "There is some problem in connection: " . $e->getMessage();
                                            }

                                            //close connection
                                            $database->close();
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="d-grid col-8 mx-auto px-0 btn btn-shadow" style="background: rgba(209, 209, 209, 0.77);color:#000">
                                        <a class="text-reset text-decoration-none" data-parent="#product" href="addproduct.php">+ add product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>                               
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>