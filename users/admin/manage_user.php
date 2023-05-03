<?php 
    session_start();
    include('process/manage_user_process.php');
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
                    <a class="nav-link" href="../../logout.php">log out</a>
            </li>
        </ul>
    </nav>

    <!--header-->
    <header>
        <div class="row d-print-none">
            <div class="col">
                <div class="header-logo">
                    <a href="dashboard.php"><img src="../../assets/images/header-logo1.png" alt=""></a>
                </div>
            </div>
        </div>
    </header>

    <!--content-->
    <div class="container-fluid admin p-0">
        <div class="row gx-3 py-3 px-4" style="min-height: 800px;">
            <div class="col-3 sidebar p-0 me-3">
                <p class="text-center fw-bold fs-2 mt-2">ADMIN</p>
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
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="admin-product.php">
                        <span class="iconify fs-2 me-2" data-icon="bytesize:cart"></span>Product
                    </a>                         
                </div>
                <hr>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fw-bold fs-3 ms-2 mb-1 w-100" href="manage_user.php">
                        <span class="iconify fs-1 mb-2 me-1" data-icon="ant-design:user-add-outlined"></span>Manage User
                    </a>
                </div>
            </div>
            <div class="col right">
                <p class="text-center fs-2 fw-bold mb-5 mt-5 mx-4">ADD NEW USER</p>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="row ms-3 mb-3">
                                <div class="col-sm-3">
                                    <label for="name" class="col-form-label">First Name</label>
                                </div>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <div class="row w-100">
                                        <div class="col">
                                            <input type="text" name="table_id" id="table_id" hidden>
                                            <input type="text" class="form-control border-dark shadow-none rounded-0" 
                                                    name="fname" id="fname" value="<?php echo $var['fname']; ?>">
                                            <div class="error mb-2">
                                                <?php echo $errors['fname']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 mb-3">
                                <div class="col-sm-3">
                                    <label for="name" class="col-form-label">Last Name</label>
                                </div>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <div class="row w-100">
                                        <div class="col">
                                            <input type="text" class="form-control border-dark shadow-none rounded-0" 
                                                    name="lname" id="lname" value="<?php echo $var['lname']; ?>">
                                            <div class="error mb-2">
                                                <?php echo $errors['lname']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 mb-3">
                                <div class="col-sm-3">
                                    <label for="username" class="col-form-label">Username</label>
                                </div>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <div class="row w-100">
                                        <div class="col">
                                            <input type="text" class="form-control border-dark shadow-none rounded-0" 
                                                    name="username" id="username" value="<?php echo $var['username']; ?>">
                                            <div class="error mb-2">
                                                <?php echo $errors['username']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 mb-3">
                                <div class="col-sm-3">
                                    <label for="name" class="col-form-label">Password</label>
                                </div>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <div class="row w-100">
                                        <div class="col">
                                            <input type="password" class="form-control border-dark shadow-none rounded-0" 
                                                name="password" id="password" value="<?php echo $var['password']; ?>">
                                            <div class="error mb-2">
                                                <?php echo $errors['password']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 mb-3">
                                <div class="col-sm-3">
                                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                                </div>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <div class="row w-100">
                                        <div class="col">
                                            <select name="role" id="role" class="w-100 py-2 rounded-0">
                                                <option value="" selected disabled hidden></option>
                                                <option <?php if(isset($_POST['role']) and $_POST['role'] == "admin") echo "selected"; ?>>admin</option>
                                                <option <?php if(isset($_POST['role']) and $_POST['role'] == "staff") echo "selected"; ?>>staff</option>
                                            </select>
                                            <div class="error mb-2">
                                                <?php echo $errors['role']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid col-3">
                                <button type="submit" name="save"  class="fs-4 mb-3 border border-dark btn-pink btn-shadow">SAVE</button>
                                <button type="submit" name="delete"  class="fs-4 mb-3 border border-dark btn-pink btn-shadow">DELETE</button>
                                <button type="button" name="clear" id="clear"  class="fs-4 mb-3 border border-dark btn-pink btn-shadow">CLEAR</button>
                            </div>
                        </div>
                    </div>
                <p class="fs-2 fw-bold my-3 mx-4">List of Users</p>
                <div class="table-responsive-xl mx-4 mb-4">
                    <table id="admin-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="fs-4 fw-normal col-2">ID</th>
                                <th scope="col" class="fs-4 fw-normal">First Name</th>
                                <th scope="col" class="fs-4 fw-normal">Last Name</th>
                                <th scope="col" class="fs-4 fw-normal">Username</th>
                                <th scope="col" class="fs-4 fw-normal col-2">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once('../../include/database.php');
                                $database = new Connection();
                                $db = $database->open();
                                //query to display all admin and staff
                                $sql = $db->prepare("SELECT id, first_name, last_name, username, role FROM user WHERE (role='admin' OR role='staff') AND id!=:id ORDER BY role");
                                //bind param
                                $sql->bindParam(':id', $_SESSION['admin_id']);
                                $sql->execute();
                                $data=$sql->fetchAll();
                                foreach($data as $row) {  
                            ?>
                            <tr>
                                <td id="table-id"><?php echo $row['id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                
                            </tr>
                            <?php
                                }
                                //close connection
                                $database->close();
                            ?>
                        </tbody>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="row d-print-none">
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

    <script src="../../assets/javascript/index.js"></script>                  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var table = document.getElementById('admin-table');
        for (var i = 0; i < table.rows.length; i++){
            table.rows[i].onclick = function (){
                document.querySelector('#table_id').value = this.cells[0].innerHTML;
                document.querySelector('#fname').value = this.cells[1].innerHTML;
                document.querySelector('#lname').value = this.cells[2].innerHTML;
                document.querySelector('#username').value = this.cells[3].innerHTML;
                document.querySelector('#role').value = this.cells[4].innerHTML;
            };
        }

        const clearbtn = document.getElementById('clear');
        clearbtn.onclick = function (){
            document.querySelector('#table_id').value = "";
            document.querySelector('#fname').value = "";
            document.querySelector('#lname').value = "";
            document.querySelector('#username').value = "";
            document.querySelector('#password').value = "";
            document.querySelector('#role').value = "";
        }
    </script>
</body>
</html>