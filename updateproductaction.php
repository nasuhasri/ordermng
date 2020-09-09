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
                        <h1 class="mt-4">Update Product Action</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                        <?php
                            //$_POST["prodID"] diambil drpd method POST drpd updateproductdetails.php 
                            $prodID = $_POST["prodID"];
                            $prodNm = $_POST["prodNm"];
                            $prodPrice = $_POST["price"];
                            $dateManu = $_POST["dateManu"];
                            $suppID = $_POST["supp"];
                            
                            $conn = OpenCon();

                            $sql = "UPDATE `product` p
                                    SET p.productname='$prodNm',
                                        p.productprice='$prodPrice',
                                        p.productDManufactured='$dateManu',
                                        p.supplierid=$suppID
                                    WHERE p.productid=$prodID";
                            
                            $result = $conn->query($sql);
                            
                            if ($result == true){

                                echo "<script type='text/javascript'>
                                        alert('Successfully Updated!');
                                        </script>";

                                $sqlP = "SELECT * FROM product p
                                        WHERE p.productid = $prodID";
                                $resultP = $conn->query($sqlP);

                                if($resultP -> num_rows > 0){
                                    while($row = $resultP->fetch_assoc()){
                                        $prodID = $row['productid'];
                                        $prodNm = $row['productname'];
                                        $prodPrice = $row['productprice'];
                                        $date = $row['productDManufactured'];
                                        $suppID = $row['supplierid'];

                                        ?>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Product ID</td>
                                                    <td><?php echo $prodID; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Product Name</td>
                                                    <td><?php echo $prodNm; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Product Price (RM)</td>
                                                    <td><?php echo $prodPrice; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Date Manufactured</td>
                                                    <td><?php echo $date; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Supplier ID</td>
                                                    <td><?php echo $suppID; ?></td>
                                                </tr>
                                            </table>
                                        <?php
                                    }
                                }                                
                            } 
                            else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            
                            CloseCon($conn);	
                        ?>

                        <table>
                            <br>
                            <tr>
                                <td colspan="2" align="center">
                                    <button class="btn btn-primary" onclick="window.location.href='displayProduct.php'">Go to Product</button>
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
