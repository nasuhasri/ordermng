<!DOCTYPE html>
<html lang="en">

     <head>
          <link rel="shortcut icon" href="dist/images/favicon.ico" />
          <!-- SCRIPTS -->
          <script src="js/jquery.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="js/jquery.parallax.js"></script>
          <script src="js/owl.carousel.min.js"></script>
          <script src="js/jquery.magnific-popup.min.js"></script>
          <script src="js/magnific-popup-options.js"></script>
          <script src="js/modernizr.custom.js"></script>
          <script src="js/smoothscroll.js"></script>
          <script src="js/custom.js"></script>
     </head>

     <head>
          <title>Tomatus Station</title>

          <!--

          Template 2099 Scenic

          http://www.tooplate.com/view/2099-scenic

          -->

          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=Edge">
          <meta name="description" content="">
          <meta name="keywords" content="">
          <meta name="author" content="">
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

          <link rel="stylesheet" href="cssTP/bootstrap.min.css">
          <link rel="stylesheet" href="cssTP/font-awesome.min.css">
          <link rel="stylesheet" href="cssTP/magnific-popup.css">

          <link rel="stylesheet" href="cssTP/owl.theme.css">
          <link rel="stylesheet" href="cssTP/owl.carousel.css">

          <!-- MAIN CSS -->
          <link rel="stylesheet" href="cssTP/tooplate-style.css">
     </head>

     <body>
          <!-- PRE LOADER -->
          <div class="preloader">
               <div class="spinner">
                    <span class="sk-inner-circle"></span>
               </div>
          </div>

          <!-- MENU -->
          <div class="navbar custom-navbar navbar-fixed-top" role="navigation">
               <div class="container">
                    <!-- NAVBAR HEADER -->
                    <div class="navbar-header">
                         <!-- lOGO -->
                         <a class="navbar-brand">Tomatus Station Melaka</a>
                    </div>

                    <!-- MENU LINKS -->
                    <div class="collapse navbar-collapse">
                         <ul class="nav navbar-nav navbar-right">
                              <li><a href="welcomepage.php" class="smoothScroll">Home</a></li>
                              <li><a href="#more" class="smoothScroll">About</a></li>
                         </ul>
                    </div>
               </div>
          </div>

          <!-- HOME -->
          <section id="home" class="parallax-section">
               <div class="overlay"></div>
               <div class="container">
                    <div class="row">
                         <div class="col-md-8 col-sm-12">
                              <div class="home-text">
                                   <h1>Order Management System</h1>
                                   <ul class="section-btn">
                                        <a href="suppLogin.php" class="smoothScroll"><span data-hover="Login">Supplier</span></a> 
                                        <a href="empLogin.php" class="smoothScroll"><span data-hover="Login">Staff</span></a> 
                                   </ul>
                              </div>
                         </div>
                    </div>
               </div>

               <!-- Video -->
               <video controls autoplay loop muted>
                    <source src="videos/video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
               </video>
          </section>

          <footer>
               <?php include 'footWC.php';?>
          </footer>
     </body>
</html>