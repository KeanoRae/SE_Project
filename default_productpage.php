<?php 
    session_start();
    include('include/header.php');
    include('include/navbar.php');
    include('product_process.php')
?>
    <div class="container-fluid product p-0">
        <div class="header mx-3 mt-4">
            <p class="d-inline fs-3 text-decoration-underline"><?php echo strtoupper($product_name); ?></p>
            <p class="d-inline fs-4">╱</p>
            <a class="d-inline text-reset text-decoration-none" href="index.php">HOME</a>
        </div>
        <div class="row">
            <div class="col">
                <div id="AnimeSlide" class="carousel carousel-dark slide mx-auto" data-bs-ride="carousel">
                    <div class="carousel-inner mt-4 mb-5">
                    <?php
                        include_once('include/database.php');
                        $database = new Connection();
                        $db = $database->open();
                        $sql = $db->prepare("SELECT carousel_image FROM product_carousel WHERE product_id=:pid");
                        //bind
                        $sql->bindParam(':pid', $id);
                        $sql->execute();
                        $i=1;
                        while($row=$sql->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
                        <div class="<?php echo $item_class; ?>">
                        <?php echo '<img src="data:image;base64,'.base64_encode($row['carousel_image']).'" class="d-block" >'; ?>
                        </div>
                    <?php
                            $i++;
                        }
                    ?>
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
                <div class="col-10 border border-dark mx-auto">
                    <p class="mb-0 py-2 text-center fs-3">PRODUCT DETAILS</p>
                    <hr class="my-0">
                    <div class="d-flex justify-content-between mx-5">
                        <div class="fs-5 mt-2">
                            <p class="m-0">Glass size:</p>
                            <p class="m-0 text-start">Materials:</p>
                            <p class="m-0 text-start">Medium:</p>
                        </div>
                        <div class="fs-5 mt-2">
                            <p class="m-0 text-start">6x6</p>
                            <p class="m-0">Acrylic Glass</p>
                            <p class="m-0">Acrylic Paint</p>
                        </div>
                    </div>
                    <hr class="my-0">
                    <p class="mb-0 py-2 text-center fs-3">PRICE</p>
                    <hr class="my-0">
                    <div class="mx-3 fs-5 mb-3">
                        <p class="m-0 mt-2"><?php echo "₱".$price1." - 1 CHARACTER"; ?></p>
                        <p class="m-0"><?php echo "₱".$price2." - 1 CHARACTER"; ?></p>
                    </div>
                    <div class="mx-3 fs-5 mb-2">
                        <p class="m-0 fw-bold">Add-ons</p>
                        <p class="m-0"><?php echo "+ ₱".$addons1." - ADDITIONAL CHARACTERS"; ?></p>
                        <p class="m-0"><?php echo "+ ₱".$addons1." - ADDITIONAL BACKGROUND/DEDICATION"; ?></p>
                    </div>
                    <hr class="my-0">
                    <p class="mb-0 py-2 text-center fs-3">HOW TO ORDER</p>
                    <hr class="my-0">
                    <div class="mx-2">
                        <p class="mb-0 py-2 fs-4">BEFORE PLACING AN ORDER:</p>
                        <ol class="fs-5">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ol>
                        <p class="mb-0 py-2 fs-4">AFTER PLACING AN ORDER:</p>
                        <ol class="fs-5">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ol>
                    </div>
                    

                </div>
                <br>
                <br>
                <br>
            </div>
            <div class="col px-5">
            <form action="" method="POST">
                <div class="body ms-2">
                    <p class="fs-1"><?php echo strtoupper($product_name); ?></p>
                    <hr>
                    <p class="fs-4">Characters</p>
                    <!-- buttons for character price -->
                    <input type="hidden" id="baseprice" name="baseprice" value="">
                    <div class="d-flex mx-0">
                        <button type="button" class="d-inline-block btn btn-outline-dark me-3 shadow-none price-select" onClick="price_btn(this)" name="price-btn" id="price-btn1" value=<?php echo $price1; ?> >1 Character</button>
                        <button type="button" class="d-inline-block btn btn-outline-dark me-3 shadow-none price-select" onClick="price_btn(this)" name="price-btn" id="price-btn2" value=<?php echo $price2; ?> >2 Characters</button>
                    </div>
                    <hr>
                    <p class="fs-4">Add-ons</p>
                    <!-- buttons for addons -->
                    <input type="number" id="addons-price" name="addons-price" value=0 hidden>
                    <div class="d-flex mx-0">
                        <button type="button" onClick="getaddons(this)" class="d-inline-block btn btn-outline-dark shadow-none me-3" name="addons-ch" id="addons" data-bs-toggle="button" value=<?php echo $addons1; ?> >Character</button>
                        <button type="button" onClick="getaddons(this)" class="d-inline-block btn btn-outline-dark shadow-none me-3" name="addons-bd" id="addons" data-bs-toggle="button" value=<?php echo $addons2; ?> >Background/Dedication</button>
                    </div>
                    <hr>
                    <p class="fs-4">Quantity</p>
                    <!-- gets the subtotal -->
                    <input type="hidden" id="subtotal" name="subtotal" value="">
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
                    <a href="login.php" class="btn btn-outline-dark mb-3">ADD TO CART</a>
                    <a href="login.php" class="btn btn-outline-dark mb-3">BUY NOW</a>
                </div>
            </form>
            </div>
        </div>
    </div>
<script src="assets/javascript/index.js"></script>
<?php include('include/footer.php');
