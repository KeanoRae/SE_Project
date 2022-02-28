<?php 
    session_start();
    echo 'email= '.$_SESSION['email'];
    echo "<br>";
    echo 'id= '.$_SESSION['pid'];
    echo "<br>";
    echo 'type = '.$_SESSION['user_type'];
    echo "<br>";
    echo "logged in = ".$_SESSION['logged_in'];
    include('../../include/header.php');
    include('../../include/navbar.php');
?>
    <div class="container-fluid homepage p-0">
        <form action="process/product_process.php" method="POST">
            <div class="content">
                <div class="hp-container mt-5">
                    <img src="../../assets/images/hp-anime.png" alt="">
                    <div class="button">
                        <button type="submit" name="anime_btn" class="btn btn-secondary btn-lg shadow-none">shop now</button>
                    </div>
                </div>
                <div class="hp-container">
                    <img src="../../assets/images/hp-cartoon.png" alt="">
                    <div class="button">
                    <button type="submit" name="cartoon_btn" class="btn btn-secondary btn-lg shadow-none">shop now</button>
                    </div>
                </div>
                <div class="hp-container">
                    <img src="../../assets/images/hp-vector.png" alt="">
                    <div class="button">
                    <button type="submit" name="vector_btn" class="btn btn-secondary btn-lg shadow-none">shop now</button>
                    </div>
                </div>
            </div>
        </form>
        
<?php include('../../include/footer.php'); ?>
