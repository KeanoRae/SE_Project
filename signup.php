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
    <!---------------------------------- navbar content ------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse d-inline-block">
            <ul class="navbar-nav ms-auto">
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

    <!--------------------------------content------------------------------->
    <div class="container-fluid login-container p-0">
        <br>
        <br>
        <div class="form-content">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col ">
                    <div class="image d-inline-block">
                        <img src="assets/images/login-logo.png" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="form-container d-inline-block">
                        <form action="registercode.php" method="POST">
                            <div class="links d-flex justify-content-around">
                                <div class="link d-inline">
                                    <a href="login.php">Log In</a>
                                </div>
                                <div class="link active d-inline">
                                    <a href="signup.php">Create Account</a>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <?php
                                if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                                {
                                    echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                                    unset($_SESSION['status']);
                                }
                            ?>
                            <div class="form-group">
                            <label for="username">First name</label>
                            <input type="text" class="form-control my-2" name="firstname" id="firstname">
                            </div>
                            <div class="form-group">
                            <label for="username">Last name</label>
                            <input type="text" class="form-control my-2" name="lastname" id="lastname">
                            </div>
                            <div class="form-group">
                            <label for="text">Email</label>
                            <input type="email" class="form-control my-2" name="email" id="email">
                            </div>
                            <div class="form-group">
                            <label for="number">Mobile number</label>
                            <input type="text" class="form-control my-2" name="number" id="number">
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control my-2" name="password" id="password">
                            </div>
                            <br>
                            <br>
                            <div class="d-grid button">
                                <button type="submit" name="signup_btn" class="btn btn-secondary btn-lg active px-5 py-2 mb-2 fw-bolder">CREATE ACCOUNT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--------------------------------footer------------------------------->
        <br>
        <br>
        <br>
        <br>
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