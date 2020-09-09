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
                        <h1 class="mt-4">Delete Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>

                        <?php
                            $conn = openCon();

                            $productid = $_GET['productid'];

                            $sql = "DELETE FROM `product` WHERE productid = $productid";
                            $result = $conn->query($sql);
                            
                            if(! $result){
                                die('Could not delete data: '. mysqli_error($conn));
                            }
                            else {
                                echo "<script type='text/javascript'>
                                        alert('Successfully Deleted!');
                                        window.location.href='displayproduct.php';
                                    </script>";
                            }                   
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
