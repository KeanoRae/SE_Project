<?php
include('include/header.php');
include('include/navbar.php');
?>

    <div class="container-fluid cart p-0">
        <p class="fs-1 fw-bolder text-center my-5">CART</p>
        <div class="row">
            <div class="col ms-3">
                <div class="content d-flex align-items-center justify-content-between mx-3">
                    <div class="left d-flex mb-4">
                        <div class="box1 border border-dark me-2"></div>
                        <div class="tmp">
                            <p class="fs-4">VECTOR ART</p>
                            <div class="quantity d-flex align-items-center justify-content-around border border-dark">
                            <i class="fas fa-plus"></i>
                            <p class="fs-4 mb-1">1</p>
                            <i class="fas fa-minus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="right d-flex align-items-center mt-4">
                        <p class="mb-1 me-3">₱ 390.00</p>
                        <span class="iconify fs-1" data-icon="bi:x" style="color: #c4c4c4;"></span>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col box2 me-3">
                <div class="content d-flex justify-content-between mb-3 mx-4">
                    <p class="mt-5">Subtotal</p>
                    <p class="mt-5">₱ 390.00</p>
                </div>
                <div class="d-grid mb-5 mx-3">
                    <a href="#" class="btn-pink btn-shadow btn btn-lg active py-1 border-0 fw-normal" role="button" aria-pressed="true">PLACE ORDER</a>
                </div>
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

<?php include('include/footer.php'); ?>
