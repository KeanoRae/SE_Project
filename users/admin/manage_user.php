<?php 
    session_start();
    include('../../include/header.php');
    include('../../include/navbar.php');
    include('process/manage_user_process.php');
?>
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
                                            name="password" value="<?php echo $var['password']; ?>">
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
                            <button type="submit" name="update"  class="fs-4 mb-3 border border-dark btn-pink btn-shadow">UPDATE</button>
                            <button type="submit" name="delete"  class="fs-4 mb-3 border border-dark btn-pink btn-shadow">DELETE</button>
                        </div>
                    </div>
                </div>
            <p class="fs-2 fw-bold my-3 mx-4">List of Users</p>
            <div class="table-responsive mx-4 mb-4">
                <table id="user-table" class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="fs-4 fw-normal col-2">ID</th>
                            <th scope="col" class="fs-4 fw-normal">name</th>
                            <th scope="col" class="fs-4 fw-normal">username</th>
                            <th scope="col" class="fs-4 fw-normal col-2">role</th>
                            <th>button</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('../../include/database.php');
                            $database = new Connection();
                            $db = $database->open();
                            //query to display all admin and staff
                            $sql = $db->prepare("SELECT id, CONCAT(first_name,' ',last_name) AS name, username, role FROM user WHERE (role='admin' OR role='staff') AND id!=:id ORDER BY role");
                            //bind param
                            $sql->bindParam(':id', $_SESSION['admin_id']);
                            $sql->execute();
                            $data=$sql->fetchAll();
                            foreach($data as $row) {  
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><a href="manage_user_process.php?table_id=<?php echo $row['id']; ?>">submitzz</a></td>
                            
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
<script src="../../assets/javascript/index.js"></script>

<?php include('../../include/footer.php'); ?>