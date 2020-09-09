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
                        <h1 class="mt-4">Product Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                        <table class="table">
							<tr>
								<th> Product ID </th>
								<th> Product Name </th>
								<th> Product Price </th>                   
								<th> Date Manufactured </th>
								<th> Supplier ID </th>
							</tr>
						<?php
							$pID = 0;
							$pName = $_POST["fullname"];
							$dateManufactured = $_POST["dateManu"];
							$pPrice = $_POST["price"];
							$sID= $_POST["supplier"];

							if($sID == '1001'){
								$pID++;
							}

							$conn = OpenCon();
							$sql = "INSERT INTO product (productid, productname, productprice, productDManufactured, supplierid)
									VALUES ($pID, '$pName', '$pPrice', '$dateManufactured', '$sID')";
									
							if(mysqli_query($conn, $sql)) {
								//	echo "New record \n";
								//display back all the data that has been inserted.
								$sql2 ="select * from `product` p, `supplier` s 
										where p.supplierid = s.supplierid
										and p.productid = $pID";
					
								$result = $conn->query($sql2);
								if($result-> num_rows> 0) {
									//output data of each row
									while($row = $result->fetch_assoc()){

										$productid = $row["productid"];
										$productname =$row["productname"];
										$productprice = $row["productprice"];
										$productdate = $row["productDManufactured"];
										$supplierid = $row["supplierid"];
								
										//echo "<table>";
										echo "<tr>";
											//echo "<td>Product ID</td>";
											echo"<td>$productid</td>";
										//echo"</tr>";
										//echo "<tr>";
											//echo "<td>Product Name</td>";
											echo"<td>$productname</td>";
										//echo"</tr>";
										//echo "<tr>";
											//echo "<td>Product Price (RM)</td>";
											echo"<td>$productprice</td>";
										//echo"</tr>";
										//echo "<tr>";
											//echo "<td>Date Manufactured</td>";
											echo"<td>$productdate</td>";
										//echo"</tr>";
										//echo "<tr>";
											//echo "<td>Supplier ID</td>";
											echo"<td>$supplierid</td>";
										echo"</tr>";
										echo "</table>";
									}
								}
							}
							else {
								echo "Error : " . $sql. "<br>" . mysqli_error($conn);
							}
							CloseCon($conn);
						?>
								   
						<table>
							<tr>
								<td colspan="2" align="center">
									<input type="button" value="Dashboard" onclick="window.location.href='dashboard.php'"/>
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
