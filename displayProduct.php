<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'header.php'; ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTables').dataTable( {
                    "pagingType": "simple"
                } );
            } );

            function confirmDelete(productid)
			{
				if(confirm('Are You Sure You Want To Delete This Record?'))
				{
					window.location.href= 'deleteProduct.php?productid=' + productid;
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
                        <h1 class="mt-4">List of All Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Products</li>
                        </ol>

                        <div class="card mb-4">
                            <!-- <div class="card-header"><i class="fas fa-table mr-1"></i>All Products in Tomatus Station</div> -->
                            <div class="card-header container-fluid">
                                <div class="row">
                                    <div class="col-md-10">
                                        <i class="fas fa-table mr-1"></i>All Products in Tomatus Station
                                    </div>
                                    <div class="col-md-2 float-right">
                                        <!-- <button class="btn btn-primary" 
                                            (click)="onAddCategoieModal(addCategorieModal)">Add</button> -->
                                        <!-- <button class="btn btn-primary" style="margin-left: 1em" 
                                            (click)="onAddCategoieModal(content)">Add New Product</button> -->

                                            <a href="regnewproduct.php" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Add New Product</span>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <!-- <th>Date Manufactured</th> -->
                                                <th>Supplier Name</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                            $conn = OpenCon();

                                            $sql = "SELECT * FROM `product` p, `supplier` s
                                                    WHERE p.supplierid = s.supplierid";
                                            $result = $conn ->query($sql);

                                            if($result-> num_rows > 0) {
                                                //output data of each row
                                                while($row = $result->fetch_assoc()){

                                                    $productid = $row["productid"];
                                                    $suppliername = $row["suppliername"];
                                                    $suppID = $row["supplierid"];
                                                    $productname =$row["productname"];
                                                    $productprice = $row["productprice"];
                                                    $productmanufactured = $row["productDManufactured"];
                                                    echo "<tr>";
                                                        echo "<td><a href=displayProDetails.php?productID=$productid>$productid</a></td>";
                                                        echo "<td>$productname</td>";
                                                        echo "<td>$productprice</td>";
                                                        //echo "<td>$productmanufactured</td>";
                                                        echo "<td><a href=displaySuppDetails.php?supplierID=$suppID>$suppliername</a></td>";
                                                        echo "<td>" ?>
                                                                    <button class="btn btn-warning btn-icon-split" onclick="window.location.href='updateproductdetails.php?productid=<?php echo $productid ?>'">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-edit"></i>
                                                                        </span>
                                                                        <span class="text">Update</span>
                                                                    </button>
                                                                    <button onclick="confirmDelete('<?php echo $productid ?>')" class="btn btn-danger btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                        <i class="fas fa-trash"></i>
                                                                        </span>
                                                                        <span class="text">Delete</span>
                                                                    </button>                                                             
                                                                    <?php "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            else {
                                                echo "Error in fetching data";
                                            }

                                            CloseCon($conn);
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
