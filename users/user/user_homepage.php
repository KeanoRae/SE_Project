<?php
    session_start();
    if(isset($_SESSION['cart_checkout_id'])){
        unset($_SESSION['cart_checkout_id']);
    }
?>
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
    <!--navbar-->
    <nav>
        <input type="checkbox" id="navbar-check">
        <label for="navbar-check" class="check-icon">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li class="nav-item">
                <a class="nav-link" href="trackorders.php">order status</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="../../logout.php">log out</a>
            </li>
        </ul>

    </nav>

    <!--header-->
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="user_homepage.php"><img src="../../assets/images/header-logo1.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-9">
                <div class="search-box d-flex mt-3 float-end">
                    <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span>
                    <div class="icons mx-4">
                        <a class="text-reset" href="order-details/user-pending.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="cart.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid homepage p-0">
        <div class="content">
            <?php
                include_once('../../include/database.php');
                $database = new Connection();
                $db = $database->open();

                //fetch id,product name,product cover image from database
                $sql=$db->prepare("SELECT id, product_name, product_cover, product_cover_path FROM product");
                $sql->execute();
                while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="hp-container mt-5">
                <!-- display product cover -->
                <img src="<?php echo "../../".$row['product_cover_path']; ?>" class="img-fluid" alt="">
                <div class="button">
                    <!-- button that redirect to product page -->
                    <a href="user_productpage.php?id=<?php echo $row['id']; ?>" name="product<?php echo $row['product_name']; ?>" 
                        class="btn btn-secondary btn-lg shadow-none">shop now
                    </a>
                </div>
            </div>
            <?php
                }
                //close connection
                $database->close();
            ?>
        </div>
    </div>  
<?php include('../../include/footer.php'); ?>
