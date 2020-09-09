<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'headerSupp.php'; ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#invoicesSupp').dataTable( {
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
                        <h1 class="mt-4">List of Invoices</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Invoices</li>
                        </ol>
                        <table class="table" class="table" id="invoicesSupp" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th> Invoice ID        </th>
                                    <th> Invoice Date      </th>
                                    <th> Order ID          </th>                   
                                    <th> Product ID        </th>
                                    <th> Product Name      </th>
                                    <th> Product Price(RM) </th>
                                    <th> Product Quantity  </th>
                                    <th> Total Price(RM)   </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $conn = OpenCon();

                                    /**Value supplierid coming from supplierloginaction.php**/
                                    $suppID = $_SESSION['login_supplier'];

                                    $sql = "SELECT * FROM `invoice` i, `orders` o, `order_product` op, `product` p
                                            WHERE o.orderid = i.orderid
                                            AND o.orderid = op.orderid
                                            and op.productid = p.productid
                                            and p.supplierid = $suppID";

                                    //$sql = "SELECT * FROM `invoice` i";
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
                                        echo "<p>There is no invoices has been made yet!</p>";
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
