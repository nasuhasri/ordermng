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
                        <h1 class="mt-4">Insert Order Data into Database</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>

                        <?php
							$conn = OpenCon();
							/*Change the line below to our timezone!*/
							date_default_timezone_set('Asia/Kuala_Lumpur');
									
							/* Get orderID using rand method */
							$orderID = date("yy") .rand(100000,999999);
							/* Get orderDate and orderTime using date method */
							$orderDate = date("yy/m/d");
							$orderTime = date("H:i:s");
									
							/* Get data from orderform.php using method POST */
							$orderProduct = $_POST["productname"];
							$productqty = $_POST["productqty"];

							/**$login_id coming from session.php**/
							$empid = $login_id;
									
							/* This is code to select all columns from table 'product' */
							$sqlP="select * from `product` p
							    	where p.productname = '$orderProduct'";

							$result = $conn->query($sqlP);

							/* This is to retrieve data from database if $result==1 */
							if($result->num_rows > 0){
								/* Fetch data from database */
								while($row = $result->fetch_assoc()){
									$productid = $row["productid"];
									$productname = $row['productname'];
									$productprice = $row['productprice'];
									$supplierid = $row['supplierid'];
											
									/* Insert sql into table order_product */
									$sql2 = "INSERT INTO `order_product` (orderid, productid, productqty)
											VALUES ($orderID, $productid, $productqty)";

									/* Using if else to know either the sql statement successful or not */
									if (mysqli_query($conn, $sql2)) {
										echo "Berjaya";
									}
									else {
										echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
									}

									/* Calculate the totalPrice from data that has been retrieved from database */
									$totalPrice = $productqty * $productprice;
								}
							}

							/* Insert all data to table 'orders' */
							$sql = "INSERT INTO `orders` (orderid, orderdate, ordertime, orderproduct, totalPrice, empid)
									VALUES ($orderID, '$orderDate', '$orderTime', '$orderProduct', '$totalPrice', $empid)";
									
							/* Using if else to know either the sql statement successful or not */
							if(mysqli_query($conn, $sql)){
								echo "Berjaya";
							}
							else {						
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
									
							CloseCon($conn);
						?>
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
