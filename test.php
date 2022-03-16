<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <link rel="stylesheet" href="assets/css/css/all.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <title>NJ Customized Glass Painting</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse d-inline-block">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="login.php">order status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">sign up</a>
            </li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <a href="index.php"><img src="assets/images/header-logo1.png" alt=""></a>
                </div>
            </div>
            <div class="col">
                <div class="search-box d-flex mt-3 float-end">
                    <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span>
                    <div class="icons mx-4">
                        <a class="text-reset" href="login.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="login.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br><br><br><br><br><br>



    <input type="text" id="addons-price" name="addons-price" value=0>
    <!-- store the addons description -->
    <input type="text" id="addons-name" name="addons-name" value="">
    <!-- buttons for addons -->
    <div class="d-flex mx-0">
        <button type="button" onClick="getaddons(this)" class="d-inline-block btn btn-outline-dark shadow-none me-3" name="addons" id="addons" data-bs-toggle="button" value=30 >Character</button>
        <button type="button" onClick="getaddons(this)" class="d-inline-block btn btn-outline-dark shadow-none me-3" name="addons" id="addons" data-bs-toggle="button" value=30 >Background/Dedication</button>
    </div>
    <script>
        let name_arr = [];
         function getaddons(element) {
            let sum = document.getElementById("addons-price");
            let name = document.getElementById("addons-name");
            
            if(element.classList.contains("active")){
                //add value to result
                sum.value = parseInt(sum.value) + parseInt(element.value);
                name_arr.push(element.innerHTML); 
            }
            else{
                //subtract value from result
                sum.value = parseInt(sum.value) - parseInt(element.value);
                name_arr.pop(element.innerHTML);
            }
            name.value = name_arr.join(", ");
        }
    </script>
    <p>You can click the button to add a new subject mathematics in the subjects array.</p>
    <button onClick="addSubject()">Add Now</button>
    <p id="sample"></p>

    <script>
        var subjects = ["Physics", "Chemistry", "Biology", "Aeronatics"]; 
        document.getElementById("sample").innerHTML = subjects;

        function addSubject() { 
            subjects.push("Mathematics");
            document.getElementById("sample").innerHTML = subjects;
        }
    </script>




    <br><br><br><br><br><br>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>