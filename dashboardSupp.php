<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'headerSupp.php'; ?>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <?php include 'topnavSupp.php'; ?>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'sidenavSupp.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <!-- First Box (Completed Order) -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php
                                        $conn = OpenCon();

                                        $suppID = $_SESSION['login_supplier'];
                                                        
                                        $sql = "select count(op.orderid) as totalorder
                                                from `order_product` op, `product` p, `orders` o, `supplier` s
                                                where op.productid = p.productid
                                                and o.orderid = op.orderid
                                                and p.supplierid = s.supplierid
                                                and o.orderstatus = 'APPROVED'
                                                and s.supplierid = $suppID";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            //output data of each row
                                                                
                                            while($row = $result->fetch_assoc())
                                            {                              
                                                    $approve = $row["totalorder"];
                                            }
                                        }
                                        else {
                                            echo "Error in fetching data";
                                        }
                                        
                                        CloseCon($conn);			
                                    ?>
                                    <div class="card-body">
                                        <p class="main-text"><?php echo "<h2>$approve</h2>" ?> <h5>Completed Order</h5></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">                                        
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of completed order -->

                            <!-- Second TextBox (Total Sales) -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php
                                        $conn = OpenCon();

                                        $sql= "SELECT SUM(totalPrice) AS totalsales
                                                FROM orders";
                                        $sql2 = "SELECT SUM(totalPrice) AS totalsales
                                                from `order_product` op, `product` p, `orders` o, `supplier` s
                                                where op.productid = p.productid
                                                and o.orderproduct = p.productname
                                                and p.supplierid = s.supplierid
                                                and s.supplierid = $suppID
                                                and o.orderstatus = 'APPROVED'";
                                        $result = $conn->query($sql2);

                                        if($result-> num_rows > 0) {
                                            //output data of each row
                                            while($row = $result->fetch_assoc()){                                                
                                                $sales = $row["totalsales"];
                                            }
                                        }						
				                        CloseCon($conn);			
                                    ?>
                                    <div class="card-body">
                                        <p class="main-text"><?php echo "<h2>RM $sales</h2>" ?> <h5>Total Sales</h5></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Third Box (Pending Order) -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                <?php
                                        /* remove -> include 'conn.php'; bcs
                                        we have put connection inside header page */
                                        $conn = OpenCon();

                                        $suppID = $_SESSION['login_supplier'];
                                                        
                                        $sql = "select count(op.orderid) as pendingorder
                                                from `order_product` op, `product` p, `orders` o, `supplier` s
                                                where op.productid = p.productid
                                                and o.orderid = op.orderid
                                                and p.supplierid = s.supplierid
                                                and o.orderstatus = 'PENDING'
                                                and s.supplierid = $suppID";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            //output data of each row
                                                                
                                            while($row = $result->fetch_assoc())
                                            {                              
                                                    $pending = $row["pendingorder"];
                                            }
                                        }
                                        else {
                                            echo "Error in fetching data";
                                        }
                                        
                                        CloseCon($conn);			
                                    ?>
                                    <div class="card-body">
                                        <p class="main-text"><?php echo "<h2>$pending</h2>" ?> <h5>Pending Order</h5></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fourth Box - Rejected Order -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <?php
                                        $conn = OpenCon();

                                        $sql = "select count(op.orderid) as totalreject
                                                from `order_product` op, `product` p, `orders` o, `supplier` s
                                                where op.productid = p.productid
                                                and o.orderid = op.orderid
                                                and p.supplierid = s.supplierid
                                                and o.orderstatus = 'REJECTED'
                                                and s.supplierid = $suppID";
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
                                        <p class="main-text"><?php echo "<h2>$reject</h2>" ?> <h5>Rejected Order</h5></p>
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
