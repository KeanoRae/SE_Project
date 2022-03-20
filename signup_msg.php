<?php
    session_start();
    include('include/header.php');
    include('include/navbar.php');
    include('signupcode.php');
?>

    <div class="container-fluid login-container p-0">
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
        <div class="text-center">
            <img src="assets/images/login-logo.png" alt="">
            <h2 class="mb-4">Thanks for signing up!</h2>
            <h4>An email has been sent to <?php echo $_SESSION['ver_email']; ?> with a link to verify your account.</h4>
            
        </div>
    </div>

<?php include('include/footer.php'); ?>