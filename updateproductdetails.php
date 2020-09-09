<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'header.php'; ?>
        <style type="text/css">
            table{
                border-collapse: collapse;
                margin : 0 auto;
            }
            th, td{
                padding: 10px;
            }
        </style>
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
                        <h1 class="mt-4">Update Product Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <!-- <li class="breadcrumb-item active">Blank Page</li> -->
                        </ol>
                        <form action = "updateproductaction.php" id="updateform" method="POST">
                        <table class="table">
                        <?php
                            //Connect to database bcs want to fetch data from database
                            $conn = OpenCon();
                            
                            $productid = $_GET["productid"];
                            
                            $sql = "SELECT * FROM `product` p WHERE p.productid = $productid";
                            $result = $conn->query($sql);
                            
                            if($result->num_rows > 0) {
                                //output data of each row
                                while($row = $result->fetch_assoc()){
                                    
                                    $prodID = $row["productid"];
                                    $prodNm = $row["productname"];
                                    $prodPrice = $row["productprice"];
                                    $date = $row["productDManufactured"];
                                    $stock = $row["productStock"];
                                    $suppID = $row["supplierid"];
                                    
                                    //Display data to user in table format
                                    echo "<table>";
                                        echo "<tr>";
                                            echo "<td> Product ID </td>";
                                            echo "<td>" ?> <input type="text" name="prodID" value="<?php echo $prodID; ?>" readonly><?php "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                            echo "<td> Product Name </td>";
                                            echo "<td> "?> <input type="text" name="prodNm" value="<?php echo $prodNm;?>" ><?php "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                            echo "<td> Product Price </td>";
                                            echo "<td>"?><input type="decimal" name="price" value="<?php echo $prodPrice; ?>" ><?php "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                            echo "<td> Date Manufactured </td>";
                                            echo "<td>"?><input type="date" name="dateManu" value="<?php echo $date; ?>" ><?php "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                            echo "<td> Supplier ID </td>";
                                                echo "<td>" ?>
                                                    <select id="supp" name="supp">
                                                        <option value="1001" <?php if($suppID == "Selangor") echo "SELECTED";?>>Selangor</option>
                                                        <option value="1002" <?php if($suppID == "Melaka Kaya Raya") echo "SELECTED";?>>Melaka Kaya Raya</option>
                                                        <option value="1003" <?php if($suppID == "Johor Maju") echo "SELECTED";?>>Johor Maju</option>
                                                        <option value="1004" <?php if($suppID == "Langkawi Chocolate") echo "SELECTED";?>>Langkawi Chocolate</option>
                                                        <!-- </?php
                                                            $conn = OpenCon();
                                                            $sql = "SELECT * FROM `supplier` s
                                                                    WHERE s.supplierid = $suppID";
                                                            $result = $conn->query($sql);
                                
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value= '". $row['supplierid'] ."'>" .$row['suppliername']. "</option>";
                                                            }
                                                        ?>												 -->
                                                    </select>
                                                
                                                    <?php "</td>";
                                        echo "</tr>";						
                                    echo "</table>"	;	
                                }
                            }
                            else {
                                echo "Data cannot be displayed";
                            }
                            
                            CloseCon($conn);
                        ?>
                        <table>
                            <br>
                            <tr>
                                <td colspan="2" align="center">
                                    <!--Click submit then the form will go to updatecourseaction.php-->
                                    <input type="submit" value="Submit" />
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
