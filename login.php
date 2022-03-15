<?php
    session_start();
    include('include/header.php');
    include('include/navbar.php');
?>

    <div class="container-fluid login-container p-0">
        <br>
        <br>
        <div class="form-content d-flex align-items-center justify-content-evenly">
            <div class="row">
                <div class="col image d-inline-block mb-5 align-items-center">
                        <img src="assets/images/login-logo.png" alt="">
                </div>
                <div class="col form-container d-inline-block mx-5">
                    <form action="logincode.php" method="POST">
                        <div class="links d-flex justify-content-around">
                            <div class="link active d-inline">
                                <a href="login.php">Log In</a>
                            </div>
                            <div class="link d-inline">
                                <a href="signup.php">Create Account</a>
                            </div>
                        </div>
                        <hr>
                        <?php
                            if(isset($_SESSION['errormsg']) && $_SESSION['errormsg'] !=''){
                            ?>
                            <div class="d-flex align-items-center mb-2">
                                <span class="iconify fs-3 mb-1" data-icon="carbon:warning-alt" style="color: red;"></span>
                                <h4 class="mb-0 ms-1" style="color:red;"><?php echo $_SESSION['errormsg']; ?></h4>
                            </div>
                                <?php
                                unset($_SESSION['errormsg']);
                            }
                            else{
                                echo "<br>";
                                echo "<br>";
                            }
                        ?>
                        <div class="form-group mb-3">
                            <input type="text" name="useremail" class="form-control"  placeholder="Username or Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="forgotpass float-end">
                            <a href="#">forgot password</a>
                        </div>
                        <br>
                        <br>
                        <div class="d-grid button">
                            
                            <button type="submit" name="login_btn" class="btn btn-secondary btn-lg active px-5 py-1 mb-2 fw-bolder">LOG IN</button>
                            <!--
                            <a class="btn btn-secondary btn-lg active px-5 py-1 mb-2 fw-bolder text-reset" href="user/user_homepage.html">LOG IN</a>
                            -->
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('include/footer.php'); ?>