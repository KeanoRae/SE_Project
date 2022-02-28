<?php 
    session_start();
    echo 'email = '.$_SESSION['email'];
    echo "<br>";
    echo 'id = '.$_SESSION['pid'];
    echo "<br>";
    echo 'type = '.$_SESSION['user_type'];
    include('../../include/header.php');
    include('../../include/navbar.php');
?>
    <div class="container-fluid trackorders p-0">
        <br>
        <br>
        <p class="fs-1 text-center">TRACK YOUR ORDER</p>
        <hr class="w-50 mx-auto">
        <br>
        <br>
        <div class="form-floating col-3 mx-auto mb-3">
            <input type="text" class="form-control" id="floatingID" placeholder="order ID">
            <label for="floatingID">order ID</label>
        </div>
        <div class="form-floating col-3 mx-auto mb-4">
            <input type="email" class="form-control" id="floatingEmail" placeholder="email">
            <label for="floatingEmail">email</label>
        </div>
        <div class="text-center">
            <button type="button" class="btn-pink btn-shadow btn btn-lg active py-2 border-0 fw-normal">TRACK</button>
        </div>
        <br>
        <br>
        <br>
        <br>

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
