<!-- First Modal -->
<div class="modal fade" id="info1" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="info1Label" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="container-fluid">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="mb-2">Upload product cover</h5>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="file" name="cover" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-2">Upload product sample</h5>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="file" name="sample[]" value="">
                                </div>
                            </div>
                        </div>
                    <?php
                        include_once('../../include/database.php');
                        $database = new Connection();
                        $db = $database->open();
                        //query to display all admin and staff
                        $sql2 = $db->prepare("SELECT size, material, medium, category FROM product_details");
                        $sql2->execute();
                        $data=$sql2->fetch(PDO::FETCH_ASSOC); 
                    ?>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <h5 class="mb-2">Product Name</h5>
                                    <input type="text" class="form-control my-2" name="productname" value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-2">Category</h5>
                                <div>
                                    <select name="category" class="w-100 py-2 fs-5 rounded">
                                        <option value="" selected disabled hidden></option>
                                        <?php 
                                            while($data){
                                        ?>
                                        <option><?php echo $data['category']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>                 
                            </div>
                        </div>
                    <?php
                        //close connection
                        $database->close();
                    ?> 
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <h5 class="mb-2">Size</h5>
                                    <div >
                                        <select name="size" class="py-2 w-100 rounded">
                                            <option value="" selected disabled hidden></option>
                                            <option><?php echo $row['size']; ?></option>
                                        </select>
                                    </div>                       
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-2">Material</h5>
                                <div>
                                    <select name="material" class="py-2 fs-5 w-100 rounded">
                                        <option value="" selected disabled hidden></option>
                                        <option class="py-5"><?php echo $row['material']; ?></option>
                                    </select>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <h5 class="mb-2">Medium</h5>
                                <select name="medium" class="py-2 w-100 rounded">
                                    <option value="" selected disabled hidden></option>
                                    <option class="py-5"><?php echo $row['medium']; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <div class="tmp">
                                    <span class="iconify fs-2" data-icon="mdi:plus-box-multiple-outline" style="color: blue;"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="float-end">
                                    <button class="fs-4 px-3 mb-3 border border-dark btn-pink btn-shadow" data-bs-target="#info2" data-bs-toggle="modal" data-bs-dismiss="modal">NEXT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Second Modal -->
<div class="modal fade" id="info2" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="info2Label" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start fw-normal">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Character -->
                        <div class="col-6">
                            <div class="d-flex">
                                <h5 class="me-2">CHARACTER</h5>
                                <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                            </div>
                            <div class="modal-product border-0">
                                <div class="row py-1">
                                    <div class="col-4 text-center">
                                        <p class="mb-0 fs-5">1 Character</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="w-100">
                                    </div>
                                    <div class="col-2 d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-4 text-center">
                                        <p class="mb-0 fs-5">2 Character</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="w-100">
                                    </div>
                                    <div class="col-2 d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-4 text-center">
                                        <p class="mb-0 fs-5">3 Character</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="w-100">
                                    </div>
                                    <div class="col-2 d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add-ons -->
                        <div class="col-6">
                            <div class="d-flex">
                                <h5 class="me-2">ADD - ONS</h5>
                                <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                            </div>
                            <div class="modal-product border-0">
                                <div class="row scroll py-1">
                                    <div class="col-4 text-center">
                                        <p class="mb-0 fs-5">CHARACTER</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="w-100">
                                    </div>
                                    <div class="col-2 d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row scroll py-2">
                                    <div class="col-4 text-center">
                                        <p class="mb-0 fs-5">DESCRIPTION</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="w-100">
                                    </div>
                                    <div class="col-2 d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- Shipping Method -->
                        <div class="col-6">
                            <div class="d-flex">
                                <h5 class="me-2">SHIPPING METHOD</h5>
                                <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                            </div>
                            <div class="modal-product2 border-0">
                            <div class="row py-2">
                                    <div class="col-10">
                                        <select name="payment-method" class="w-75 py-1">
                                            <option value="" selected disabled hidden></option>
                                            <option value="">JRS - EXPRESS</option>
                                        </select>
                                    </div>
                                    <div class="col d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Payment Method -->
                        <div class="col-6">
                            <div class="d-flex">
                                <h5 class="me-2">PAYMENT METHOD</h5>
                                <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                            </div>
                            <div class="modal-product2 border-0">
                                <div class="row py-2">
                                    <div class="col-10">
                                        <select name="payment-method" class="w-75 py-1">
                                            <option value="" selected disabled hidden></option>
                                            <option value="">GCash</option>
                                            <option value="">M Lhuillier Padala</option>
                                            <option value="">Cebuana Lhuillier</option>
                                        </select>
                                    </div>
                                    <div class="col d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- Shipping Fee -->
                        <div class="col-6">
                            <div class="d-flex">
                                <h5 class="me-2">SHIPPING FEE</h5>
                                <span class="iconify fs-3" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                            </div>
                            <div class="modal-product border-0">
                                <div class="row py-1">
                                    <div class="col-4 text-start">
                                        <p class="mb-0 fs-5">NCR</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="w-100">
                                    </div>
                                    <div class="col-2 d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-4 text-start">
                                        <p class="mb-0 fs-5">Luzon</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="w-100">
                                    </div>
                                    <div class="col-2 d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-4 text-start">
                                        <p class="mb-0 fs-5">Visayas</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="w-100">
                                    </div>
                                    <div class="col-2 d-flex text-center align-items-center">
                                        <button class="border-0">
                                            <span class="iconify fs-5" data-icon="akar-icons:trash-can"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="text-end">
                            <button class="fs-4 px-3 mb-3 border border-dark btn-pink btn-shadow" data-bs-dismiss="modal" aria-label="Close">SAVE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
