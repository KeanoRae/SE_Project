<?php 
    session_start();
    include('../../include/header.php');
    include('../../include/navbar.php');
?>
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
                <img src="<?php echo "../../".$row['product_cover_path']; ?>" alt="">
                <div class="button">
                    <!-- button that redirect to product page -->
                    <a href="user_productpage.php?shopnowid=<?php echo $row['id']; ?>" name="product<?php echo $row['product_name']; ?>" 
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
