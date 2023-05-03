<?php 
    session_start();
    include('process/shipping_info_process.php');
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
                    <!-- <input type="search" class="px-3" placeholder="search">
                    <span><i class="fas fa-search mx-2"></i></span> -->
                    <div class="icons mx-4">
                        <a class="text-reset" href="order-details/user-pending.php"><span class="iconify icon1" data-icon="carbon:user-avatar-filled-alt"></span></a>
                        <a class="text-reset" href="cart.php"><span class="iconify" data-icon="bytesize:bag"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid shipping-info p-0">
        <?php
            if(isset($_SESSION['msg']) and $_SESSION['msg'] !=''){
            ?>
            <div class="alert alert-danger py-4" role="alert">
                <h4><?php echo $_SESSION['msg']; ?></h4>
            </div>
                <?php
                unset($_SESSION['msg']);
            }
            else{
                echo "<br>";
                echo "<br>";
            }
        ?>
        <div class="header ms-5">
            <a class="d-inline fw-normal fs-4 text-decoration-none text-reset" href="cart.php">cart</a>
            <p class="d-inline fw-normal fs-4">></p>
            <p class="d-inline fw-bolder fs-4">shipping</p>
            <div class="title">
                <p class="fs-3 mb-0 mt-1"><span class="iconify pb-1 fs-1" data-icon="carbon:location"></span>Shipping Address</p>
            </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="row">
                <div class="col">
                    <br>
                    <div class="row ms-5">
                        <?php
                            include_once('../../include/database.php');
                            $database = new Connection();
                            $db = $database->open();

                            $sql = $db->prepare("SELECT first_name, last_name, email, phone_number FROM user WHERE id=:uid");
                            //bind
                            $sql->bindParam(':uid', $_SESSION['pid']);
                            $sql->execute();
                            if($display=$sql->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <div class="col-6 mb-3">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $display['first_name']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $display['last_name']; ?>">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $display['email']; ?>">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="number">Phone No.</label>
                            <input type="text" class="form-control" name="number" value="<?php echo $display['phone_number']; ?>">
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-12 mb-3">
                            <label for="address">Unit or House No. & Street No.</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $var['addr']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['addr']; ?>
                            </div>
                        </div>
                        <div class="col-6 mb-5">
                            <label for="region">Province</label>
                            <div>
                                <select name="province" id="province" class="w-100">
                                    <option value="" selected disabled hidden></option>
                                </select>
                            </div>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['province']; ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="city">City</label>
                            <div>
                                <select name="city" id="city" class="w-100">
                                    <option value="" selected disabled hidden></option>
                                </select>
                            </div>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['city']; ?>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="barangay">Barangay</label>
                            <input type="text" class="form-control" name="barangay" value="<?php echo $var['brgy']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['brgy']; ?>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="postal">Zip Code</label>
                            <input type="text" class="form-control" name="postal" value="<?php echo $var['postal']; ?>">
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['postal']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="ms-5 mb-2">
                        <p class="my-0 fs-3"><span class="iconify pb-1 fs-1" data-icon="fluent:vehicle-truck-profile-24-regular"></span>Shipping Method</p>
                    </div>
                    <div class="col-12">
                        <div class="btn-group-vertical w-75 ms-5" data-toggle="buttons">
                            <label class="p-2 border border-dark text-start w-100">
                                <input type="radio" name="options" id="option1" value="JRS - Express" <?php if (isset($_POST['options']) && $_POST['options']=="JRS - Express") echo "checked";?>> JRS - Express
                            </label>
                            <div class="error mb-2" style="color:red;">
                                <?php echo $errors['method']; ?>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col mx-3">
                    <!--display for cart checkout option-->
                    <?php
                        if(isset($_SESSION['cart_checkout_id'])){
                    ?>
                    <div class="displaytotal border border-dark mx-5">
                        <?php
                            include_once('../../include/database.php');
                            $database = new Connection();
                            $db = $database->open();
                            $checkout_id = $_SESSION['cart_checkout_id'];
                            $sum = 0;
                            try{
                                $sql = $db->prepare("SELECT c.product_name, c.quantity, c.subtotal, cu.img_path  FROM cart c JOIN cart_uploads cu 
                                                    WHERE c.id IN($checkout_id) AND c.id=cu.cart_id");
                                $sql->execute();
                                while($row=$sql->fetch(PDO::FETCH_ASSOC)){
                                    $sum += $row['subtotal'];
                        ?>
                        <div class="display-content-container mx-3 py-3">
                            <div class="display-content d-flex justify-content-between py-3">
                                <div class="d-flex">
                                    <div class="img-container me-3">
                                        <img src="<?php echo "../../".$row['img_path']; ?>" class="" alt="">
                                    </div>
                                    <p class="fs-3"><?php echo $row['product_name']; ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fs-3 me-5"><?php echo $row['quantity']; ?></p>
                                    <p class="fs-3 ms-5"><?php echo "₱".$row['subtotal']; ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                                }
                        ?>
                        <hr class="mx-3">
                        <div class="d-flex justify-content-between mx-4">
                            <p>Total</p>
                            <p><?php echo "₱".number_format($sum,2); ?></p>
                        </div>
                        <br>
                    </div>
                    <?php             
                            }
                            catch(PDOException $e){
                                $_SESSION['msg'] = $e->getMessage();
                            }
                        }
                        elseif(isset($_SESSION['buynow_id'])){
                    ?>
                    <!--display for buy now option-->
                    <div class="displaytotal border border-dark mx-5">
                        <div class="display-content-container mx-3 py-3">
                            <div class="display-content d-flex justify-content-between py-3">
                                <div class="d-flex">
                                    <div class="img-container me-3">
                                        <img src="<?php echo "../../".$_SESSION['img_path']; ?>" alt="">
                                    </div>
                                    <p class="fs-3"><?php echo $_SESSION['product_name']; ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fs-3 me-5"><?php echo $_SESSION['qty']; ?></p>
                                    <p class="fs-3 ms-5"><?php echo "₱".$_SESSION['subtotal']; ?></p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <hr class="mx-3">
                        <div class="d-flex justify-content-between mx-4">
                            <p>Total</p>
                            <p><?php echo "₱".$_SESSION['subtotal']; ?></p>
                        </div>
                        <br>
                    </div>
                    <?php
                         }
                    ?>
                    <br>
                    <div class="checkout d-grid mx-5">
                        <button type="submit" name="ship-btn" class="btn-pink btn-shadow btn btn-lg active py-2 border-0 fw-normal">CONTINUE TO PAYMENT</button>
                    </div>
                </div>
            </div>
        </form>

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
    <script>
        var ProvinceCityList = {
            "Abra Province": [
            "Bangued","Boliney","Bucay","Bucloc","Daguioman","Danglas","Dolores","La Paz","Lacub","Lagangilang","Lagayan",
            "Langiden","Licuan-Baay (Licuan)","Luba","Malibcong","Manabo","Peñarrubia","Pidigan","Pilar","Sallapadan",
            "San Isidro","San Juan","San Quintin","Tayum","Tineg","Tubo","Villaviciosa"
            ],
            "Agusan del Norte Province": [
            "Buenavista","Butuan","Cabadbaran","Carmen","Jabonga","Kitcharao","Las Nieves","Magallanes","Nasipit",
            "Remedios T. Romualdez","Santiago","Tubay"
            ],
            "Agusan del Sur Province": [
            "Bayugan","Bunawan","Esperanza","La Paz","Loreto","Prosperidad","Rosario","San Francisco","San Luis","Santa Josefa",
            "Sibagat","Talacogon","Trento","Veruela"
            ],
            "Aklan Province": ["Altavas", "Balete", "Banga", "Batan", "Buruanga", "Ibajay", "Kalibo", "Lezo", "Libacao", 
            "Madalag", "Makato", "Malay", "Malinao", "Nabas", "New Washington", "Numancia", "Tangalan"
            ],
            "Albay Province": ["Bacacay", "Camalig", "Daraga (Locsin)", "Guinobatan", "Jovellar", "Legazpi", "Libon", "Ligao", 
            "Malilipot", "Malinao", "Manito", "Oas", "Pio Duran", "Polangui", "Rapu-Rapu", "Santo Domingo", "Tabaco", "Tiwi"
            ],
            "Antique Province": ["Anini-y", "Barbaza", "Belison", "Bugasong", "Caluya", "Culasi", "Hamtic", "Laua-an", "Libertad",
            "Pandan", "Patnongon", "San Jose de Buenavista", "San Remigio", "Sebaste", "Sibalom", "Tibiao", 
            "Tobias Fornier (Dao)", "Valderrama"
            ],
            "Apayao Province": ["Calanasan", "Conner", "Flora", "Kabugao", "Luna", "Pudtol", "Santa Marcela"
            ],
            "Aurora Province": ["Baler", "Casiguran", "Dilasag", "Dinalungan", "Dingalan", "Dipaculao", "Maria Aurora", "San Luis"
            ],
            "Bataan Province": ["Abucay", "Bagac", "Balanga", "Dinalupihan", "Hermosa", "Limay", "Mariveles", "Morong", "Orani", 
            "Orion", "Pilar", "Samal"
            ],
            "Basilan Province": ["Akbar", "Al-Barka", "Hadji Mohammad Ajul", "Hadji Muhtamad", "Isabela City", "Lamitan", 
            "Lantawan", "Maluso", "Sumisip", "Tabuan-Lasa", "Tipo-Tipo", "Tuburan", "Ungkaya Pukan"
            ],
            "Batanes Province": ["Basco", "Itbayat", "Ivana", "Mahatao", "Sabtang", "Uyugan"
            ],
            "Batangas Province": ["Agoncillo", "Alitagtag", "Balayan", "Balete", "Batangas City", "Bauan", "Calaca", "Calatagan", 
            "Cuenca", "Ibaan", "Laurel", "Lemery", "Lian", "Lipa", "Lobo", "Mabini", "Malvar", "Mataasnakahoy", "Nasugbu", 
            "Padre Garcia", "Rosario", "San Jose", "San Juan", "San Luis", "San Nicolas", "San Pascual", "Santa Teresita", 
            "Santo Tomas", "Taal", "Talisay", "Tanauan", "Taysan", "Tingloy", "Tuy"
            ],
            "Benguet Province": ["Atok", "Baguio", "Bakun", "Bokod", "Buguias", "Itogon", "Kabayan", "Kapangan", "Kibungan", 
            "La Trinidad", "Mankayan", "Sablan", "Tuba", "Tublay"
            ],
            "Biliran Province": ["Almeria", "Biliran", "Cabucgayan", "Caibiran", "Culaba", "Kawayan", "Maripipi", "Naval"
            ],
            "Bohol Province": ["Alburquerque", "Alicia", "Anda", "Antequera", "Baclayon", "Balilihan", "Batuan", "Bien Unido", 
            "Bilar", "Buenavista", "Calape", "Candijay", "Carmen", "Catigbian", "Clarin", "Corella", "Cortes", "Dagohoy", 
            "Danao", "Dauis", "Dimiao", "Duero", "Garcia Hernandez", "Getafe", "Guindulman", "Inabanga", "Jagna", "Lila", 
            "Loay", "Loboc", "Loon", "Mabini", "Maribojoc", "Panglao", "Pilar", "President Carlos P. Garcia (Pitogo)", 
            "Sagbayan (Borja)", "San Isidro", "San Miguel", "Sevilla", "Sierra Bullones", "Sikatuna", "Tagbilaran", "Talibon", 
            "Trinidad", "Tubigon", "Ubay"
            ],
            "Bukidnon Province": ["Baungon", "Cabanglasan", "Damulog", "Dangcagan", "Don Carlos", "Impasugong", "Kadingilan", 
            "Kalilangan", "Kibawe", "Kitaotao", "Lantapan", "Libona", "Malaybalay", "Malitbog", "Manolo Fortich", "Maramag", 
            "Pangantucan", "Quezon", "San Fernando", "Sumilao", "Talakag", "Valencia"
            ],
            "Bulacan Province": ["Angat", "Balagtas (Bigaa)", "Baliuag", "Bocaue", "Bulakan", "Bustos", "Calumpit", 
            "Doña Remedios Trinidad", "Guiguinto", "Hagonoy", "Malolos", "Marilao", "Meycauayan", "Norzagaray", "Obando", 
            "Pandi", "Paombong", "Plaridel", "Pulilan", "San Ildefonso", "San Jose del Monte", "San Miguel", "San Rafael", 
            "Santa Maria"
            ],
            "Cagayan Province": ["Abulug", "Alcala", "Allacapan", "Amulung", "Aparri", "Baggao", "Ballesteros", "Buguey", 
            "Calayan", "Camalaniugan", "Claveria", "Enrile", "Gattaran", "Gonzaga", "Iguig", "Lal-lo", "Lasam", "Pamplona", 
            "Peñablanca", "Piat", "Rizal", "Sanchez-Mira", "Santa Ana", "Santa Praxedes", "Santa Teresita", "Santo Niño (Faire)", 
            "Solana", "Tuao", "Tuguegarao"
            ],
            "Camarines Norte Province": ["Basud", "Capalonga", "Daet", "Jose Panganiban", "Labo", "Mercedes", "Paracale", 
            "San Lorenzo Ruiz (Imelda)", "San Vicente", "Santa Elena", "Talisay", "Vinzons"
            ],
            "Camarines Sur Province": ["Baao", "Balatan", "Bato", "Bombon", "Buhi", "Bula", "Cabusao", "Calabanga", "Camaligan", 
            "Canaman", "Caramoan", "Del Gallego", "Gainza", "Garchitorena", "Goa", "Iriga", "Lagonoy", "Libmanan", "Lupi", 
            "Magarao", "Milaor", "Minalabac", "Nabua", "Naga", "Ocampo", "Pamplona", "Pasacao", "Pili", "Presentación (Parubcan)",
            "Ragay", "Sagñay", "San Fernando", "San Jose", "Sipocot", "Siruma", "Tigaon", "Tinambac"
            ],
            "Camiguin Province": ["Catarman", "Guinsiliban", "Mahinog", "Mambajao", "Sagay"
            ],
            "Capiz Province": ["Cuartero", "Dao", "Dumalag", "Dumarao", "Ivisan", "Jamindan", "Ma-ayon", "Mambusao", "Panay", 
            "Panitan", "Pilar", "Pontevedra", "President Roxas", "Roxas City", "Sapian", "Sigma", "Tapaz"
            ],
            "Catanduanes Province": ["Bagamanoc", "Baras", "Bato", "Caramoran", "Gigmoto", "Pandan", "Panganiban (Payo)", 
            "San Andres (Calolbon)", "San Miguel", "Viga", "Virac"
            ],
            "Cavite Province": ["Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite City", "Dasmariñas", "General Emilio Aguinaldo",
            "General Mariano Alvarez", "General Trias", "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", 
            "Mendez (Mendez-Nuñez)", "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay", "Tanza", "Ternate", "Trece Martires"
            ],
            "Cebu Province": ["Alcantara", "Alcoy", "Alegria", "Aloguinsan", "Argao", "Asturias", "Badian", "Balamban", 
            "Bantayan", "Barili", "Bogo", "Boljoon", "Borbon", "Carcar", "Carmen", "Catmon", "Cebu City", "Compostela", 
            "Consolacion", "Cordova", "Daanbantayan", "Dalaguete", "Danao", "Dumanjug", "Ginatilan", "Lapu-Lapu (Opon)", 
            "Liloan", "Madridejos", "Malabuyoc", "Mandaue", "Medellin", "Minglanilla", "Moalboal", "Naga", "Oslob", "Pilar", 
            "Pinamungajan", "Poro", "Ronda", "Samboan", "San Fernando", "San Francisco", "San Remigio", "Santa Fe", "Santander", 
            "Sibonga", "Sogod", "Tabogon", "Tabuelan", "Talisay", "Toledo", "Tuburan", "Tudela"
            ],
            "Cotabato Province": ["Alamada", "Aleosan", "Antipas", "Arakan", "Banisilan", "Carmen", "Kabacan", "Kidapawan", 
            "Libungan", "M’lang", "Magpet", "Makilala", "Matalam", "Midsayap", "Pigcawayan", "Pikit", "President Roxas", "Tulunan"
            ],
            "Davao de Oro Province": ["Compostela", "Laak (San Vicente)", "Mabini (Doña Alicia)", "Maco", 
            "Maragusan (San Mariano)", "Mawab", "Monkayo", "Montevista", "Nabunturan", "New Bataan", "Pantukan"
            ],
            "Davao del Norte Province": ["Asuncion (Saug)", "Braulio E. Dujali", "Carmen", "Kapalong", "New Corella", "Panabo", 
            "Samal", "San Isidro", "Santo Tomas", "Tagum", "Talaingod"
            ],
            "Davao del Sur Province": ["Bansalan", "Davao City", "Digos", "Hagonoy", "Kiblawan", "Magsaysay", "Malalag", 
            "Matanao", "Padada", "Santa Cruz", "Sulop"
            ],
            "Davao Occidental Province": ["Don Marcelino", "Jose Abad Santos (Trinidad)", "Malita", "Santa Maria", "Sarangani"
            ],
            "Davao Oriental Province": ["Baganga", "Banaybanay", "Boston", "Caraga", "Cateel", "Governor Generoso", "Lupon", 
            "Manay", "Mati", "San Isidro", "Tarragona"
            ],
            "Dinagat Islands Province": ["Basilisa (Rizal)", "Cagdianao", "Dinagat", "Libjo (Albor)", "Loreto", "San Jose", 
            "Tubajon"
            ],
            "Eastern Samar Province": ["Arteche", "Balangiga", "Balangkayan", "Borongan", "Can-avid", "Dolores", 
            "General MacArthur", "Giporlos", "Guiuan", "Hernani", "Jipapad", "Lawaan", "Llorente", "Maslog", "Maydolong", 
            "Mercedes", "Oras", "Quinapondan", "Salcedo", "San Julian", "San Policarpo", "Sulat", "Taft"
            ],
            "Guimaras Province": ["Buenavista", "Jordan", "Nueva Valencia", "San Lorenzo", "Sibunag"
            ],
            "Ifugao Province": ["Aguinaldo", "Alfonso Lista (Potia)", "Asipulo", "Banaue", "Hingyon", "Hungduan", "Kiangan", 
            "Lagawe", "Lamut", "Mayoyao", "Tinoc"
            ],
            "Ilocos Norte Province": ["Adams", "Bacarra", "Badoc", "Bangui", "Banna (Espiritu)", "Batac", "Burgos", "Carasi", 
            "Currimao", "Dingras", "Dumalneg", "Laoag", "Marcos", "Nueva Era", "Pagudpud", "Paoay", "Pasuquin", "Piddig", 
            "Pinili", "San Nicolas", "Sarrat", "Solsona", "Vintar"
            ],
            "Ilocos Sur Province": ["Alilem", "Banayoyo", "Bantay", "Burgos", "Cabugao", "Candon", "Caoayan", "Cervantes", 
            "Galimuyod", "Gregorio del Pilar (Concepcion)", "Lidlidda", "Magsingal", "Nagbukel", "Narvacan", "Quirino (Angkaki)", 
            "Salcedo (Baugen)", "San Emilio", "San Esteban", "San Ildefonso", "San Juan (Lapog)", "San Vicente", "Santa", 
            "Santa Catalina", "Santa Cruz", "Santa Lucia", "Santa Maria", "Santiago", "Santo Domingo", "Sigay", "Sinait", 
            "Sugpon", "Suyo", "Tagudin", "Vigan"
            ],
            "Iloilo Province": ["Ajuy", "Alimodian", "Anilao", "Badiangan", "Balasan", "Banate", "Barotac Nuevo", "Barotac Viejo",
            "Batad", "Bingawan", "Cabatuan", "Calinog", "Carles", "Concepcion", "Dingle", "Dueñas", "Dumangas", "Estancia", 
            "Guimbal", "Igbaras", "Iloilo City", "Janiuay", "Lambunao", "Leganes", "Lemery", "Leon", "Maasin", "Miagao", "Mina", 
            "New Lucena", "Oton", "Passi", "Pavia", "Pototan", "San Dionisio", "San Enrique", "San Joaquin", "San Miguel", 
            "San Rafael", "Santa Barbara", "Sara", "Tigbauan", "Tubungan", "Zarraga"
            ],
            "Isabela Province": ["Alicia", "Angadanan", "Aurora", "Benito Soliven", "Burgos", "Cabagan", "Cabatuan", "Cauayan", 
            "Cordon", "Delfin Albano (Magsaysay)", "Dinapigue", "Divilacan", "Echague", "Gamu", "Ilagan", "Jones", "Luna", 
            "Maconacon", "Mallig", "Naguilian", "Palanan", "Quezon", "Quirino", "Ramon", "Reina Mercedes", "Roxas", "San Agustin",
            "San Guillermo", "San Isidro", "San Manuel (Callang)", "San Mariano", "San Mateo", "San Pablo", "Santa Maria", 
            "Santiago", "Santo Tomas", "Tumauini"
            ],
            "Kalinga Province": ["Balbalan", "Lubuagan", "Pasil", "Pinukpuk", "Rizal (Liwan)", "Tabuk", "Tanudan", "Tinglayan"
            ],
            "La Union Province": ["Agoo", "Aringay", "Bacnotan", "Bagulin", "Balaoan", "Bangar", "Bauang", "Burgos", "Caba", 
            "Luna", "Naguilian", "Pugo", "Rosario", "San Fernando", "San Gabriel", "San Juan", "Santo Tomas", "Santol", 
            "Sudipen", "Tubao"
            ],
            "Laguna Province": ["Alaminos", "Bay", "Biñan", "Cabuyao", "Calamba", "Calauan", "Cavinti", "Famy", "Kalayaan", 
            "Liliw", "Los Baños", "Luisiana", "Lumban", "Mabitac", "Magdalena", "Majayjay", "Nagcarlan", "Paete", "Pagsanjan", 
            "Pakil", "Pangil", "Pila", "Rizal", "San Pablo", "San Pedro", "Santa Cruz", "Santa Maria", "Santa Rosa", "Siniloan", 
            "Victoria"
            ],
            "Lanao del Norte Province": ["Bacolod", "Baloi", "Baroy", "Iligan", "Kapatagan", "Kauswagan", "Kolambugan", "Lala", 
            "Linamon", "Magsaysay", "Maigo", "Matungao", "Munai", "Nunungan", "Pantao Ragat", "Pantar", "Poona Piagapo", 
            "Salvador", "Sapad", "Sultan Naga Dimaporo (Karomatan)", "Tagoloan", "Tangcal", "Tubod"
            ],
            "Lanao del Sur Province": ["Amai Manabilang (Bumbaran)", "Bacolod-Kalawi (Bacolod-Grande)", "Balabagan", 
            "Balindong (Watu)", "Bayang", "Binidayan", "Buadiposo-Buntong", "Bubong", "Butig", "Calanogas", "Ditsaan-Ramain", 
            "Ganassi", "Kapai", "Kapatagan", "Lumba-Bayabao (Maguing)", "Lumbaca-Unayan", "Lumbatan", "Lumbayanague", "Madalum", 
            "Madamba", "Maguing", "Malabang", "Marantao", "Marawi", "Marogong", "Masiu", "Mulondo", "Pagayawan (Tatarikan)", 
            "Piagapo", "Picong (Sultan Gumander)", "Poona Bayabao (Gata)", "Pualas", "Saguiaran", "Sultan Dumalondong", 
            "Tagoloan II", "Tamparan", "Taraka", "Tubaran", "Tugaya", "Wao"
            ],
            "Leyte Province": ["Abuyog", "Alangalang", "Albuera", "Babatngon", "Barugo", "Bato", "Baybay", "Burauen", "Calubian", 
            "Capoocan", "Carigara", "Dagami", "Dulag", "Hilongos", "Hindang", "Inopacan", "Isabel", "Jaro", "Javier (Bugho)", 
            "Julita", "Kananga", "La Paz", "Leyte", "MacArthur", "Mahaplag", "Matag-ob", "Matalom", "Mayorga", "Merida", "Ormoc", 
            "Palo", "Palompon", "Pastrana", "San Isidro", "San Miguel", "Santa Fe", "Tabango", "Tabontabon", "Tacloban", 
            "Tanauan", "Tolosa", "Tunga", "Villaba"
            ],
            "Maguindanao Province": ["Ampatuan", "Barira", "Buldon", "Buluan", "Cotabato City", "Datu Abdullah Sangki", 
            "Datu Anggal Midtimbang", "Datu Blah T. Sinsuat", "Datu Hoffer Ampatuan", "Datu Montawal (Pagagawan)", 
            "Datu Odin Sinsuat (Dinaig)", "Datu Paglas", "Datu Piang (Dulawan)", "Datu Salibo", "Datu Saudi-Ampatuan", 
            "Datu Unsay", "General Salipada K. Pendatun", "Guindulungan", "Kabuntalan (Tumbao)", "Mamasapano", "Mangudadatu", 
            "Matanog", "Northern Kabuntalan", "Pagalungan", "Paglat", "Pandag", "Parang", "Rajah Buayan", 
            "Shariff Aguak (Maganoy)", "Shariff Saydona Mustapha", "South Upi", "Sultan Kudarat (Nuling)", "Sultan Mastura", 
            "Sultan sa Barongis (Lambayong)", "Sultan Sumagka (Talitay)", "Talayan", "Upi"
            ],
            "Marinduque Province": ["Boac", "Buenavista", "Gasan", "Mogpog", "Santa Cruz", "Torrijos"
            ],
            "Masbate Province": ["Aroroy", "Baleno", "Balud", "Batuan", "Cataingan", "Cawayan", "Claveria", "Dimasalang", 
            "Esperanza", "Mandaon", "Masbate City", "Milagros", "Mobo", "Monreal", "Palanas", "Pio V. Corpuz (Limbuhan)", 
            "Placer", "San Fernando", "San Jacinto", "San Pascual", "Uson"
            ],
            "Misamis Occidental Province": ["Aloran", "Baliangao", "Bonifacio", "Calamba", "Clarin", "Concepcion", 
            "Don Victoriano Chiongbian (Don Mariano Marcos)", "Jimenez", "Lopez Jaena", "Oroquieta", "Ozamiz", "Panaon", 
            "Plaridel", "Sapang Dalaga", "Sinacaban", "Tangub", "Tudela"
            ],
            "Misamis Oriental Province": ["Alubijid", "Balingasag", "Balingoan", "Binuangan", "Cagayan de Oro", "Claveria", 
            "El Salvador", "Gingoog", "Gitagum", "Initao", "Jasaan", "Kinoguitan", "Lagonglong", "Laguindingan", "Libertad", 
            "Lugait", "Magsaysay (Linugos)", "Manticao", "Medina", "Naawan", "Opol", "Salay", "Sugbongcogon", "Tagoloan", 
            "Talisayan", "Villanueva"
            ],
            "Mountain Province": ["Barlig", "Bauko", "Besao", "Bontoc", "Natonin", "Paracelis", "Sabangan", "Sadanga", "Sagada", 
            "Tadian"
            ],
            "NCR, 2nd District Province": ["Mandaluyong", "Marikina", "Pasig", "Quezon City", "San Juan"
            ],
            "NCR, 3rd District Province": ["Caloocan", "Malabon", "Navotas", "Valenzuela"
            ],
            "NCR, 4th District Province": ["Las Piñas", "Makati", "Muntinlupa", "Parañaque", "Pasay", "Pateros", "Taguig"
            ],
            "NCR, City of Manila, 1st District Province": ["Manila"
            ],
            "Negros Occidental Province": ["Bacolod", "Bago", "Binalbagan", "Cadiz", "Calatrava", "Candoni", "Cauayan", 
            "Enrique B. Magalona (Saravia)", "Escalante", "Himamaylan", "Hinigaran", "Hinoba-an (Asia)", "Ilog", "Isabela", 
            "Kabankalan", "La Carlota", "La Castellana", "Manapla", "Moises Padilla (Magallon)", "Murcia", "Pontevedra", 
            "Pulupandan", "Sagay", "Salvador Benedicto", "San Carlos", "San Enrique", "Silay", "Sipalay", "Talisay", "Toboso", 
            "Valladolid", "Victorias"
            ],
            "Negros Oriental Province": ["Amlan (Ayuquitan)", "Ayungon", "Bacong", "Bais", "Basay", "Bayawan (Tulong)", 
            "Bindoy (Payabon)", "Canlaon", "Dauin", "Dumaguete", "Guihulngan", "Jimalalud", "La Libertad", "Mabinay", 
            "Manjuyod", "Pamplona", "San Jose", "Santa Catalina", "Siaton", "Sibulan", "Tanjay", "Tayasan", 
            "Valencia (Luzurriaga)", "Vallehermoso", "Zamboanguita"
            ],
            "Northern Samar Province": ["Allen", "Biri", "Bobon", "Capul", "Catarman", "Catubig", "Gamay", "Laoang", "Lapinig", 
            "Las Navas", "Lavezares", "Lope de Vega", "Mapanas", "Mondragon", "Palapag", "Pambujan", "Rosario", "San Antonio", 
            "San Isidro", "San Jose", "San Roque", "San Vicente", "Silvino Lobos", "Victoria"
            ],
            "Nueva Ecija Province": ["Aliaga", "Bongabon", "Cabanatuan", "Cabiao", "Carranglan", "Cuyapo", 
            "Gabaldon (Bitulok & Sabani)", "Gapan", "General Mamerto Natividad", "General Tinio (Papaya)", "Guimba", "Jaen", 
            "Laur", "Licab", "Llanera", "Lupao", "Muñoz", "Nampicuan", "Palayan", "Pantabangan", "Peñaranda", "Quezon", "Rizal", 
            "San Antonio", "San Isidro", "San Jose", "San Leonardo", "Santa Rosa", "Santo Domingo", "Talavera", "Talugtug", 
            "Zaragoza"
            ],
            "Nueva Vizcaya Province": ["Alfonso Castañeda", "Ambaguio", "Aritao", "Bagabag", "Bambang", "Bayombong", "Diadi", 
            "Dupax del Norte", "Dupax del Sur", "Kasibu", "Kayapa", "Quezon", "Santa Fe (Imugan)", "Solano", "Villaverde (Ibung)"
            ],
            "Occidental Mindoro Province": ["Abra de Ilog", "Calintaan", "Looc", "Lubang", "Magsaysay", "Mamburao", "Paluan", 
            "Rizal", "Sablayan", "San Jose", "Santa Cruz"
            ],
            "Palawan Province": ["Aborlan", "Agutaya", "Araceli", "Balabac", "Bataraza", "Brooke’s Point", "Busuanga", 
            "Cagayancillo", "Coron", "Culion", "Cuyo", "Dumaran", "El Nido (Bacuit)", "Kalayaan", "Linapacan", "Magsaysay", 
            "Narra", "Puerto Princesa", "Quezon", "Rizal (Marcos)", "Roxas", "San Vicente", "Sofronio Española", "Taytay"
            ],
            "Pampanga Province": ["Angeles", "Apalit", "Arayat", "Bacolor", "Candaba", "Floridablanca", "Guagua", "Lubao", 
            "Mabalacat", "Macabebe", "Magalang", "Masantol", "Mexico", "Minalin", "Porac", "San Fernando", "San Luis", 
            "San Simon", "Santa Ana", "Santa Rita", "Santo Tomas", "Sasmuan"
            ],
            "Pangasinan Province": ["Agno", "Aguilar", "Alaminos", "Alcala", "Anda", "Asingan", "Balungao", "Bani", "Basista", 
            "Bautista", "Bayambang", "Binalonan", "Binmaley", "Bolinao", "Bugallon", "Burgos", "Calasiao", "Dagupan", "Dasol", 
            "Infanta", "Labrador", "Laoac", "Lingayen", "Mabini", "Malasiqui", "Manaoag", "Mangaldan", "Mangatarem", "Mapandan", 
            "Natividad", "Pozorrubio", "Rosales", "San Carlos", "San Fabian", "San Jacinto", "San Manuel", "San Nicolas", 
            "San Quintin", "Santa Barbara", "Santa Maria", "Santo Tomas", "Sison", "Sual", "Tayug", "Umingan", "Urbiztondo", 
            "Urdaneta", "Villasis"
            ],
            "Quezon Province": ["Agdangan", "Alabat", "Atimonan", "Buenavista", "Burdeos", "Calauag", "Candelaria", "Catanauan", 
            "Dolores", "General Luna", "General Nakar", "Guinayangan", "Gumaca", "Infanta", "Jomalig", "Lopez", "Lucban", 
            "Lucena", "Macalelon", "Mauban", "Mulanay", "Padre Burgos", "Pagbilao", "Panukulan", "Patnanungan", "Perez", 
            "Pitogo", "Plaridel", "Polillo", "Quezon", "Real", "Sampaloc", "San Andres", "San Antonio", "San Francisco (Aurora)", 
            "San Narciso", "Sariaya", "Tagkawayan", "Tayabas", "Tiaong", "Unisan"
            ],
            "Quirino Province": ["Aglipay", "Cabarroguis", "Diffun", "Maddela", "Nagtipunan", "Saguday"
            ],
            "Rizal Province": ["Angono", "Antipolo", "Baras", "Binangonan", "Cainta", "Cardona", "Jalajala", "Morong", "Pililla", 
            "Rodriguez (Montalban)", "San Mateo", "Tanay", "Taytay", "Teresa"
            ],
            "Romblon Province": ["Alcantara", "Banton (Jones)", "Cajidiocan", "Calatrava", "Concepcion", "Corcuera", "Ferrol", 
            "Looc", "Magdiwang", "Odiongan", "Romblon", "San Agustin", "San Andres", "San Fernando", "San Jose", "Santa Fe", 
            "Santa Maria (Imelda)"
            ],
            "Samar Province": ["Almagro", "Basey", "Calbayog", "Calbiga", "Catbalogan", "Daram", "Gandara", "Hinabangan", 
            "Jiabong", "Marabut", "Matuguinao", "Motiong", "Pagsanghan", "Paranas (Wright)", "Pinabacdao", "San Jorge", 
            "San Jose de Buan", "San Sebastian", "Santa Margarita", "Santa Rita", "Santo Niño", "Tagapul-an", "Talalora", 
            "Tarangnan", "Villareal", "Zumarraga"
            ],
            "Sarangani Province": ["Alabel", "Glan", "Kiamba", "Maasim", "Maitum", "Malapatan", 
            "Malungon"
            ],
            "Siquijor Province": ["Enrique Villanueva", "Larena", "Lazi", "Maria", "San Juan", "Siquijor", "Sorsogon Province"
            ],
            "South Cotabato Province": ["Banga", "General Santos (Dadiangas)", "Koronadal", "Lake Sebu", "Norala", "Polomolok", 
            "Santo Niño", "Surallah", "T’Boli", "Tampakan", "Tantangan", "Tupi"
            ],
            "Southern Leyte Province": ["Anahawan", "Bontoc", "Hinunangan", "Hinundayan", "Libagon", "Liloan", 
            "Limasawa", "Maasin", "Macrohon", "Malitbog", "Padre Burgos", "Pintuyan", "Saint Bernard", "San Francisco", 
            "San Juan (Cabalian)", "San Ricardo", "Silago", "Sogod", "Tomas Oppus"
            ],
            "Sultan Kudarat Province": ["Bagumbayan", "Columbio", "Esperanza", "Isulan", "Kalamansig", 
            "Lambayong (Mariano Marcos)", "Lebak", "Lutayan", "Palimbang", "President Quirino", "Senator Ninoy Aquino", "Tacurong"
            ],
            "Sulu Province": ["Banguingui (Tongkil)", "Hadji Panglima Tahil (Marunggas)", "Indanan", "Jolo", 
            "Kalingalan Caluang", "Lugus", "Luuk", "Maimbung", "Old Panamao", "Omar", "Pandami", "Panglima Estino (New Panamao)", 
            "Pangutaran", "Parang", "Pata", "Patikul", "Siasi", "Talipao", "Tapul"
            ],
            "Surigao del Norte Province": ["Alegria", "Bacuag", "Burgos", "Claver", "Dapa", "Del Carmen", "General Luna", 
            "Gigaquit", "Mainit", "Malimono", "Pilar", "Placer", "San Benito", "San Francisco (Anao-Aon)", "San Isidro", 
            "Santa Monica (Sapao)", "Sison", "Socorro", "Surigao City", "Tagana-an", "Tubod"
            ],
            "Surigao del Sur Province": ["Barobo", "Bayabas", "Bislig", "Cagwait", "Cantilan", "Carmen", "Carrascal", "Cortes", 
            "Hinatuan", "Lanuza", "Lianga", "Lingig", "Madrid", "Marihatag", "San Agustin", "San Miguel", "Tagbina", "Tago", 
            "Tandag"
            ],
            "Tarlac Province": ["Anao", "Bamban", "Camiling", "Capas", "Concepcion", "Gerona", "La Paz", "Mayantoc", "Moncada", 
            "Paniqui", "Pura", "Ramos", "San Clemente", "San Jose", "San Manuel", "Santa Ignacia", "Tarlac City", "Victoria"
            ],
            "Tawi-Tawi Province": ["Bongao", "Languyan", "Mapun (Cagayan de Tawi-Tawi)", "Panglima Sugala (Balimbing)", 
            "Sapa-Sapa", "Sibutu", "Simunul", "Sitangkai", "South Ubian", "Tandubas", "Turtle Islands (Taganak)"
            ],
            "Zambales Province": ["Botolan", "Cabangan", "Candelaria", "Castillejos", "Iba", "Masinloc", "Olongapo", "Palauig", 
            "San Antonio", "San Felipe", "San Marcelino", "San Narciso", "Santa Cruz", "Subic"
            ],
            "Zamboanga del Norte Province": ["Baliguian", "Dapitan", "Dipolog", "Godod", "Gutalac", "Jose Dalman (Ponot)", 
            "Kalawit", "Katipunan", "La Libertad", "Labason", "Leon B. Postigo (Bacungan)", "Liloy", "Manukan", "Mutia", 
            "Piñan (New Piñan)", "Polanco", "President Manuel A. Roxas", "Rizal", "Salug", "Sergio Osmeña Sr.", "Siayan", 
            "Sibuco", "Sibutad", "Sindangan", "Siocon", "Sirawai", "Tampilisan"
            ],
            "Zamboanga del Sur Province": ["Aurora", "Bayog", "Dimataling", "Dinas", "Dumalinao", "Dumingag", "Guipos", 
            "Josefina", "Kumalarang", "Labangan", "Lakewood", "Lapuyan", "Mahayag", "Margosatubig", "Midsalip", "Molave", 
            "Pagadian", "Pitogo", "Ramon Magsaysay (Liargo)", "San Miguel", "San Pablo", "Sominot (Don Mariano Marcos)", 
            "Tabina", "Tambulig", "Tigbao", "Tukuran", "Vincenzo A. Sagun", "Zamboanga City"
            ],
            "Zamboanga Sibugay Province": ["Alicia", "Buug", "Diplahan", "Imelda", "Ipil", "Kabasalan", "Mabuhay", "Malangas", 
            "Naga", "Olutanga", "Payao", "Roseller Lim", "Siay", "Talusan", "Titay", "Tunga"
            ]
        }

        window.onload = function(){
            const selectProvince = document.getElementById('province'),
                selectCity = document.getElementById('city'),
                selects = document.querySelectorAll('select')

                selectCity.disabled = true

                selects.forEach(select => {
                    if(select.disabled == true){
                        select.style.cursor = "auto"
                    }
                    else{
                        select.style.cursor = "pointer"
                    }
                })

                for(let province in ProvinceCityList){
                    selectProvince.options[selectProvince.options.length] = new Option(province, province)
                }
                // province change
                selectProvince.onchange = (e) =>{
                    
                    selectCity.disabled = false

                    selects.forEach(select => {
                        if(select.disabled == true){
                            select.style.cursor = "auto"
                        }
                        else{
                            select.style.cursor = "pointer"
                        }
                    })

                    selectCity.length = 1

                    let cities = ProvinceCityList[e.target.value]
                    
                    for(let i=0; i<cities.length; i++){
                        selectCity.options[selectCity.options.length] = new Option(cities[i], cities[i])
                    }
                }
        }
    </script>
</body>
</html>
