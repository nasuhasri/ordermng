<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <li class="text-center">
                <!-- dist/images/emp.png -->
                <img src="" class="user-image img-responsive"/>
				<!-- <p style="font-size:18; color:white;"></?php echo " " .$login_name. " (Staff ID: " .$login_id. ")";?></p> -->
			</li>	
            <!-- In Core div, we have Dashboard menus -->
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="dashboard.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="blankpage.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Blank Page
            </a> 
            <a class="nav-link" href="regnewproduct.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Register New Product
            </a>  
            <a class="nav-link" href="orderform.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Order Product
            </a>
            <a class="nav-link" href="allOrder.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                All Orders
            </a>   
            <a class="nav-link" href="displayProduct.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                All Products
            </a> 
            <a class="nav-link" href="invoicesEmp.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Invoices
            </a>                                
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?php echo "<h4>$login_name</h4>"; ?>
    </div>
</nav>