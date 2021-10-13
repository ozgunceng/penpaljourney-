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

if (isset($_SESSION['userkullanici_mail'])) {


    $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
    $kullanicisor->execute(array(
      'mail' => $_SESSION['userkullanici_mail']
  ));
    $say=$kullanicisor->rowCount();
    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

    //Kullanıcı ID Session Atama
    if (!isset($_SESSION['userkullanici_id'])) {

       $_SESSION['userkullanici_id']=$kullanicicek['kullanici_id'];
   }



}









?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Penpal Journey is a friendly website to meet new people all over the world. You can practise any language with your new friends. Penpal Journey user number is about to reach 2.200.200 people. We are loss one without you!" />
    <meta name="keywords" content=" penpal, penpals, email pals, pen pal, penpalworld, Social Network, Social Media, Make Friends, Newsfeed, Profile Page, Penpal Journey,Penpal, Free" />
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
    <link rel="shortcut icon" type="image/png" href="images/logo200.png"/>
	</head>
  <body>

    <!-- Header
    ================================================= -->
		<header id="header">
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
            <a class="navbar-brand" href="personIndex.php"><img src="images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">

              <li class="dropdown"><a href="personIndex.php">Home</a></li>
              <li class="dropdown"><a href="profile.php">Profile</a></li>
              <li class="dropdown"><a href="lastlogins.php">100 Last</a></li>
              <li class="dropdown"><a href="search.php">Search</a></li>
              <li class="dropdown"><a href="messagesReceived.php">Messages</a></li>
          <?php

          if(!isset($_SESSION['userkullanici_mail']))  {?>


                <?php }else { ?>


              <li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo  substr($kullanicicek['kullanici_ad'],0,10)   ?> <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                  <li><a href="edit.php">Edit </a></li>
                  <li><a href="edit.php">Follows(VIP) </a></li>
                   <li><a href="logout.php">Exit </a></li>
                  
                </ul>
              </li>

              <?php } ?>
              
            </ul>
            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->




