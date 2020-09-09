<!DOCTYPE html>
<html lang="en">
    <head>
		<?php include 'header.php'; ?>
		<script type="text/javascript">
            $(document).ready(function() {
                $('#searchTable').dataTable( {
                    "pagingType": "simple"
                } );
            } );
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
                        <h1 class="mt-4">Results</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Search Action</li>
                        </ol>

                        <table class="table" id="searchTable">
							<thead class="thead-dark">
								<tr>
							    	<th>Product Name</th>
									<th>Product ID</th>
									<th>Date Manufactured</th>
									<th>Price (RM)</th>
								</tr>
							</thead>						
						<tbody>
						<?php
							$searching=$_GET["search"];

							$conn=OpenCon();

							$sql="SELECT *
								FROM `product` p, `supplier` s
								WHERE p.supplierID=s.supplierID
								AND (p.productName LIKE '%$searching%'
								OR p.productID  LIKE '%$searching%'
								OR s.supplierName LIKE '%$searching%')";
											
							$result=$conn->query($sql);
								 
							if($result->num_rows > 0) {
                                
                                while($row=$result->fetch_assoc()) {
                                    $productName =$row["productname"];
									$productID = $row["productid"];
									$supplierName = $row["suppliername"];
									$productPrice = $row["productprice"];								

									echo "<tr>";
										echo "<td>$productName</td>";
										echo "<td><a href=displayproductdetails.php?productID=$productID>$productID</a></td>";
										echo "<td>$supplierName</td>";
										echo "<td>$productPrice</td>";				 
									echo "</tr>";
								}
							}
							echo "</table>";																		  
						
						    CloseCon($conn);
						?>
						</tbody>
						<table class="table">
							<tr>
								<td colspan="2" align="right">
									<input type="button" value="Back" onclick="history.back()" />
								</td>
							</tr>
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
