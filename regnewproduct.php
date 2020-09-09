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
                        <h1 class="mt-4">Product Registration Form</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Register New Product</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body container-fluid">
                                <form action="insertproductaction.php " id="form" method="POST">
                                <table class="table table-borderless">
                                    <!-- <tr> 
                                        <td colspan="2" align="center">Product ID</td>
                                        <td><input type="text" name="prodID" maxlength="50" placeholder="303" required></td>
                                    </tr> -->
                                    <tr> 
                                        <td colspan="2" align="center">Product Name</td>
                                        <td><input type="text" name="fullname" maxlength="50" placeholder="Choco Jar"></td>
                                    </tr>
                                    <tr> 
                                        <td colspan="2" align="center">Product Price</td>
                                        <td> <input type="decimal" name="price" maxlength="100" placeholder="23.50"></td>
                                    </tr>
                                    <tr> 
                                        <td colspan="2" align="center">Product Date Manufactured</td>
                                        <td> <input type="date" name="dateManu" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">Supplier ID</td>
                                        <td>
                                            <select id="supplier" name="supplier">
                                                <option>Select</option>
                                                <?php
                                                    $conn = OpenCon();
                                                    $sql = "select * from supplier s";
                                                    $result = $conn->query($sql);
                        
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<option value= '". $row['supplierid'] ."'>" .$row['suppliername']. "</option>";
                                                    }
                                                ?>
                                            </select>						
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <table style="margin-left:auto; margin-right:auto;">
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="submit" value="Submit">
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
