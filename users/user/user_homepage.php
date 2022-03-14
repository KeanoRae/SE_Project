<?php 
    session_start();
    //echo 'email= '.$_SESSION['email'];
    //echo "<br>";
    //echo 'id= '.$_SESSION['pid'];
    //echo "<br>";
    //echo 'type = '.$_SESSION['user_type'];
    //echo "<br>";
    //echo "logged in = ".$_SESSION['user_logged_in'];
    //if(isset($_SESSION['product_name'])){
        //echo $_SESSION['product_name'];
    //}
    //else{
        //echo "Not set";
    //}
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
                $sql=$db->prepare("SELECT id, product_name, product_cover FROM product");
                $sql->execute();
                while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="hp-container mt-5">
                <!-- display product cover -->
                <?php echo '<img src="data:image;base64,'.base64_encode($row['product_cover']).'" alt="img" >'; ?>
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
