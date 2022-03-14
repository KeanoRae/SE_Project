<?php
session_start();
    if(isset($_SESSION['user_type']) and $_SESSION['user_type']=='user'){
        header('Location: users/user/user_homepage.php');
    }
    elseif(isset($_SESSION['user_type']) and $_SESSION['user_type']=='admin'){
        header('Location: users/admin/dashboard.php');
    }
    else{
        include('include/header.php');
        include('include/navbar.php');
?>

    <div class="container-fluid homepage p-0">
        <div class="content">
            <?php
                include_once('include/database.php');
                $database = new Connection();
                $db = $database->open();

                //fetch id,product name,product cover image from database
                $sql=$db->prepare("SELECT id, product_name, product_cover FROM product");
                $sql->execute();
                while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="hp-container mt-5">
                <!-- display product cover -->
                <?php echo '<img src="data:image;base64,'.base64_encode($row['product_cover']).'" alt="img" >'; ?>
                <div class="button">
                    <!-- button that redirect to product page -->
                    <a href="default_productpage.php?shopnowid=<?php echo $row['id']; ?>" name="product<?php echo $row['product_name']; ?>" 
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
        
<?php 
    include('include/footer.php');
    }
?>