<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../include/header.php');
    include('../../include/navbar.php');
?>
<div class="container-fluid admin p-0">
    <div class="row gx-3 py-3 px-4" style="min-height: 800px;">
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
                <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="admin-transaction/pending.php">
                    <span class="iconify fs-1 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
                </a>
            </div>
            <hr>
            <div class="ms-2 d-flex align-items-center">
                <a class="text-reset text-decoration-none fw-bold fs-3 ms-2 mb-1 w-100" href="admin-product.php">
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
            <p class="text-center fs-2 fw-bold mb-5 mt-4 mx-4">PRODUCT</p>
            <!-- form -->
                <div class="mx-3 col-5 text-end">
                    <div class="search-box border border-dark d-flex mb-4 text-end">
                        <input type="search" class="px-3" placeholder="search">
                        <span><i class="fas fa-search mx-2"></i></span>
                    </div>
                </div>
                <div class="table-responsive mx-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="col-9 fs-4">PRODUCT</th>
                                <th scope="col" class="col-2 text-center">
                                    <a class="text-reset" data-bs-toggle="modal" href="#info1" role="button">
                                        <span class="iconify fs-1" data-icon="akar-icons:circle-plus" style="color: #ff9a62;"></span>
                                    </a>
                                    <?php include('admin-product-modal.php'); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once('../../include/database.php');
                                $database = new Connection();
                                $db = $database->open();
                                //query to display all product
                                $sql = $db->prepare("SELECT product_name FROM product");
                                $sql->execute();
                                $no = 0;
                                while($row=$sql->fetch(PDO::FETCH_ASSOC)){
                                    $no++;
                            ?>
                            <tr class="align-middle">
                                <td class="ps-3"><?php echo $no; ?></td>
                                <td class="fs-5"><?php echo $row['product_name']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="text-reset me-2" href=""><span class="iconify fs-3" data-icon="clarity:note-edit-line" style="color: #ff9a62;"></span></a>
                                        <a class="text-reset" href=""><span class="iconify fs-3" data-icon="akar-icons:trash-can"></span></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                }
                                //close connection
                                $database->close();
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>

<script src="../../assets/javascript/index.js">
    
</script>
<?php include('../../include/footer.php'); ?>