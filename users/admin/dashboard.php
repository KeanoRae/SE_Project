<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../include/header.php');
    include('../../include/navbar.php');
?>
<div class="container-fluid admin p-0">
    <?php
        if(isset($_SESSION['upload_err']) and $_SESSION['upload_err'] != ""){
            echo $_SESSION['upload_err'];echo "<br>";
            unset($_SESSION['upload_err']);
        }
        if(isset($_SESSION['cover_error']) and $_SESSION['cover_error'] != ""){
            echo "cover_error = ".$_SESSION['cover_error'];echo "<br>";
            unset($_SESSION['cover_error']);
        }
        if(isset($_SESSION['product_error']) and $_SESSION['product_error'] != ""){
            echo "product_error = ".$_SESSION['product_error'];echo "<br>";
            unset($_SESSION['product_error']);
        }
    ?>
    <div class="row gx-3 py-3 px-4" style="min-height: 800px;">
        <div class="col-3 sidebar p-0 me-3">
            <p class="text-center fw-bold fs-2 mt-2">ADMIN</p>
            <br>
            <div class="ms-1 d-flex align-items-center">
                <a class="text-reset text-decoration-none fw-bold fs-3 ms-2 mb-1 w-100" href="dashboard.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="iwwa:dashboard"></span>Dashboard
                </a>
            </div>
            <hr>
            <div class="ms-1 d-flex align-items-center">
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="admin-transaction/pending.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
                </a>
            </div>
            <hr>
            <div class="ms-2 d-flex align-items-center">
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="admin-product_new.php">
                    <span class="iconify fs-2 me-2" data-icon="bytesize:cart"></span>Product
                </a>                         
            </div>
            <hr>
            <div class="ms-2 d-flex align-items-center">
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="manage_user.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="ant-design:user-add-outlined"></span>Manage User
                </a>
            </div>
        </div>
        <div class="col right">
            <p class="fs-2 fw-bold mb-4 mt-5 mx-4">DASHBOARD</p>
            <div class="row gy-5 mt-2 d-flex justify-content-evenly">
                <div class="col-3 box position-relative" style="background: #ABC4FF;">
                    <div class="icon float-end mt-4">
                        <span class="iconify me-2" style="font-size: 81px;" data-icon="fa6-solid:id-card-clip"></span>
                    </div>
                    <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">VISITORS</p>
                </div>
                <div class="col-3 box position-relative" style="background: #ABC4FFD9;">
                    <div class="icon float-end mt-4">
                        <span class="iconify me-2" style="font-size: 81px;" data-icon="ep:circle-check"></span>
                    </div>
                    <p class="d-inline-block fs-4 mb-2 position-absolute bottom-0">CONFIRMATION ORDERS</p>
                </div>
                <div class="col-3 box position-relative" style="background: #ABC4FFB2;">
                    <div class="icon float-end mt-4">
                        <span class="iconify me-2" style="font-size: 81px;" data-icon="icon-park-outline:sales-report"></span>
                    </div>
                    <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">TOTAL SALES</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php include('../../include/footer.php'); ?>