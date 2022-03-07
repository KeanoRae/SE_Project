<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../include/header.php');
    include('../../include/navbar.php');
    include('sidebar.php');
?>
            <div class="col right">
                <p class="header fs-2 fw-bold mb-4 mt-5 mx-4">DASHBOARD</p>
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
