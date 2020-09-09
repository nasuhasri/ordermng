<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'header.php'; ?>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <?php include 'topnav.php'; ?>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'sidenav.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <!-- First Card - All Order Request -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php
                                        $conn = OpenCon();
                                        /**Value is empID coming from empLoginAction.php**/
                                        $empID = $_SESSION['login_user'];

                                        $sql = "SELECT count(o.orderid) AS totalorder
                                                FROM `order_product` op, `product` p, `orders` o
                                                WHERE op.productid = p.productid
                                                AND o.orderid = op.orderid
                                                AND o.empid = $empID";
                                        $result = $conn->query($sql);
                                    
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {             
                                                $totalorder = $row["totalorder"];
                                            }
                                        }
                                        else {
                                            echo "Error in fetching data";
                                        }
                                        
                                        CloseCon($conn);			
                                    ?>
                                    <div class="card-body">
                                        <p class="main-text"><?php echo "<h1>$totalorder</h1>" ?> <h5>Request Order</h5></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">                                        
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Second Card - Pending Order -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php
                                        $conn = OpenCon();
                                    
                                        $sql = "SELECT count(o.orderid) AS totalpending
                                                FROM `orders` o
                                                WHERE o.orderstatus = 'PENDING'
                                                AND o.empid = $empID";
                                        $result = $conn->query($sql);
                                    
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {             
                                                $pending = $row["totalpending"];
                                            }
                                        }
                                        else {
                                            echo "Error in fetching data";
                                        }
                                        
                                        CloseCon($conn);			
                                    ?>
                                    <div class="card-body">
                                        <p class="main-text"><?php echo "<h1>$pending</h1>" ?> <h5>Pending Order</h5></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Third Card - Completed Order -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php
                                        $conn = OpenCon();
                                        
                                        $sql = "SELECT count(i.invoiceid) AS totalinvoice
                                                FROM `orders` o, `invoice` i
                                                WHERE o.orderid = i.orderid
                                                AND o.orderstatus = 'APPROVED'
                                                AND o.empID = $empID";
                                        $result = $conn->query($sql);

                                        if($result-> num_rows > 0) {
                                            //output data of each row
                                            while($row = $result->fetch_assoc()){                                        
                                                //echo "<br>" .$row["totalinvoice"] . "</br>";
                                                $invoice = $row["totalinvoice"];
                                            }
                                        }                                        
                                        CloseCon($conn);
                                    ?>
                                    <div class="card-body">
                                        <p class="main-text"><?php echo "<h1>$invoice</h1>" ?> <h5>Completed Order</h5></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fourth Card - Rejected Order -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <?php
                                        $conn = OpenCon();

                                        $sql = "SELECT count(o.orderid) AS totalreject
                                                FROM `orders` o
                                                WHERE o.orderstatus = 'REJECTED'
                                                AND o.empID = $empID";
                                        $result = $conn->query($sql);

                                        if($result-> num_rows > 0) {
                                            //output data of each row
                                            while($row = $result->fetch_assoc()){                                        
                                                //echo "<br>" .$row["totalreject"] . "</br>";
                                                $reject = $row["totalreject"];
                                            }
                                        }                                        
                                        CloseCon($conn);
                                    ?>
                                    <div class="card-body">
                                        <p class="main-text"><?php echo "<h1>$reject</h1>" ?> <h5>Rejected Order</h5></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php include 'footer.php'; ?>
                </footer>
            </div>
        </div>
        <?php include 'libscripts.php'; ?>
    </body>
</html>
