<?php
session_start();
?>
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
  <div class="container-fluid" style="background-color: #C4C4C4;">
  <p class="fs-2 fw-bold mb-4 mt-5 mx-5">TRANSACTION</p>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">pending</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="confirmed-tab" data-bs-toggle="tab" data-bs-target="#confirmed" type="button" role="tab" aria-controls="confirmed" aria-selected="false">confirmed</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab" aria-controls="cancelled" aria-selected="false">cancelled</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
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
                  include_once('include/database.php');
                  $database = new Connection();
                  $db = $database->open();
                  try{	
                      $sql = "SELECT CONCAT(u.first_name,' ',u.last_name) AS fullname, product_name, o.id, od.quantity, (od.product_price*od.quantity) as total, os.name, DATE_FORMAT(o.order_date, '%m-%d-%Y') as date
                              FROM orders o JOIN order_details od JOIN user u JOIN product p JOIN order_status os
                              ON o.id=od.order_id AND o.customer_id=u.id AND p.id=od.product_id AND o.order_status=os.id
                              WHERE o.order_status=3
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
      <div class="tab-pane fade" id="confirmed" role="tabpanel" aria-labelledby="confirmed-tab">
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
                    include_once('include/database.php');
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
        
      <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">Helloewewe2</div>
    </div>
  </div>

  


  
<?php include('include/footer.php'); ?>