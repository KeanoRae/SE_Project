<?php
    session_start();
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
                <a class="nav-link" href="trackorders.php">order status</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="../../logout.php">log out</a>
            </li>
        </ul>
    </nav>

    <!--header-->
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="user_homepage.php"><img src="../../assets/images/header-logo1.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-9">
                <div class="search-box d-flex mt-3 float-end">
                    <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span>
                    <div class="icons mx-4">
                        <a class="text-reset" href="order-details/user-pending.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="cart.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid trackorders p-0">
        <br>
        <br>
        <p class="fs-1 text-center">TRACK YOUR ORDER</p>
        <hr class="w-50 mx-auto">
        <br>
        <br>
        <div class="form-floating col-3 mx-auto mb-3">
            <input type="text" class="form-control" id="floatingID" placeholder="order ID">
            <label for="floatingID">OR Number</label>
        </div>
        <div class="form-floating col-3 mx-auto mb-4">
            <input type="email" class="form-control" id="floatingEmail" placeholder="email">
            <label for="floatingEmail">BC</label>
        </div>
        <div class="text-center">
            <button type="button" class="btn-pink btn-shadow btn btn-lg active py-2 border-0 fw-normal">TRACK</button>
        </div>
        <br>
        <br>
        <br>
        <br>

        <!--------------------------------footer------------------------------->
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
    </div>

  
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
