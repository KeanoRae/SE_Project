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
        <?php
            if(isset($_SESSION['upload_err']) and $_SESSION['upload_err'] != ""){
                echo $_SESSION['upload_err'];echo "<br>";
                unset($_SESSION['upload_err']);
            }
            if(isset($_SESSION['cover_error']) and $_SESSION['cover_error'] != ""){
                echo "cover_error = ".$_SESSION['cover_error'];echo "<br>";
                unset($_SESSION['cover_error']);
            }
            if(isset($_SESSION['product_error']) and $_SESSION['product_error'] != ""){
                echo "product_error = ".$_SESSION['product_error'];echo "<br>";
                unset($_SESSION['product_error']);
            }
        ?>
        <div class="row gx-3 py-3 px-4" style="min-height: 800px;">
            <div class="col-3 sidebar p-0 me-3">
                <p class="text-center fw-bold fs-2 mt-2">STAFF</p>
                <br>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fw-bold fs-3 ms-2 mb-1 w-100" href="dashboard.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="iwwa:dashboard"></span>Dashboard
                    </a>
                </div>
                <hr>
                <div class="ms-1 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="staff-transaction/pending.php">
                        <span class="iconify fs-1 mb-1 me-1" data-icon="icon-park-outline:transaction-order"></span>Transaction
                    </a>
                </div>
                <hr>
                <div class="ms-2 d-flex align-items-center">
                    <a class="text-reset text-decoration-none fs-3 ms-2 mb-1 w-100" href="staff-product.php">
                        <span class="iconify fs-2 me-2" data-icon="bytesize:cart"></span>Product
                    </a>                         
                </div>
                <hr>
            </div>
            <div class="col right">
                <p class="fs-2 fw-bold mb-4 mt-5 mx-4">DASHBOARD</p>
                <!-- Charts -->
                <?php
                    include_once('../../include/database.php');
                    $database = new Connection();
                    $db = $database->open();
                    //query to display all admin and staff
                    $sql = $db->prepare("SELECT p.product_name, SUM(od.quantity*od.product_price)+SUM(od.add_ons) as Total_Amount FROM product p 
                                        JOIN order_details od WHERE p.id=od.product_id GROUP BY od.product_id");
                    $sql->execute();
                    $product_sales = array();
                    $product_name = array();
                    while($row=$sql->fetch(PDO::FETCH_ASSOC)){
                        $product_sales[] = $row['Total_Amount'];
                        $product_name[] = $row['product_name'];
                    }
                ?>
                
                <div class="row mt-2">
                    <div class="col6 col-sm-12 mx-1 w-50">
                        <canvas id="barchart"></canvas>
                    </div>
                    <div class="col6 col-sm-12 w-25 mx-auto">
                        <canvas id="piechart"></canvas>
                    </div>
                </div>
                <div class="row gy-5 mt-2 d-flex justify-content-evenly">
                    <div class="col-3 box position-relative" style="background: #ABC4FF;">
                        <div class="icon d-flex float-end mt-4">
                            <p class="align-self-center fs-1 me-5 py-2"></p>
                            <span class="iconify me-2" style="font-size: 81px;" data-icon="fa6-solid:id-card-clip"></span>
                        </div>
                        <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">VISITORS</p>
                    </div>
                    <div class="col-3 box position-relative" style="background: #ABC4FFD9;">
                        <div class="icon float-end mt-4">
                            <span class="iconify me-2" style="font-size: 81px;" data-icon="ep:circle-check"></span>
                        </div>
                        <p class="d-inline-block fs-4 mb-2 position-absolute bottom-0">CONFIRMATION ORDERS</p>
                    </div>
                    <div class="col-3 box position-relative" style="background: #ABC4FFB2;">
                        <div class="icon float-end mt-4">
                            <span class="iconify me-2" style="font-size: 81px;" data-icon="icon-park-outline:sales-report"></span>
                        </div>
                        <p class="d-inline-block fs-4 ms-3 mb-2 position-absolute bottom-0">TOTAL SALES</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="row d-print-none">
            <div class="col d-flex flex-column">
                <a class="text-decoration-none text-reset mt-3" href="../../contact.php">Contact</a>
                <a class="text-decoration-none text-reset" href="../../about.php">About</a>
                <a class="text-decoration-none text-reset mb-4" href="../../policy.php">Return Policy</a>
            </div>
            <div class="col">
                <p class="fw-bold mt-3">Social Media</p>
                <p class="text-decoration-underline">https://www.facebook.com/NJglasspainting</p>
                <p class="mb-4">https://www.instagram.com/njglasspainting/</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // -------- Bar Chart -------- //
        // Setup Block
        const chart_name = <?php echo json_encode($product_name); ?>;
        const chart_sales = <?php echo json_encode($product_sales); ?>;
        const barchart_data = {
            labels: chart_name,
            datasets: [{
            label: 'Total Sales per Product',
            data: chart_sales,
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            ],
            borderWidth: 1
            }]
        };

        // Config Block
        const barchart_config = {
            type: 'bar',
                data: barchart_data,
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                },
                plugins: [ChartDataLabels]
        };

        // Render Block
        const barchart = new Chart(
            document.getElementById('barchart'), barchart_config
        );

        // -------- Pie Chart -------- //
        // Setup Block
        const piechart_data = {
            labels: chart_name,
            datasets: [{
            data: chart_sales,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
            }]
        };

        // Config Block
        
        const piechart_config = {
            type: 'pie',
            data: piechart_data,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        enabled: false
                    },
                    datalabels: {
                        formatter: (value, context) => {
                            const datapoints = context.chart.data.datasets[0].data;
                            function totalSum(total, datapoint) {
                                return total + parseFloat(datapoint);
                            }
                            const totalvalue = datapoints.reduce(totalSum, 0);
                            const percentValue = (value / totalvalue * 100).toFixed(1);
                            return `${percentValue}%`;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        // Render Block
        const piechart = new Chart(
            document.getElementById('piechart'), piechart_config
        );
    </script>
</body>
</html>