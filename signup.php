<?php
    session_start();
    include('include/header.php');
    include('include/navbar.php');
    include('signupcode.php');
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
                                <label for="username">First name</label>
                                <input type="text" class="form-control mt-2" name="firstname" value="<?php echo $var['fname']; ?>" id="firstname">
                                <div class="error mb-2" style="color:red;">
                                    <?php echo $errors['fname']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Last name</label>
                                <input type="text" class="form-control mt-2" name="lastname" value="<?php echo $var['lname']; ?>" id="lastname">
                                <div class="error mb-2" style="color:red;">
                                    <?php echo $errors['lname']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text">Email</label>
                                <input type="email" class="form-control mt-2" name="email" value="<?php echo $var['email']; ?>" id="email">
                                <div class="error mb-2" style="color:red;">
                                    <?php echo $errors['email']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="number">Mobile number</label>
                                <input type="text" class="form-control mt-2" name="number" value="<?php echo $var['phonenum']; ?>" id="number">
                                <div class="error mb-2" style="color:red;">
                                    <?php echo $errors['phone']; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control mt-2" name="password" value="<?php echo $var['pw']; ?>" id="password">
                                <div class="error mb-2" style="color:red;">
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