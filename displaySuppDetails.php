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
										<th> Supplier ID </th>
										<th> Supplier Name </th>
										<th> Supplier Address </th>                   
										<th> Supplier Tell No </th>
									</tr>
								<?php 				
									$conn = OpenCon();
									$suppID = $_GET["supplierID"];
									$sql= "SELECT * FROM supplier WHERE supplierid = $suppID";
									$result = $conn->query($sql);

									if($result-> num_rows > 0) {
										//output data of each row
										while($row = $result->fetch_assoc()){

											$supplierid = $row["supplierid"];
											$suppliername =$row["suppliername"];
											$supplieraddress = $row["supplieraddress"];
											$supplierno = $row["suppliertellno"];
											
											// echo "<table align=center border=1 cellspacing=0 cellpading=0>";
											echo "<tr>";
											// 	echo "<td>Supplier ID</td>";
												echo"<td>$supplierid</td>";
											// echo"</tr>";
											// echo "<tr>";
											// 	echo "<td>Supplier Name</td>";
											echo"<td>$suppliername</td>";
											// echo"</tr>";
											// echo "<tr>";
											// 	echo "<td>Supplier Address</td>";
											echo"<td>$supplieraddress</td>";
											// echo"</tr>";
											// echo "<tr>";
											// 	echo "<td>Phone Number</td>";
											echo"<td>$supplierno</td>";
											// echo"</tr>";
                                            // echo "</table>";
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
