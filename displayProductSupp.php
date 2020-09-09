<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'headerSupp.php'; ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#productSupp').dataTable( {
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
                        <h1 class="mt-4">List of Our Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Products</li>
                        </ol>
						<table class="table" id="productSupp" width="100%" cellspacing="0">
							<thead class="thead-dark">
								<tr>
								    <th>Product ID</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Date Manufactured</th>
									<th>Remaining Stock</th>
									<th>Supplier ID</th>
								</tr>
					        </thead>
							<tbody>
							<?php
								$conn = OpenCon();
								
								/**Value supplierid coming from supplierloginaction.php**/
                                $suppID = $_SESSION['login_supplier'];
                                
								$sql= "SELECT * from `product` p, `supplier` s
										where p.supplierid = s.supplierid
										and s.supplierid = $suppID";
										
								$result = $conn ->query($sql);

								if($result-> num_rows > 0) {
									//output data of each row
									while($row = $result->fetch_assoc()){

										$productid = $row["productid"];
										$productname =$row["productname"];
										$productprice = $row["productprice"];
										$productmanufactured = $row["productDManufactured"];
										$productstock = $row["productStock"];
										$supplierid = $row["supplierid"];
										
									echo "<tr>";
										echo "<td>$productid</td>";
										echo "<td>$productname</td>";
										echo "<td>$productprice</td>";
										echo "<td>$productmanufactured</td>";
										echo "<td>$productstock</td>";
										echo "<td>$supplierid</td>";
									echo "</tr>";
									}
								}else 
									echo "There's no data anymore";

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
