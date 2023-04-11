<?php 
    session_start();
    include('process/product_process.php');
?>
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
    <!--navbar-->
    <nav>
        <input type="checkbox" id="navbar-check">
        <label for="navbar-check" class="check-icon">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li class="nav-item">
                    <a class="nav-link" href="../../logout.php">log out</a>
            </li>
        </ul>
    </nav>

    <!--header-->
    <header>
        <div class="row d-print-none">
            <div class="col">
                <div class="header-logo">
                    <a href="dashboard.php"><img src="../../assets/images/header-logo1.png" alt=""></a>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid admin p-0">
        <div class="row gx-3 py-3 px-4" style="min-height: 800px;">
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
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="admin-transaction/pending.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
                    </a>
                </div>
                <hr>
                <div class="ms-2 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fw-bold fs-3 ms-2 mb-1 w-100" href="admin-product.php">
                        <span class="iconify fs-2 me-2" data-icon="bytesize:cart"></span>Product
                    </a>                         
                </div>
                <hr>
                <div class="ms-2 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="manage_user.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="ant-design:user-add-outlined"></span>Manage User
                    </a>
                </div>
            </div>
            <div class="col right">
                <p class="text-center fs-2 fw-bold mb-5 mt-4 mx-4">PRODUCT</p>
                    <!-- form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mx-3 col-5 text-end">
                            <div class="search-box border border-dark d-flex mb-4 text-end">
                                <input type="search" class="px-3" placeholder="search">
                                <span><i class="fas fa-search mx-2"></i></span>
                            </div>
                        </div>
                        <div class="table-responsive mx-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col" class="col-9 fs-4">PRODUCT</th>
                                        <th scope="col" class="col-2 text-center">
                                        <a type="button" class="text-reset" data-bs-toggle="modal" data-bs-target="#addproductModal">
                                            <span class="iconify fs-1" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                                        </a>
                                        <a type="button" class="text-reset ms-3" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                            <span class="iconify fs-1" data-icon="icon-park-outline:pay-code-one" style="color: #ff9a62;"></span>
                                        </a>
                                        <!--Modal for add product-->
                                        <div class="modal modal fade" id="addproductModal" role="dialog" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="addproductModalLabel" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <!-- Upload Product Cover -->
                                                                <div class="col-6">
                                                                    <h5 class="mb-2">Upload product cover</h5>
                                                                    <div class="form-group mb-3">
                                                                        <input class="form-control" type="file" name="cover">
                                                                    </div>
                                                                </div>
                                                                <!-- Upload Product Sample -->
                                                                <div class="col-6">
                                                                    <h5 class="mb-2">Upload product sample</h5>
                                                                    <div class="form-group mb-3">
                                                                        <input class="form-control" type="file" name="sample[]" multiple>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Product Name -->
                                                                <div class="col-6 mb-2">
                                                                    <div class="form-group">
                                                                        <h5 class="mb-2">Product Name</h5>
                                                                        <input type="text" class="form-control my-2" name="productname" value="">
                                                                    </div>
                                                                </div>
                                                                <!-- Category -->
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <h5 class="mb-2">Category</h5>
                                                                        <input type="text" class="form-control my-2" name="category" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Size -->
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <h5 class="mb-2">Size</h5>
                                                                        <input type="text" class="form-control my-2" name="size" value="">
                                                                    </div>
                                                                </div>
                                                                <!-- Material -->
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <h5 class="mb-2">Material</h5>
                                                                        <input type="text" class="form-control my-2" name="material" value="">
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="row">
                                                                <!-- Medium -->
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <h5 class="mb-2">Medium</h5>
                                                                        <input type="text" class="form-control my-2" name="medium" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <!-- Character -->
                                                                <div class="col-6">
                                                                    <div class="d-flex">
                                                                        <h5 class="me-2">Character</h5>
                                                                        <a type="button" class="text-reset" data-bs-toggle="modal" data-bs-target="#addnew">
                                                                            <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                                                                        </a>
                                                                        <!-- <div id="addnew" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true" data-modal-parent="#addproductModal">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        Add new Body
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                    <div class="modal-product border-0">
                                                                        <div class="row py-1">
                                                                            <div class="col-4 text-center">
                                                                                <p class="mb-0 fs-5">1 Character</p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <input type="text" class="w-100" name="char1" value="">
                                                                            </div>
                                                                            <div class="col-2 d-flex text-center align-items-center">
                                                                                <button class="border-0">
                                                                                    <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row py-2">
                                                                            <div class="col-4 text-center">
                                                                                <p class="mb-0 fs-5">2 Character</p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <input type="text" class="w-100" name="char2" value="">
                                                                            </div>
                                                                            <div class="col-2 d-flex text-center align-items-center">
                                                                                <button class="border-0">
                                                                                    <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Add ons -->
                                                                <div class="col-6">
                                                                    <div class="d-flex">
                                                                        <h5 class="me-2">ADD - ONS</h5>
                                                                        <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                                                                    </div>
                                                                    <div class="modal-product border-0">
                                                                        <div class="row scroll py-1">
                                                                            <div class="col-4 text-center">
                                                                                <p class="mb-0 fs-5">CHARACTER</p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <input type="text" class="w-100" name="add_char" value="">
                                                                            </div>
                                                                            <div class="col-2 d-flex text-center align-items-center">
                                                                                <button class="border-0">
                                                                                    <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row scroll py-2">
                                                                            <div class="col-4 text-center">
                                                                                <p class="mb-0 fs-5">DESCRIPTION</p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <input type="text" class="w-100" name="add_desc" value="">
                                                                            </div>
                                                                            <div class="col-2 d-flex text-center align-items-center">
                                                                                <button class="border-0">
                                                                                    <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- footer -->
                                                            <div class="row mt-5">
                                                                <div class="col">
                                                                    <div class="tmp">
                                                                        <span class="iconify fs-2" data-icon="mdi:plus-box-multiple-outline" style="color: blue;"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="float-end">
                                                                        <button type="submit" name="add_product" class="fs-4 px-3 mb-3 border border-dark btn-pink btn-shadow" data-bs-dismiss="modal">SAVE</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal for payments-->
                                        <div class="modal modal fade" id="paymentModal" role="dialog" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="paymentModalLabel" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        <div class="container-fluid">
                                                            <form action="" method="POST">
                                                                <div class="row mt-3 mb-5">
                                                                    <!-- Shipping Method -->
                                                                    <div class="col-8 mx-auto">
                                                                        <div class="d-flex">
                                                                            <h5 class="me-2">SHIPPING METHOD</h5>
                                                                            <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                                                                        </div>
                                                                        <div class="modal-product2 border-0">
                                                                        <div class="row py-2">
                                                                                <div class="col-10">
                                                                                    <label class="w-75 fs-5 py-1">
                                                                                        <input type="radio" name="shipping-method" id="option3" value=""> JRS - EXPRESS
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col d-flex text-center align-items-center">
                                                                                    <button class="border-0">
                                                                                        <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3 mb-5">
                                                                    <!-- Payment Method -->
                                                                    <div class="col-8 mx-auto">
                                                                        <div class="d-flex">
                                                                            <h5 class="me-2">PAYMENT METHOD</h5>
                                                                            <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                                                                        </div>
                                                                        <div class="modal-product border-0">
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                    <label class="w-75 fs-5 py-1">
                                                                                        <input type="radio" name="payment-method" id="option3" value=""> Gcash
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col d-flex text-center align-items-center">
                                                                                    <button class="border-0">
                                                                                        <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                    <label class="w-75 fs-5 py-1">
                                                                                        <input type="radio" name="payment-method" id="option3" value=""> M Lhuillier Padala
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col d-flex text-center align-items-center">
                                                                                    <button class="border-0">
                                                                                        <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                    <label class="w-75 fs-5 py-1">
                                                                                        <input type="radio" name="payment-method" id="option3" value=""> Cebuana Lhuillier
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col d-flex text-center align-items-center">
                                                                                    <button class="border-0">
                                                                                        <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3 mb-5">
                                                                    <!-- Shipping Fee -->
                                                                    <div class="col-8 mx-auto">
                                                                        <div class="d-flex">
                                                                            <h5 class="me-2">SHIPPING FEE</h5>
                                                                            <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                                                                        </div>
                                                                        <div class="modal-product border-0">
                                                                            <div class="row py-1">
                                                                                <div class="col-4 text-start">
                                                                                    <p class="mb-0 fs-5">NCR</p>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="text" class="w-100">
                                                                                </div>
                                                                                <div class="col-2 d-flex text-center align-items-center">
                                                                                    <button class="border-0">
                                                                                        <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row py-2">
                                                                                <div class="col-4 text-start">
                                                                                    <p class="mb-0 fs-5">Luzon</p>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="text" class="w-100">
                                                                                </div>
                                                                                <div class="col-2 d-flex text-center align-items-center">
                                                                                    <button class="border-0">
                                                                                        <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row py-2">
                                                                                <div class="col-4 text-start">
                                                                                    <p class="mb-0 fs-5">Visayas</p>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="text" class="w-100">
                                                                                </div>
                                                                                <div class="col-2 d-flex text-center align-items-center">
                                                                                    <button class="border-0">
                                                                                        <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                </div>
                                                                <!-- footer -->
                                                                <div class="row mt-5">
                                                                    <div class="col">
                                                                        <div class="float-end">
                                                                            <button class="fs-4 px-3 mb-3 border border-dark btn-pink btn-shadow" data-bs-dismiss="modal">SAVE</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once('../../include/database.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        //query to display all product
                                        $sql = $db->prepare("SELECT id, product_name FROM product");
                                        $sql->execute();
                                        $no = 0;
                                        while($row=$sql->fetch(PDO::FETCH_ASSOC)){
                                            $no++;
                                    ?>
                                    <tr class="align-middle">
                                        <td class="ps-3"><?php echo $no."."; ?></td>
                                        <td class="fs-5 fw-bold"><?php echo $row['product_name']; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="text-reset me-2" href=""><span class="iconify fs-3" data-icon="clarity:note-edit-line" style="color: #ff9a62;"></span></a>
                                                <a class="text-reset" data-bs-toggle="modal" data-bs-target="#delete_product<?php echo $row['id']; ?>"><span class="iconify fs-3" data-icon="akar-icons:trash-can"></span></a>
                                            </div>
                                            <!--Modal for delete button-->
                                                <div class="modal fade" id="delete_product<?php echo $row['id']; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete_productLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <input type="text" name="modal_id" value="<?php echo $row['id']; ?>" hidden>
                                                                <p class="fs-4 text-center">Do you wish to remove this product?</p>
                                                                <div class="d-grid col-3 mx-auto mb-3">
                                                                    <button type="submit" name="delete_product" class="d-block btn btn-dark btn-shadow mb-3">Confirm</button>
                                                                    <button type="button" class="btn btn-light btn-shadow" data-bs-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                        //close connection
                                        $database->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="row d-print-none">
            <div class="col d-flex flex-column">
                <a class="text-decoration-none text-reset mt-3" href="contact.php">Contact</a>
                <a class="text-decoration-none text-reset" href="about.php">About</a>
                <a class="text-decoration-none text-reset mb-4" href="policy.php">Return Policy</a>
            </div>
            <div class="col">
                <p class="fw-bold mt-3">Social Media</p>
                <p class="text-decoration-underline">https://www.facebook.com/NJglasspainting</p>
                <p class="mb-4">https://www.instagram.com/njglasspainting/</p>
            </div>
        </div>
    </footer>

    <script src="../../assets/javascript/index.js"></script>                               
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>