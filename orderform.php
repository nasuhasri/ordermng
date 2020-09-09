<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'header.php'; ?>

        <script type="text/javascript">
			/* Function to validate the form */
			function validateForm(){
				var supplier =  document.forms["orderForm"]["supplier"];
				var prodNm =  document.forms["orderForm"]["productname"];
				var prodQty = document.forms["orderForm"]["productqty"];

				if (supplier.selectedIndex < 1)                  
				{ 
					alert("Please enter your supplier."); 
					supplier.focus(); 
					return false;
				}

				if (prodNm.selectedIndex < 1)                  
				{ 
					alert("Please enter your product."); 
					prodNm.focus(); 
					return false; 
				}

				if (prodQty == "null" || prodQty < 0)                  
				{ 
					alert("Please enter your quantity."); 
					prodQty.focus(); 
					return false; 
				}

				return true;
			}
			/* End function to validate the form */

			function confirmSubmit()
			{
				if(confirm('Are you sure you want to submit the order')){
					/* No need to put window.location here as user will be only
					   go to insertorderaction.php if everything is true */

					//window.location.href= 'insertorderaction.php';
				}
				else {
					onclick="history.back()"
				}
			}					
		</script>

        <!-- Function to create dependent dropdown box -->
		<script>
			$(document).ready(function() {
				$("#supplier").change(function() {
					var supplierid = $(this).children("option:selected").val();
					if(supplierid != "") { 
						/* Dekat sini kita ada buat ajax, 
						   kita pass value supplier yang selected
						   ke orderform.php */
						console.log(supplierid);
						$.ajax({
							url: "orderformajax.php",
							type: "post",
							data: {supplier: supplierid},
							success: function(response) {
								$("#productname").html(response);
							}
						});
					} else {
						$("#show-product").html('<option>Select supplier first</option>');
					}
				});
			});
		</script>
		<!-- End of function dependent dropdown box -->
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
                        <h1 class="mt-4"> Order Product Form</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order Product</li>
						</ol>
						
						<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>You can order product now</div>
                            <div class="card-body">
								<form action="insertorderaction.php" id="form" name="orderForm" method="POST" onsubmit="return (validateForm())">
								<table class="table table-borderless">
									<tr>
										<td colspan="2" align="center">Supplier</td>
										<td>
											<select id="supplier" name="supplier">
												<option value="0">Select Supplier</option>
												<?php
													$conn = OpenCon();
													$sql = "select * from supplier s";
													$result = $conn->query($sql);
					
													while($row = $result->fetch_assoc()) {
														echo "<option value= '". $row['supplierid'] ."'>" .$row['suppliername']. "</option>";													}
												?>
											</select>						
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">Product Name</td>
										<td>
											<select id="productname" name="productname">
												<option value="0">Select Supplier First</option>
												<option id="show-product" name="selectedProduct"></option>
											</select> <br>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">Product Quantity</td>
										<td><input type="number" min="0" name="productqty" maxlength="10" placeholder="150" required><br></td>
									</tr>
								</table>
								<table class="table table-borderless">
									<tr>
										<td colspan="2" align="center">
											<!-- onclick="confirmSubmit()" -->
											<input type="submit" value="Submit" name="submit" onclick="confirmSubmit">
											<input type="reset" value="Reset">
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
