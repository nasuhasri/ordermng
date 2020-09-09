<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <li class="text-center">
                <!-- dist/images/emp.png -->
                <img src="" class="user-image img-responsive"/>
			</li>	
            <!-- In Core div, we have Dashboard menus -->
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="dashboardSupp.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>   
            <a class="nav-link" href="orderReq.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Order Request
            </a>   
            <a class="nav-link" href="displayProductSupp.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                All Products
            </a> 
            <a class="nav-link" href="invoicesSupp.php"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Invoices
            </a>                          
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="medium">Logged in as:</div>
        <?php echo "<h4>$login_name</h4>"; ?>
    </div>
</nav>