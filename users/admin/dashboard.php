<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <link rel="stylesheet" href="../../assets/css/css/all.css">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <title>NJ Customized Glass Painting</title>
</head>
<body>
    <!---------------------------------- navbar content ------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse d-inline-block">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../logout.php">log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="dashboard.php"><img src="../../assets/images/header-logo1.png" alt=""></a>
                </div>
            </div>
            <div class="col">
                <div class="search-box d-flex mt-3 me-3 float-end">
                    <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span>
                </div>
            </div>
        </div>
    </header>

    <!--------------------------------homepage content------------------------------->
    <div class="container-fluid admin p-0">
        <br>
        <br>
        <div class="row gx-3 mb-5 px-4" style="height: 800px;">
            <div class="col-3 sidebar p-0 me-3">
                <p class="header text-center fw-bold fs-2 mt-2">ADMIN</p>
                <br>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="dashboard.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="iwwa:dashboard"></span>Dashboard
                    </a>
                </div>
                <hr>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="transaction.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
                    </a>
                </div>
                <hr>
                <div class="ms-2">
                    <div class="accordion" id="collapse-buttons">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button d-flex align-items-center collapsed fs-3 p-0 pe-2 d-inline-block shadow-none " type="button" data-bs-toggle="collapse" data-bs-target="#shipping-info" aria-expanded="false" aria-controls="shipping-info">
                                <span class="iconify fs-2 me-2" data-icon="bytesize:cart"></span>Product
                            </button>
                            </h2>
                            <div id="shipping-info" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="text-start ms-2 mb-4">
                                        <ul>
                                            <li>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-1">Anime Art</p>
                                                    <span style="color:#C4C4C4" class="iconify fs-5 me-2" data-icon="bi:trash"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-1">Cartoon Art</p>
                                                    <span style="color:#C4C4C4" class="iconify fs-5 me-2" data-icon="bi:trash"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-1">Vector Art</p>
                                                    <span style="color:#C4C4C4" class="iconify fs-5 me-2" data-icon="bi:trash"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-grid col-8 mx-auto px-0 btn btn-shadow" style="background: rgba(209, 209, 209, 0.77);color:#000">
                                        <a class="text-reset text-decoration-none" data-parent="#product" href="addproduct.html">+ add product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            <div class="col right">
                <p class="header fs-2 fw-bold mb-4 mt-5 mx-4">DASHBOARD</p>
                <div class="row gy-5 mt-2 d-flex justify-content-evenly">
                    <div class="col-3 box position-relative" style="background: #ABC4FF;">
                        <div class="icon float-end mt-4">
                            <span class="iconify me-2" style="font-size: 72px;" data-icon="ic:outline-pending-actions"></span>
                        </div>
                        <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">PENDING ORDERS</p>
                    </div>
                    <div class="col-3 box position-relative" style="background: #ABC4FFD9;">
                        <div class="icon float-end mt-4">
                            <span class="iconify me-2" style="font-size: 72px;" data-icon="ep:circle-check"></span>
                        </div>
                        <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">CONFIRMED ORDERS</p>
                    </div>
                    <div class="col-3 box position-relative" style="background: #ABC4FFB2;">
                        <div class="icon float-end mt-4">
                            <span class="iconify me-2" style="font-size: 72px;" data-icon="icon-park-outline:sales-report"></span>
                        </div>
                        <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">TOTAL SALES</p>
                    </div>
                    <div class="col-3 box position-relative" style="background: #ABC4FFD9;">
                        <div class="icon float-end mt-4">
                        </div>
                        <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">placeholder</p>
                    </div>
                    <div class="col-3 box position-relative" style="background: #ABC4FFD9;">
                        <div class="icon float-end mt-4">
                        </div>
                        <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">placeholder</p>
                    </div>
                    <div class="col-3 box position-relative" style="background: #ABC4FFD9;">
                        <div class="icon float-end mt-4">
                        </div>
                        <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">placeholder</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!--------------------------------footer------------------------------->
        <footer>
            <div class="row">
                <div class="col d-flex flex-column">
                    <a class="text-decoration-none text-reset mt-3" href="contact.html">Contact</a>
                    <a class="text-decoration-none text-reset" href="about.html">About</a>
                    <a class="text-decoration-none text-reset mb-4" href="policy.html">Return Policy</a>
                </div>
                <div class="col">
                    <p class="fw-bold mt-3">Social Media</p>
                    <p class="text-decoration-underline">https://www.facebook.com/NJglasspainting</p>
                    <p class="mb-4">https://www.instagram.com/njglasspainting/</p>
                </div>
            </div>
        </footer>
    </div>




  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
