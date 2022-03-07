<?php 
    session_start();
    include('include/header.php');
    include('include/navbar.php');
?>
    <div class="container-fluid product p-0">
        <div class="header mx-3 mt-4">
            <p class="d-inline fs-4 text-decoration-underline">VECTOR ART</p>
            <p class="d-inline fs-4">╱</p>
            <a class="d-inline text-reset text-decoration-none" href="index.php">HOME</a>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="row">
                <div class="col">
                    <div id="AnimeSlide" class="carousel carousel-dark slide mx-auto" data-bs-ride="carousel">
                        <div class="carousel-inner mt-4 mb-5">
                        <div class="carousel-item active">
                            <img src="assets/images/vector/1.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/vector/2.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/vector/3.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/vector/4.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/vector/5.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/vector/6.jpg" class="d-block" alt="">
                        </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#AnimeSlide" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#AnimeSlide" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="d-grid col-9 mx-auto btn">
                        <div class="accordion" id="collapse-buttons">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed d-inline-block text-center shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#description" aria-expanded="false" aria-controls="description">
                                        DESCRIPTION
                                    </button>
                                </h2>
                                <div id="description" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="col d-flex justify-content-around mx-3">
                                            <div class="left mt-2">
                                                <p class="m-0">Glass size:</p>
                                                <p class="m-0 text-start">Materials:</p>
                                                <p class="m-0 text-start">Medium:</p>
                                            </div>
                                            <div class="right mt-2">
                                                <p class="m-0 text-start">6x6</p>
                                                <p class="m-0">Acrylic Glass</p>
                                                <p class="m-0">Acrylic Paint</p>
                                            </div>
                                        </div>
                                        <p class="mt-3">Free wood stand, freebies and with good packaging.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed d-inline-block text-center shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="false" aria-controls="price">
                                        PRICE
                                    </button>
                                </h2>
                                <div id="price" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="col-6 text-start mx-auto mb-4">
                                            <p class="m-0 mt-2">₱ 390 - 1 CHARACTER</p>
                                            <p class="m-0">₱ 420 - 2 CHARACTERS</p>
                                        </div>
                                        <div class="col-10 text-start mx-auto">
                                            <p class="m-0 fw-bold text-center me-4">Add-ons</p>
                                            <p class="m-0">+ ₱ 30 ADDITIONAL CHARACTERS</p>
                                            <p class="m-0">+ ₱ 30 ADDITONAL BACKGROUND/DEDICATION</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed d-inline-block text-center shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#shipping-info" aria-expanded="false" aria-controls="shipping-info">
                                        SHIPPING INFORMATION
                                    </button>
                                </h2>
                                <div id="shipping-info" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed d-inline-block text-center shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#policy" aria-expanded="false" aria-controls="policy">
                                        RETURN AND CANCEL POLICY
                                    </button>
                                </h2>
                                <div id="policy" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#collapse-buttons">
                                    <div class="accordion-body">
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <div class="col px-5">
                    <div class="body ms-2">
                        <p class="fs-1">VECTOR ART</p>
                        <hr>
                        <p class="fs-4">Characters</p>
                        <!-- buttons for character price -->
                        <input type="hidden" id="baseprice" name="baseprice" value="">
                        <div class="d-flex mx-0">
                            <button type="button" class="d-inline-block btn btn-outline-dark me-3 shadow-none price-select" onClick="price_btn(this)" name="price-btn" id="price-btn1" value=390 >1 Character</button>
                            <button type="button" class="d-inline-block btn btn-outline-dark me-3 shadow-none price-select" onClick="price_btn(this)" name="price-btn" id="price-btn2" value=420 >2 Characters</button>
                        </div>
                        <hr>
                        <p class="fs-4">Add-ons</p>
                        <!-- buttons for addons -->
                        <div class="d-flex mx-0">
                            <button type="button" class="d-inline-block btn btn-outline-dark shadow-none me-3" name="addons-ch" id="addons" data-bs-toggle="button" value=30 >Character</button>
                            <button type="button" class="d-inline-block btn btn-outline-dark shadow-none me-3" name="addons-bd" id="addons" data-bs-toggle="button" value=30 >Background/Dedication</button>
                        </div>
                        <hr>
                        <p class="fs-4">Quantity</p>
                        <!-- button for quantity -->
                        <div class="d-flex align-items-center">
                        <button type="button" class="border-0" onClick="increase()"><i class="fas fa-plus"></i></button>
                        <input type="text" id="qtybox" name="qtybox" class="mx-2 text-center" value="1" style="height:50px;width:50px;" readonly>
                        <button type="button" class="border-0" onClick="decrease()"><i class="fas fa-minus"></i></button>
                    </div>
                        <hr>
                        <!-- button for upload image -->
                        <div class="d-grid col-3 upload">
                            <button type="button" class="py-1"><i class="fas fa-upload me-3"></i>Upload</button>
                        </div>
                    </div>
                    <!-- button for submit -->
                    <div class="d-grid col-9 p-0 mt-3 btn">
                        <a href="login.php" class="btn btn-outline-dark mb-3" role="button" aria-pressed="true">ADD TO CART</a>
                        <a href="login.php" class="btn btn-outline-dark" role="button" aria-pressed="true">BUY NOW</a>
                    </div>
                </div>
            </div>
            <script src="assets/javascript/index.js"></script>

<?php include('include/footer.php');
