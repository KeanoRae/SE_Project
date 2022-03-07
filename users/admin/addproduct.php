<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <link rel="stylesheet" href="../../assets/css/css/all.css">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <title>NJ Customized Glass Painting</title>
</head>
<body>
    <!---------------------------------- navbar content ------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse d-inline-block">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../logout.php">log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="index.php"><img src="../../assets/images/header-logo1.png" alt=""></a>
                </div>
            </div>
            <div class="col">
                <div class="search-box d-flex mt-3 me-3 float-end">
                    <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span>
                </div>
            </div>
        </div>
    </header>

    <!--------------------------------transaction content------------------------------->
    <div class="container-fluid admin p-0">
        <br>
        <br>
        <div class="row gx-3 mb-5 px-4" style="height: 800px;">
            <div class="col-3 sidebar p-0 me-3">
                <p class="header text-center fw-bold fs-2 mt-2">ADMIN</p>
                <br>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="dashboard.php">
                        <span class="iconify fs-2 mb-1 me-1" data-icon="iwwa:dashboard"></span>Dashboard
                    </a>
                </div>
                <hr>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="transaction.php">
                        <span class="iconify fs-2 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
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
                                            session_start();
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
            <div class="col right">
                <p class="header fs-2 fw-bold mb-4 mt-5 mx-5">ADD PRODUCT</p>
                <div class="tmp">
                    <form class="mx-5" action="">
                        <h4 class="text-center mb-3">Upload product cover</h4>
                        <div class="form-group mb-5">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: 24px;" for="productname">Product name</label>
                            <input type="text" class="form-control my-2" id="productname">
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: 24px;" for="productdetails">Product details</label>
                            <input type="text" class="form-control my-2" id="productdetails">
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: 24px;" for="price">Price</label>
                            <input type="text" class="form-control my-2" id="price">
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: 24px;" for="shippinginfo">Shipping Information</label>
                            <input type="text" class="form-control my-2" id="shippinginfo">
                        </div>
                        <div class="form-group mb-5">
                            <label style="font-size: 24px;" for="shippinginfo">Upload product image</label>
                            <input class="form-control my-2" type="file" id="formFile">
                        </div>
                        <div class="d-grid col-3 float-end" style="font-size: 24px;">
                            <button type="button" class="py-1 border-0 btn-pink btn-shadow">ADD PRODUCT</button>
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
        <br><br><br><br><br>
        <br>
        <!--------------------------------footer------------------------------->
        <footer>
            <div class="row">
                <div class="col d-flex flex-column">
                    <a class="text-decoration-none text-reset mt-3" href="contact.html">Contact</a>
                    <a class="text-decoration-none text-reset" href="about.html">About</a>
                    <a class="text-decoration-none text-reset mb-4" href="policy.html">Return Policy</a>
                </div>
                <div class="col">
                    <p class="fw-bold mt-3">Social Media</p>
                    <p class="text-decoration-underline">https://www.facebook.com/NJglasspainting</p>
                    <p class="mb-4">https://www.instagram.com/njglasspainting/</p>
                </div>
            </div>
        </footer>
    </div>




  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
