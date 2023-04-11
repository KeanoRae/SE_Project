<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <link rel="stylesheet" href="assets/css/css/all.css">
  <link rel="stylesheet" href="assets/css/styles.css">

  <title>NJ Customized Glass Painting</title>
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse d-inline-block">
            <ul class="navbar-nav ms-auto">
            <!--For Default User-->
                <li class="nav-item">
                    <a class="nav-link" href="login.php">order status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">log in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">sign up</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--/navbar-->
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="index.php"><img src="assets/images/header-logo1.png" alt=""></a>
                </div>
            </div>
            <div class="col">
                <div class="search-box d-flex mt-3 float-end">
                    <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span>
                    <div class="icons mx-4">
                        <a class="text-reset" href="login.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="login.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--/header-->
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
                <div class="ms-2 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="../admin-product.php">
                        <span class="iconify fs-2 me-2" data-icon="bytesize:cart"></span>Product
                    </a>                         
                </div>
                <hr>
                <div class="ms-2 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="../manage_user.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="ant-design:user-add-outlined"></span>Manage User
                    </a>
                </div>
            </div>
            <div class="col right">
                <p class="header fs-2 fw-bold mt-5 mb-0 mx-5">TRANSACTION</p>
                <a href="" class="text-reset text-decoration-none ms-5 fs-3">Order</a>
                <p class="d-inline header fs-3 ms-1 mb-5">> <b>Order Details</b></p>
                <br>
                <br>
                <div class="mb-2 text-end me-5">
                    <button class="px-3 py-1 border-0" style="background-color:#fff;" onclick="window.print();">
                        <span class="iconify fs-2 ms-2" data-icon="bytesize:print"></span>
                    </button>
                </div> 
                <form action="../process/update_transaction.php" method="POST"> 
                    <div class="row border border-dark mx-5 print-container">
                        <div class="col-md-6">
                            <div>
                                <div class="d-flex align-items-center">
                                    <input type="hidden" name="getid" value="">
                                    <span class="iconify fs-2 me-3" data-icon="bx:id-card"></span>
                                    <p class="mb-0 fs-4">Order ID</p>
                                </div>
                                <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">order id data</p>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <span class="iconify fs-2 me-3" data-icon="carbon:user-avatar-filled-alt"></span>
                                    <p class="mb-0 fs-4">Name</p>
                                </div>
                                <p class="my-0 fs-4 ms-5" style="color: #7F7B7B;">name data</p>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <span class="iconify fs-2 me-3" data-icon="carbon:email"></span>
                                    <p class="mb-0 fs-4">Email</p>
                                </div>
                                <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">email data</p>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <span class="iconify fs-2 me-3" data-icon="entypo:location"></span>
                                    <p class="mb-0 fs-4">Delivery Address</p>
                                </div>
                                <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">address data</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <div class="d-flex align-items-center">
                                    <span class="iconify fs-2 me-3"  data-icon="healthicons:i-schedule-school-date-time"></span>
                                    <p class="mb-0 fs-4">Order Date/Time</p>
                                </div>
                                <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">date data</p>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <span class="iconify fs-2 me-3"  data-icon="akar-icons:phone"></span>
                                    <p class="mb-0 fs-4">Phone Number</p>
                                </div>
                                <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">num data</p>
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
                                <p class="mb-0 fs-4 ms-5" style="color: #7F7B7B;">shipping method data</p>
                            </div>
                        </div>
                    </div>

                    <div class="mx-5">
                        <table class="table mt-1 text-center">
                            <thead>
                                <tr class="fs-4">
                                    <th scope="col" class="col-sm-1">No.</th>
                                    <th scope="col" class="col-sm-4 text-start">Product</th>
                                    <th scope="col" class="col-sm-1">Q</th>
                                    <th scope="col" class="col-sm-2">Price</th>
                                    <th scope="col" class="col-sm-3">Add-ons</th>
                                    <th scope="col" class="col-sm-2">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="mb-3" >
                                    <td>
                                        <p class="mb-0 fs-4">1</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 fs-4 text-start">product name data</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 fs-4">quantity</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 fs-4">price</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 fs-4">add ons</p>
                                    </td>
                                    <td>
                                        <p class="mb-5 fs-4">subtotal</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
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
                                            <p class="mb-0 me-3 fs-4 text-end">shipping fee</p>
                                        </div>
                                        <div>
                                            <p class="mb-0 me-3 fs-4 text-end">total</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-0">
                                    <td colspan="6"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="display-image">
                                            <p>image sample</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-0">
                                    <td colspan="6"></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        
                                    </td>
                                    <td colspan="2">
                                        <div class="d-flex float-end">
                                       
                                            <button name="to-complete" class="px-3 py-1 fs-4 border border-dark btn-pink btn-shadow">completed</button>            
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

    <footer>
        <div class="row">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>