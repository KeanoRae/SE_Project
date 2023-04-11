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
    <div class="container-fluid about p-0">
        <p class="header text-center mt-4 mb-5 lh-sm">About <br> NJ Customized Glass Painting</p>
        <br>
        <br>
        <div class="content d-flex justify-content-around">
            <div class="p1 col-4">
                <p>NJ Customized Glass Painting started their business since 23th of April 2021 through social 
                    media platforms that offers glass paintings since we are still new, we don’t have physical 
                    store yet but we are located at Baguio Valley, Gov. Ramos Ave., Sta. Maria, Zamboanga City. 
                    The “NJ” on our business name comes from our own name initials which is “N” stands for Nilda 
                    & “J” stands for Janssen. We started this type of business to show case our skills in arts and 
                    we also noticed that there are only few business that offers glass painting in Zamboanga City.
                 </p>
            </div>
            <div class="p2 col-4">
                <p>
                    NJ Customized Glass Painting is an e-commerce business that offers customized glass painting 
                    through social media platforms like Facebook and Instagram. Glass painting refers to painting 
                    on a piece of glass that serves as a canvass. A short history about glass painting, one type of 
                    it that has existed since the ancient Rome and China times is the reverse glass painting, which 
                    is similar to its normal counterpart, but only requires viewing it with the glass turned over. 
                    Historians cannot give a definite time when glass painting began. Traces of creating colored 
                    glass figures have been found in ancient cultures, such as Rome, Byzantium, China and throughout 
                    the middle Ages. As it goes by these glass paintings are expanding and having many types and 
                    design already.
                </p>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>

<?php include('../../include/footer.php');
