<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="Penpal Journey is a friendly website to meet new people all over the world. You can practise any language with your new friends. Penpal Journey user number is about to reach 2.200.200 people. We are loss one without you!" />
    <meta name="keywords" content=" penpal, penpals, email pals, pen pal, penpalworld, Social Network, Social Media, Make Friends, Newsfeed, Profile Page, Penpal Journey,Penpal, Free" />
		<meta name="robots" content="index, follow" />
		<title>User Validation</title>

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
              <li class="dropdown"><a href="login.php">Login</a></li>
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
            	<h1 class="text-white">User Validation !</h1>
            	<p>We sent you an email including your <b>validation code </b>. Please check your spam or junk box. With that 8 digits of code you'll validate your account. If you don't receive the code please push the "Send Again" button until you get the code <br /> <br />Why are you waiting for? Buy it now.</p>
              <button class="btn btn-primary">Learn More</button>
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  
                  <li><a href="#login" data-toggle="tab">Validation</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                
                
                <!--Login-->
                <div class="tab-pane active" id="login">
                  <h3>Validation</h3>
                  <p class="text-muted">Please input the 8 digit validation code we sent to your mail in the box below</p>
                  
                  <!--Login Form-->
                  <form action="nedmin/netting/islem.php" role="form" method="POST" name="Login_form" id='Login_form'>

                    <?php 
                    if ($_GET['durum']=="kayitbasarili") {?>

                      <div class="alert alert-danger">
                        <strong>Note!</strong> Register successfull! One more step to join us.
                      </div>

                      <?php } elseif ($_GET['durum']=="farklisifre") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Passwords are doesn't match.
                      </div>

                      <?php } elseif ($_GET['durum']=="validOk") {?>

                      <div class="alert alert-success fontbigger">
                        <strong>Successfull!</strong> Your account approved!<br> Now you can login to your account.
                      </div>

                      <?php } elseif ($_GET['durum']=="eksiksifre") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Password must be 8 characters long.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="no") {?>

                      <div class="alert alert-danger fontbigger">
                        <strong>Alert!</strong> Check your information.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="sent") {?>

                      <div class="alert alert-danger fontbigger">
                        <strong>Mail Sent!</strong> Please check your Spam Box either. If you think you have an error please e-mail us.
                      </div>
                        
                      <?php }
                       ?>





                     <div class="row">
                      <div class="form-group col-xs-12">
                        <input id="my-email" class="form-control input-group-lg" type="text" name="kullanici_mail" title="Enter Your Email" placeholder="Enter Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <input id="my-password" class="form-control input-group-lg"  type="password" name="kullanici_code" title="Enter Validation Code" placeholder="Enter Validation Code"/>
                      </div>
                    </div>
                
                  <button class="btn btn-primary" name="dogrula" >Validate</button><br><br><br>
                  </form><!--Login Form Ends--> 
                </div>

                <div class="tab-pane active" id="login">
                  <h3>Send The Code Again!</h3>
                  <p class="text-muted">You can send the code until it arrives to you.</p>
                  
                 
                  <form action="mail/resend.php" method="POST">
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <input id="my-email" class="form-control input-group-lg" type="text" name="kullanici_mail" title="Enter Your Email" placeholder="Enter Your Email"/>
                      </div>
                    </div>

                  
                  <button class="btn btn-primary" name="resend" >Send</button>


                </form>    
                </div>


<!-- modal 

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h2> Send The Code Again</h2>
  <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary">Click Me</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
           <div class="tab-pane active" id="login">
                  <h3>Send The Code Again!</h3>
                  <p class="text-muted">You can send the code until it arrives to you. <br> Do not forget to check your <b>"Spam Folder"</b></p>
                  
               
                  <form name="Login_form" id='Login_form'>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <input id="my-email" class="form-control input-group-lg" type="text" name="Email" title="Enter Your Email" placeholder="Enter Your Email"/>
                      </div>
                    </div>

                  
                  <button class="btn btn-primary">Send</button>


                </form>
                </div>





      </div>
    </div>
  </div>
</div>
            
</body>

-->






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
