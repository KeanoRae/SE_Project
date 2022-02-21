<?php
include('include/header.php');
include('include/navbar.php');
?>

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
                        <form action="signupcode.php" method="POST">
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
                            <?php
                                session_start();

                                    if(isset($_SESSION['errormsg']) && $_SESSION['errormsg'] !=''){
                                    ?>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="iconify fs-3 mb-1" data-icon="carbon:warning-alt" style="color: red;"></span>
                                        <h4 class="mb-0 ms-1" style="color:red;"><?php echo $_SESSION['errormsg']; ?></h4>
                                    </div>
                                        <?php
                                        unset($_SESSION['errormsg']);
                                    }
                            ?>
                            <div class="form-group">
                            <label for="username">First name</label>
                            <input type="text" class="form-control my-2" name="firstname" required id="firstname">
                            </div>
                            <div class="form-group">
                            <label for="username">Last name</label>
                            <input type="text" class="form-control my-2" name="lastname" required id="lastname">
                            </div>
                            <div class="form-group">
                            <label for="text">Email</label>
                            <input type="email" class="form-control my-2" name="email" required id="email">
                            </div>
                            <div class="form-group">
                            <label for="number">Mobile number</label>
                            <input type="text" class="form-control my-2" name="number" required id="number">
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control my-2" name="password" required id="password">
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