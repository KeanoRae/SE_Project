<?php 
    session_start();
    //echo 'email = '.$_SESSION['email'];
    //echo "<br>";
    //echo 'id = '.$_SESSION['pid'];
    //echo "<br>";
    //echo 'type = '.$_SESSION['user_type'];
    //echo "<br>";
    //echo "product name = ".$_SESSION['product_name'];
    include('../../include/header.php');
    include('../../include/navbar.php');
    include('process/order_process.php');
?>
    <div class="container-fluid product p-0">
        <div class="header mx-3 mt-4">
            <p class="d-inline fs-4 text-decoration-underline">CARTOON ART</p>
            <p class="d-inline fs-4">╱</p>
            <a class="d-inline text-reset text-decoration-none" href="user_homepage.php">HOME</a>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="row">
                <div class="col">
                    <div id="AnimeSlide" class="carousel carousel-dark slide mx-auto" data-bs-ride="carousel">
                        <div class="carousel-inner mt-4 mb-5">
                        <div class="carousel-item active">
                            <img src="../../assets/images/cartoon/1.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/cartoon/2.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/cartoon/3.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/cartoon/4.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/cartoon/5.jpg" class="d-block" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/images/cartoon/6.jpg" class="d-block" alt="">
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
                                            <p class="m-0 mt-2">₱ 420 - 1 CHARACTER</p>
                                            <p class="m-0">₱ 480 - 2 CHARACTERS</p>
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
                        <p class="fs-1">CARTOON ART</p>
                        <hr>
                        <p class="fs-4">Characters</p>
                        <?php
                            include_once('../../include/database.php');
                            $database = new Connection();
                            $db = $database->open();
                            $sql = $db->prepare("SELECT 1ch_price, 2ch_price, add_char, add_dedication FROM product WHERE product_name=:name");
                            $sql->bindParam(':name',$_SESSION['product_name']);
                            $sql->execute();

                            while($row=$sql->fetch(PDO::FETCH_ASSOC)){          
                        ?>
                        <!-- buttons for character price -->
                        <input type="hidden" id="baseprice" name="baseprice" value="">
                        <div class="d-flex mx-0">
                            <button type="button" class="d-inline-block btn btn-outline-dark me-3 shadow-none price-select" onClick="price_btn(this)" name="price-btn" id="price-btn1" value=<?php echo $row['1ch_price']; ?> >1 Character</button>
                            <button type="button" class="d-inline-block btn btn-outline-dark me-3 shadow-none price-select" onClick="price_btn(this)" name="price-btn" id="price-btn2" value=<?php echo $row['2ch_price']; ?> >2 Characters</button>
                        </div>
                        <div class="error mb-2" style="color:red;">
                            <?php echo $errors['price']; ?>
                        </div>
                        <hr>
                        <p class="fs-4">Add-ons</p>
                         <!-- buttons for addons -->
                         <div class="d-flex mx-0">
                            <button type="button" class="d-inline-block btn btn-outline-dark shadow-none me-3" name="addons-ch" id="addons" data-bs-toggle="button" value=<?php echo $row['add_char']; ?> >Character</button>
                            <button type="button" class="d-inline-block btn btn-outline-dark shadow-none me-3" name="addons-bd" id="addons" data-bs-toggle="button" value=<?php echo $row['add_dedication']; ?> >Background/Dedication</button>
                        </div>
                        <?php
                            }
                            //close connection
                            $database->close();
                        ?>
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
                        <button type="submit" name="cart_btn" class="btn btn-outline-dark mb-3">ADD TO CART</button>
                        <button type="submit" name="buynow_btn" class="btn btn-outline-dark mb-3">BUY NOW</button>
                    </div>
                </div>
            </div>
            <script src="../../assets/javascript/index.js"></script>
        </form>
        <!--------------------------------footer------------------------------->
        <footer>
            <div class="row">
                <div class="col d-flex flex-column">
                    <a class="text-decoration-none text-reset mt-3" href="contact.php">Contact</a>
                    <a class="text-decoration-none text-reset" href="about.php">About</a>
                    <a class="text-decoration-none text-reset mb-4" href="policy.php">Return Policy</a>
                </div>
                <div class="col">
                    <p class="fw-bold mt-3">Social Media</p>
                    <p class="text-decoration-underline">https://www.facebook.com/NJglasspainting</p>
                    <p class="mb-4">https://www.instagram.com/njglasspainting/</p>
                </div>
            </div>
        </footer>
    </div>

  
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
