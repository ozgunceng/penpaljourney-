<?php
//session çalışsın diye tanımladım
ob_start();
session_start();
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
//belirli veriyi seçme işlemi başlattım



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Penpal Journey is a friendly website to meet new people all over the world. You can practise any language with your new friends. Penpal Journey user number is about to reach 2.200.200 people. We are loss one without you!" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page, Penpal Journey,Penpal, Free" />
		<meta name="robots" content="index, follow" />
		<title>Penpal Journey | Where You Can Find Penpal Online & Free </title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/journeybegin.png"/>
	</head>
	<body>
  
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Header
    ================================================= -->
		<header id="header" class="lazy-load">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">



              <li class="dropdown"><a href="index.php">Index</a></li>
              <li class="dropdown"><a href="learn.php">Learn More</a></li>
              
               <li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                	<li class="dropdown"><a href="login.php"><button class="btn btn-primary">Login</button></a></li>
                	<li class="dropdown"><a href="register.php"><button class="btn btn-primary">Register</button></a></li> 
                  <li class="dropdown"><a href="validate.php"><button class="btn btn-primary">Validation</button></a></li> 
                	<br>
                </ul>
              </li>



            </ul>




            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->

    <!-- Top Banner
    ================================================= -->
		<section id="banner">
			<div class="container">

        <!-- Sign Up Form
        ================================================= -->
        <div class="sign-up-form">
					<a href="index.html" class="logo"><img src="images/logo200w.png" alt="Friend Finder"/></a>
					<h2 class="text-white">Create A Free Account and connect with people all over the world!</h2>
					<div class="line-divider"></div>
					<div class="form-wrapper">
						<p class="signup-text">
							<h4 class="text-white">FREE</h4>
						</p>
						<a href="register.php"><button class="btn-secondary" >Sign Up  </button></a>
					</div>
					<a href="login.php">LOGIN</a>
          <a href="login.php">or VALIDATE</a>
					<img class="form-shadow" src="images/bottom-shadow.png" alt="" />
				</div><!-- Sign Up Form End -->

        <svg class="arrows hidden-xs hidden-sm">
          <path class="a1" d="M0 0 L30 32 L60 0"></path>
          <path class="a2" d="M0 20 L30 52 L60 20"></path>
          <path class="a3" d="M0 40 L30 72 L60 40"></path>
        </svg>
			</div>
		</section>

    <!-- Features Section
    ================================================= -->
		<section id="features">
			<div class="container wrapper">
				<h1 class="section-title slideDown">FREE!</h1>
				<div class="row slideUp">
					<div class="feature-item col-md-2 col-sm-6 col-xs-6 col-md-offset-2">
						<a href="login.php"><div class="feature-icon"><ion-icon name="accessibility"></ion-icon></div></a>
						<h3>Make Friends</h3>
					</div>
					<div class="feature-item col-md-2 col-sm-6 col-xs-6">
						<div class="feature-icon"><ion-icon name="planet"></ion-icon></div>
						<h3>Join Communities</h3>
					</div>
					<div class="feature-item col-md-2 col-sm-6 col-xs-6">
						<div class="feature-icon"><ion-icon name="paper-plane"></ion-icon></div>
						<h3>Direct Messages</h3>
					</div>
					<div class="feature-item col-md-2 col-sm-6 col-xs-6">
						<div class="feature-icon"><ion-icon name="mail"></ion-icon></div>
						<h3>Send Letters</h3>
					</div>


				</div>
				<h2 class="sub-title">Connect with people all over the world for FREE!</h2>
				<div id="incremental-counter" data-value="153292"></div>
				<p>People Already Signed Up</p>
				<img src="images/face-map.png" alt="" class="img-responsive responsive face-map slideUp hidden-sm hidden-xs" />
			</div>

		</section>

    <!-- Download Section
    ================================================= 
		<section id="app-download">
			<div class="container wrapper">
				<h1 class="section-title slideDown">download</h1>
				<ul class="app-btn list-inline slideUp">
					<li><button class="btn-secondary"><img src="images/app-store.png" alt="App Store" /></button></li>
					<li><button class="btn-secondary"><img src="images/google-play.png" alt="Google Play" /></button></li>
				</ul>
				<h2 class="sub-title">stay connected anytime, anywhere</h2>
				<img src="http://placehold.it/800x190" alt="iPhone" class="img-responsive" />
			</div>
		</section>
-->
    <!-- Image Divider
    ================================================= -->
  

    <!-- Facts Section
    ================================================= -->
		<section id="site-facts">
			<div class="container wrapper">
				
			</div>
		</section>

    <!-- Live Feed Section
    ================================================= -->
		<section id="live-feed">
			<div class="container wrapper">
				<h1 class="section-title slideDown">Last 25 Logins</h1> <br><br><br>
				<ul class="online-users list-inline slideUp">



<?php 

  $lastloginsor=$db->prepare("SELECT * FROM lastlogin order by last_time DESC limit 25");
  $lastloginsor->execute();

      $say=0;
      while($lastlogincek=$lastloginsor->fetch(PDO::FETCH_ASSOC)) { $say++;

                   
   $id=$lastlogincek['kullanici_id'];
   $lastkullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
    $lastkullanicisor->execute(array(
      'kullanici_id' => $id

  ));

    $say=$lastkullanicisor->rowCount();
    $lastkullanicicek=$lastkullanicisor->fetch(PDO::FETCH_ASSOC);


?>

			<li>
			  <a  title="<?php echo $lastkullanicicek['kullanici_ad']; ?>">



			   <img src="
               <?php 
               if($lastkullanicicek['kullanici_foto']!=NULL ){
                if($lastkullanicicek['kullanici_fotonay']==1){
               echo $lastkullanicicek['kullanici_foto'];}
               else{
                echo "images/awaiting.png";
               }
                }
               else
                echo "images/nopic.png";
               ?> "

				 alt="<?php echo $lastkullanicicek['kullanici_ad']; ?>" class="img-responsive profile-photo-index" />
				<h5><a class="profile-link"><?php echo $lastkullanicicek['kullanici_ad']; ?></a></h5><p><?php echo $lastkullanicicek['kullanici_country'];  ?></p></a>
		</li>
  <?php  }?>
</ul>


				



			</div>
		</section>

    <!-- Footer
    ================================================= 
		<footer id="footer">
      <div class="container">
      	<div class="row">
          <div class="footer-wrapper">
            <div class="col-md-3 col-sm-3">
              <a href=""><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
              <ul class="list-inline social-icons">
              	<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h6>For individuals</h6>
              <ul class="footer-links">
                <li><a href="">Signup</a></li>
                <li><a href="">login</a></li>
                <li><a href="">Explore</a></li>
                <li><a href="">Finder app</a></li>
                <li><a href="">Features</a></li>
                <li><a href="">Language settings</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h6>For businesses</h6>
              <ul class="footer-links">
                <li><a href="">Business signup</a></li>
                <li><a href="">Business login</a></li>
                <li><a href="">Benefits</a></li>
                <li><a href="">Resources</a></li>
                <li><a href="">Advertise</a></li>
                <li><a href="">Setup</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h6>About</h6>
              <ul class="footer-links">
                <li><a href="">About us</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms</a></li>
                <li><a href="">Help</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-3">
              <h6>Contact Us</h6>
                <ul class="contact">
                	<li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
                	<li><i class="icon ion-ios-email-outline"></i>info@penpaljourney.com</li>
                  <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
                </ul>
            </div>
          </div>
      	</div>
      </div>
      <div class="copyright">
        <p>copyright <a> @penpaljourney</a> 2020. All rights reserved</p>
      </div>
		</footer> -->

    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.appear.min.js"></script>
	<script src="js/jquery.incremental-counter.js"></script>
    <script src="js/script.js"></script>
	<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>


	</body>
</html>
