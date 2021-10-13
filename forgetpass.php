<?php
//session çalışsın diye tanımladım
ob_start();
session_start();
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
//belirli veriyi seçme işlemi başlattım

$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id'=>0
));

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail'=>$_SESSION['userkullanici_mail']
));

$say=$kullanicisor->rowCount();

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <meta name="description" content="Penpal Journey is a friendly website to meet new people all over the world. You can practise any language with your new friends. Penpal Journey user number is about to reach 2.200.200 people. We are loss one without you!" />
    <meta name="keywords" content=" penpal, penpals, email pals, pen pal, penpalworld, Social Network, Social Media, Make Friends, Newsfeed, Profile Page, Penpal Journey,Penpal, Free" />
		<meta name="robots" content="index, follow" />
		<title>Penpal Journey | Meet Millions</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	</head>
	<body>

    <!-- Header
    ================================================= -->
		<header id="header-inverse">
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
            <a class="navbar-brand" href="index-register.html"><img src="images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              
              <li class="dropdown"><a href="index.php">Home</a></li>
              <li class="dropdown"><a href="index.php">Learn More</a></li>
               <li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                  <li class="dropdown"><a href="login.php"><button class="btn btn-primary">Login</button></a></li>
                  <li class="dropdown"><a href="register.php"><button class="btn btn-primary">Register</button></a></li> 
                  <br>
                </ul>
              </li>
            </ul>
         
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->
    
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
    	<div class="container wrapper">
        <div class="row">
        	<div class="col-sm-5">
            <div class="intro-texts">
            	<h1 class="text-white">Make Cool Friends !</h1>
            	<p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? Buy it now.</p>
              <button class="btn btn-primary">Learn More</button>
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  
                  <li><a href="#login" data-toggle="tab">FORGOT PASSWORD</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                
                
                <!--Login-->
                <div class="tab-pane active" id="login">
                  <h3>FORGOT PASSWORD</h3>
                  <p class="text-muted">Do not worry! We will send you an email with your new password.<br>
                    Please use <b>once for 30 minutes</b>.<br> In any use of that button creates a <b>new password</b> <br> Late mails may not be usefull to login.


                  </p>

                      <?php 

                      if ($_GET['durum']=="couldnot") {?>

                      <div class="alert alert-danger">
                        <strong>Attention!</strong> Something is wrong.<BR> Maybe you are not member. Try again or reset your password below.
                      </div>

                       <?php } elseif ($_GET['durum']=="ok") {?>

                      <div class="alert alert-success">
                        <strong>New Password Sent!</strong> Please check your Spam & Junk Box.
                      </div>
                        
                      <?php } 
                      ?>


                  
                  <!--Login Form-->
                  <form action="mail/sifremi-unuttum.php" method="POST" role="form" name="Login_form" id='Login_form'>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input required="required" id="my-email" class="form-control input-group-lg" type="Email" name="kullanici_mail" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    
                  <button type="submit" name="sifremiunuttum" class="btn btn-primary">Send New Password</button>
                    </form><!--Login Form Ends--> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">
          
            <!--Social Icons-->
            <ul class="list-inline social-icons">
              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.appear.min.js"></script>
		<script src="js/jquery.incremental-counter.js"></script>
    <script src="js/script.js"></script>
    
	</body>
</html>
