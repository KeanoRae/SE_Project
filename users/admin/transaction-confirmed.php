<?php 
    session_start();
    //echo 'user type = '.$_SESSION['user_type'];
    include('../../include/header.php');
    include('../../include/navbar.php');
    include('sidebar.php');
?>

        <div class="col right">
            <p class="fs-2 fw-bold mb-4 mt-5 mx-5">TRANSACTION</p>
            <div class="mx-3 mb-4">
            <div id="title" class="title d-flex justify-content-between mx-2 py-2 px-3 border-bottom">
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 head" href="transaction-pending.php">pending</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 head headtag" href="#">confirmed</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 head" href="">cancelled</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 head" href="">to ship</a>
                    <a class="text-reset text-decoration-none fst-normal h4 mb-0 head" href="">completed</a>
                </div>
            </div>
            <div class="row m-4">
                <div class="button-group d-flex align-items-center">
                    <div>
                        <select class="form-select shadow-none border-dark border-end-0 rounded-0 py-1" name="sort" aria-label="Floating label select example">
                            <option selected>Order ID</option>
                            <option value="buyername">Buyer name</option>
                            <option value="product">Product</option>
                        </select>
                    </div>
                    <div class="d-flex me-3">
                        <input type="search" class="ps-2 py-1 border border-dark border-end-0" placeholder="search">
                        <button type="button" class="border border-dark border-start-0"><span><i class="fas fa-search mx-2"></i></span></button>
                    </div>
                    <h5 class="mb-0 me-4 lh-normal">Order Creation Date</h5>
                    <div class="col-3 me-3">
                        <input class="form-control" type="text">
                    </div>
                    <div class="mb-1" style="font-size: 20px;">
                        <button type="button" class="p-1 border-0 btn-pink btn-shadow">
                            <span class="iconify" data-icon="bxs:download"></span>report
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mx-4">
                <table class="table trans table-responsive">
                    <thead align="center" class="align-middle">
                        <tr>
                        <th class="product" scope="col">Product</th>
                        <th class="qty" scope="col">Q</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment Method</th>
                        <th class="action" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <tr class="border-0">
                            <td colspan="6"></td>
                        </tr>
                        <?php
                            include_once('../../include/database.php');
                            $database = new Connection();
                            $db = $database->open();
                            try{	
                                $sql = "SELECT CONCAT(u.first_name,' ',u.last_name) AS fullname, product_name, o.id, od.quantity, (od.product_price*od.quantity) as total, os.name, DATE_FORMAT(o.order_date, '%m-%d-%Y') as date
                                        FROM orders o JOIN order_details od JOIN user u JOIN product p JOIN order_status os
                                        ON o.id=od.order_id AND o.customer_id=u.id AND p.id=od.product_id AND o.order_status=os.id
                                        WHERE o.order_status=7
                                        ORDER BY o.id";
                                foreach ($db->query($sql) as $row) {  
                        ?>
                        <tr style="background: rgba(196, 196, 196, 0.28);">
                            <td colspan="4"><?php echo $row['fullname']; ?></td>
                            <td class="text-end" colspan="2"><?php echo $row['id']."|".$row['date']; ?></td>
                        </tr>
                        <tr align="center">
                            <th scope="row"><?php echo $row['product_name'] ?></th>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td>Gcash</td>
                            <td>
                                <a href="orderdetails.php?vieworder=<?php echo $row['id']; ?>" 
                                    class="text-reset text-decoration-none px-4 py-1 border border-dark btn-pink btn-shadow">
                                    view order
                                </a>
                            </td>
                        </tr>
                        </tr>
                        <?php 
                            }
                        }
                        catch(PDOException $e){
                            echo "There is some problem in connection: " . $e->getMessage();
                        }

                        //close connection
                        $database->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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


    <script src="../../assets/javascript/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
