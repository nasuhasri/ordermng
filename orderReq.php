<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'headerSupp.php'; ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#orderTable').dataTable( {
                    "pagingType": "simple"
                } );
            } );
        </script>
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
                        <h1 class="mt-4">Order Request</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order Request</li>
                        </ol>
                        <table class="table" id="orderTable" width="100%" cellspacing="0">
                            <!-- <tr><p>Please be alert that you will delete the order once you clicked the cancel button!</p></tr> -->
                            <thead class="thead-dark">
                                <tr>
                                    <th> Order ID </th>
                                    <th> Product ID </th>                     
                                    <th> Product Name </th>
                                    <th> Product Quantity </th>
                                    <th> Total Price </th>
                                    <th> Order Status </th>
                                    <th> Availability of Product </th>
                                    <th> Action </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $conn = OpenCon();

                                    /**Value suppID coming from supplierloginaction.php**/
                                    $suppID = $_SESSION['login_supplier'];
                                                            
                                    $sql = "SELECT *
                                            FROM `order_product` op, `product` p, `orders` o, `supplier` s
                                            WHERE op.productid = p.productid
                                            AND o.orderid = op.orderid
                                            AND p.supplierid = s.supplierid
                                            AND o.orderstatus = 'PENDING'
                                            AND s.supplierid = $suppID
                                            ORDER BY o.orderdate, o.ordertime DESC";
                                            
                                    $result = $conn->query($sql);
                                        
                                    if ($result->num_rows > 0) {
                                        //output data of each row                                                                    
                                        while($row = $result->fetch_assoc()){
                                                                            
                                            $orderid = $row["orderid"];
                                            $proID = $row["productid"];
                                            $product = $row["productname"];                            
                                            $proQty = $row["productqty"];
                                            $totalPrice = $row["totalPrice"];                            
                                            $status = $row["orderstatus"];
                                            $stock = $row["productStock"];
                                                                            
                                            echo "<tr>";
                                                echo "<td><a href=displayorderdetails.php?orderid=$orderid>$orderid</a></td>";
                                                echo "<td> $proID </td>";
                                                echo "<td> $product </td>";
                                                echo "<td> $proQty </td>";
                                                echo "<td> $totalPrice </td>";
                                                echo "<td> $status </td>";    
                                                echo "<td> $stock </td>";

                                                if($proQty <= $stock){
                                                    echo "<td>" ?><button onclick="window.location.href='approveorder.php?orderid=<?php echo $orderid ?>'">APPROVE</button><?php "</td>";
                                                }
                                                echo "<td>" ?><button onclick="confirmCancel('<?php echo $orderid ?>')"> REJECT </button> <?php "</td>";

                                                echo "</tr>";
                                        }
                                    }
                                    else {
                                        echo "<p>No order request yet</p>";
                                    }
                                                        
                                    CloseCon($conn);
                                ?>
                            </tbody>
                        </table>
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
