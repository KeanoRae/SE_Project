<?php 
    session_start();
    echo 'email = '.$_SESSION['email'];
    echo "<br>";
    echo 'id = '.$_SESSION['pid'];
    echo "<br>";
    echo 'type = '.$_SESSION['user_type'];
    include('../../include/header.php');
    include('../../include/navbar.php');
?>
    <div class="container-fluid cart p-0">
        <p class="text-center fs-1 fw-bolder mt-4">CART</p>
        
        <form action="" class="mx-3">
            <div class="text-end me-3">
                <button class="border-0 fs-4" style="background-color:#fff;">edit</button>
            </div>
            <hr>
            <div class="content d-flex align-items-center justify-content-between">
                <div class="left d-flex align-items-center mt-2">
                    <div class="form-check">
                        <input class="form-check-input shadow-none border-dark rounded-0" style="height:30px;width:30px;" type="checkbox" value="">
                    </div>
                    <div class="box border border-dark ms-3" style="height: 124px;width: 112px;"></div>
                    <div class="text ms-3 d-flex flex-column justify-content-center">
                        <p class="fs-4">VECTOR ART</p>
                        <div class="d-flex align-items-center justify-content-around border border-dark" style="width:100px;">
                            <i class="fas fa-plus"></i>
                            <p class="fs-4 mb-1">1</p>
                            <i class="fas fa-minus"></i>
                        </div>
                    </div>
                </div>
                <div class="right d-flex align-items-center">
                    <p class="mb-1 me-3">₱ 390.00</p>
                    <span class="iconify fs-1" data-icon="bi:x" style="color: #c4c4c4;"></span>
                </div>
            </div>
            <hr>
        </form>


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
        

<?php include('../../include/footer.php');
