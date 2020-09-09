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
                        <h1 class="mt-4">Invoices</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Invoices</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>This is invoives data after order has been approved</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Invoice Date</th>
                                            <th>Order ID</th>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Product Price(RM)</th>
                                            <th>Product Quantity</th>
                                            <th>Total Price(RM)</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                        $conn = OpenCon();

                                        /**Value empID coming from employeeloginaction.php**/
                                        $empID = $_SESSION['login_user'];

                                        $sql = "SELECT * FROM `invoice` i, `orders` o, `order_product` op, `product` p
                                                WHERE o.orderid = i.orderid
                                                AND o.orderid = op.orderid
                                                AND op.productid = p.productid
                                                AND o.orderstatus = 'APPROVED'
                                                AND o.empid = $empID";

                                        $result = $conn->query($sql);

                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                $invID = $row["invoiceid"];
                                                $invDate = $row["invoicedate"];
                                                $orderid = $row["orderid"];
                                                $prodID = $row["productid"];
                                                $prodNm = $row["productname"];
                                                $prodPrice = $row["productprice"];
                                                $prodQty = $row["productqty"];
                                                $totalPrice = $row["totalPrice"];

                                                echo "<tr>";
                                                    echo "<td>$invID</td>";
                                                    echo "<td>$invDate</td>";
                                                    echo "<td>$orderid</td>";
                                                    echo "<td>$prodID</td>";
                                                    echo "<td>$prodNm</td>";
                                                    echo "<td>$prodPrice</td>";
                                                    echo "<td>$prodQty</td>";
                                                    echo "<td>$totalPrice</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        else{
                                            echo "<p>No invoices have been made yet. Please notify your supplier.</p>";
                                        }

                                        echo "</table>";

                                        $sql2 = "SELECT count(*) FROM `orders` o
                                                WHERE o.orderstatus = 'APPROVED'
                                                AND o.empID = $empID";
                                        $result2 = $conn->query($sql2);
                                        $row = $result2 ->fetch_row();
                                        $count = ceil($row[0]/10);
                                        for($pageno=1;$pageno<=$count;$pageno++){
                                            ?><a href="invoicesEmp.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " "; ?></a><?php
                                        }

                                        CloseCon($conn);
                                    ?>
                                </tbody>
                                
                                <table class="table">
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="button" value="Back" onclick="history.back()" />
                                        </td>
                                    </tr>
                                </table>
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
