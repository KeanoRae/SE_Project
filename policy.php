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
    <link rel="stylesheet" href="assets/css/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.css">

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
                <a class="nav-link" href="login.php">order status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">sign up</a>
            </li>
        </ul>

    </nav>

    <!--header-->
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="index.php"><img src="assets/images/header-logo1.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-9">
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

    <!--content-->
    <div class="container-fluid policy p-0">
        <p class="header text-center mt-4">Return Policy</p>
        <br>
        <br>
        <div class="content col-6 mx-auto">
            <p>For return request, kindly email us at danggannilda@gmail.com or send us a message through our 
               facebook and instagram page. Send us your concern and some photos for us to validate your 
               request.
            </p>
            <br>
            <br>
            <div class="mx-5">
                <div class="facebook d-flex align-items-center mb-4">
                    <i class="fab fa-facebook-square"></i>
                    <p class="m-0 fs-4">https://www.facebook.com/NJglasspainting</p>
                </div>
                <div class="instagram d-flex align-items-center mb-4">
                    <i class="fab fa-instagram"></i>
                    <p class="m-0 fs-4">https://www.instagram.com/njglasspainting</p>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
   
<?php include('include/footer.php'); ?>
