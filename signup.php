<?php
    session_start();
    include('signupcode.php');
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
                    <!-- <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span> -->
                    <div class="icons mx-4">
                        <a class="text-reset" href="login.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="login.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid login-container p-0">
        <?php
            if(isset($_SESSION['errormsg']) && $_SESSION['errormsg'] !=''){
            ?>
            <div class="d-flex align-items-center mb-2">
                <span class="iconify fs-3 mb-1" data-icon="carbon:warning-alt" style="color: red;"></span>
                <h4 class="mb-0 ms-1"><?php echo $_SESSION['errormsg']; ?></h4>
            </div>
                <?php
                unset($_SESSION['errormsg']);
            }
            else{
                echo "<br>";
                echo "<br>";
            }
        ?>
        <div class="form-content">
            <div class="row d-flex align-items-center mb-5">
                <div class="col text-center ">
                    <img src="assets/images/login-logo.png" alt="">
                </div>
                <div class="col">
                    <div class="form-container d-inline-block">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
                            <div class="form-group">
                                <label for="fname">First name<span class="error">*</span></label>
                                <input type="text" class="form-control mt-2" name="firstname" value="<?php echo $var['fname']; ?>" id="firstname">
                                <div class="error mb-2">
                                    <?php echo $errors['fname']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last name<span class="error">*</span></label>
                                <input type="text" class="form-control mt-2" name="lastname" value="<?php echo $var['lname']; ?>" id="lastname">
                                <div class="error mb-2">
                                    <?php echo $errors['lname']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username<span class="error">*</span></label>
                                <input type="text" class="form-control mt-2" name="username" value="<?php echo $var['username']; ?>" id="username">
                                <div class="error mb-2">
                                    <?php echo $errors['username']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email<span class="error">*</span></label>
                                <input type="email" class="form-control mt-2" name="email" value="<?php echo $var['email']; ?>" id="email">
                                <div class="error mb-2">
                                    <?php echo $errors['email']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="number">Mobile number<span class="error">*</span></label>
                                <input type="text" class="form-control mt-2" name="number" value="<?php echo $var['phonenum']; ?>" id="number">
                                <div class="error mb-2">
                                    <?php echo $errors['phonenum']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span class="error">*</span></label>
                                <input type="password" class="form-control mt-2" name="password" value="<?php echo $var['pw']; ?>" id="password">
                                <div class="error mb-2">
                                    <?php echo $errors['pw']; ?>
                                </div>
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

<?php include('include/footer.php'); ?>