<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'header.php'; ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#orderTable').dataTable( {
                    "pagingType": "simple"
                } );
            } );

            function confirmDelete(ordID)
			{
				if(confirm('Are You Sure You Want To Delete This Record?'))
				{
					window.location.href= 'deleteOrder.php?orderid=' + ordID;
				}
			}
        </script>
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
                        <h1 class="mt-4">Display All Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Orders</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header container-fluid">
                                <div class="row">
                                    <div class="col-md-10">
                                        <i class="fas fa-table mr-1"></i>All Orders in Tomatus Station
                                    </div>
                                    <div class="col-md-2 float-right">
                                        <a href="orderform.php" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Add New Order</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="orderTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Order Date</th>
                                                <!-- <th>Order Time</th> -->
                                                <th>Product Name</th>
                                                <th>Order Status</th>
                                                <th>Order Price (RM)</th>
                                                <th>Employee Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conn = openCon();
                                                $sql = "SELECT * FROM `orders` o, `employee` e
                                                        WHERE o.empid = e.empid";
                                                $result = $conn -> query($sql);

                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                        $ordID = $row['orderid'];
                                                        $ordDate = $row['orderdate'];
                                                        // $ordTime = $row['ordertime'];
                                                        $ordProd = $row['orderproduct'];
                                                        $ordStatus = $row['orderstatus'];
                                                        $ordPrice = $row['totalPrice'];
                                                        $empNm = $row['empfname'];

                                                        ?>
                                                            <tr>
                                                                <td><?php echo $ordID; ?></td>
                                                                <td><?php echo $ordDate; ?></td>
                                                                <!-- <td></?php echo $ordTime; ?></td> -->
                                                                <td><?php echo $ordProd; ?></td>
                                                                <td><?php echo $ordStatus; ?></td>
                                                                <td><?php echo $ordPrice; ?></td>
                                                                <td><?php echo $empNm; ?></td>
                                                                <td>
                                                                    <button class="btn btn-warning btn-icon-split" onclick="window.location.href='updateproductdetails.php?orderid=<?php echo $ordID ?>'">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-edit"></i>
                                                                        </span>
                                                                        <span class="text">Update</span>
                                                                    </button>
                                                                    <button onclick="confirmDelete('<?php echo $ordID ?>')" class="btn btn-danger btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                        <i class="fas fa-trash"></i>
                                                                        </span>
                                                                        <span class="text">Delete</span>
                                                                    </button>  
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>                                        
                                    </table>
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
