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
                        <h1 class="mt-4">Blank Page</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Title of Card</div>
                            <div class="card-body">
                            <table class="table">
									<tr>
										<th> Product ID </th>
										<th> Product Name </th>
										<th> Product Price </th>                   
										<th> Date Manufactured </th>
										<th> Supplier ID </th>
										<th> Supplier Name </th>
									</tr>
									
								<?php
									$conn = OpenCon();
									$productid = $_GET["productID"];
									$sql= "SELECT * from `product` p, `supplier` s
											where p.supplierid = s.supplierid
											and p.productid = $productid";
									$result = $conn->query($sql);

									if($result-> num_rows > 0) {
										//output data of each row
										while($row = $result->fetch_assoc()){

											$productid = $row["productid"];
											$productname =$row["productname"];
											$productprice = $row["productprice"];
											$dateManu = $row["productDManufactured"];
											$supplierid = $row["supplierid"];
											$suppliername = $row["suppliername"];
											
											//echo "<table align=center border=1 cellspacing=0 cellpading=0>";
											echo "<tr>";
												//echo"<td>Product ID</td>";
												echo"<td>$productid</td>";
											//echo"</tr>";
											//echo "<tr>";
												//echo "<td>Product Name</td>";
												echo"<td>$productname</td>";
											//echo"</tr>";
											//echo "<tr>";
												//echo "<td>Product Price</td>";
												echo"<td>$productprice</td>";
											//echo"</tr>";
											//echo "<tr>";
												//echo "<td>Product Date Manufactured</td>";
												echo"<td>$dateManu</td>";
											//echo"</tr>";
											//echo "<tr>";
												//echo "<td>Supplier ID</td>";
												echo"<td>$supplierid</td>";
											//echo"</tr>";
											//echo "<tr>";
												//echo "<td>Supplier Name</td>";
												echo"<td>$suppliername</td>";
											echo"</tr>";
										echo "</table>";
										}
									}
									
									else {
										echo "Error : " . $sql. "<br>" . mysqli_error($conn);
									}
									CloseCon($conn);
								?>
		   
								<table class="table">
									<tr>
										<td></td>
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
