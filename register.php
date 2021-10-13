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
    <link rel="shortcut icon" type="image/png" href="images/logo200.png"/>
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
            <a class="navbar-brand" href="register.php"><img src="images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
                           <li class="dropdown"><a href="index.php">Index</a></li>
              <li class="dropdown"><a href="learn.php">Learn More</a></li>
              <li class="dropdown"><a href="searchFree.php">Search People</a></li>
              
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
              <img src="images/logo200w.png" alt="Penpal Journey"/><br><br>
              <p class="fontbigger">This is another planet! Millions waiting inside come and join. <br /> <br /></p>
              <button class="btn btn-primary">Learn More</button>
            </div>
          </div>
          <div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                  <li><a href="#login" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane active" id="register">
                  <h3>Register Now !!!</h3>
                  <p class="text-muted">Be cool and join today. Meet millions</p>
                  
                  <!--Register Form-->
                  <form action="mail/kayitvalidation.php" role="form" method="POST" name="registration_form" id='registration_form' class="form-inline">

                 <?php 

                      if ($_GET['durum']=="farklisifre") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Passwords are doesn't match.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="eksiksifre") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Password must be 8 characters long.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> That user is on our database already.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="basarisiz") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Register couldn't be complete.Please e-mail us.
                      </div>
                        
                      <?php }
                       ?>

















                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="username" class="sr-only">Username</label>
                        <input required="required" minlength="5" maxlength="65" id="username" class="form-control input-group-lg" type="text" name="kullanici_ad" title="Username" placeholder="Username"/>
                      </div>
                    </div>
                    
                 <!--   <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="firstname" class="sr-only">First Name</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="First name"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname" class="sr-only">Last Name</label>
                        <input id="lastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name"/>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control input-group-lg" type="email" name="kullanici_mail" title="Enter Email" placeholder="Your Email" required="required" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Password</label>
                        <input required="required" minlength="8" id="password" class="form-control input-group-lg" type="password" name="kullanici_passwordone" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Password Again</label>
                        <input required="required" minlength="8" id="password" class="form-control input-group-lg" type="password" name="kullanici_passwordtwo" title="Enter password" placeholder="Password Again"/>
                      </div>
                    </div>


                    <div class="row">
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="gender" class="sr-only"></label>
                        <select required="required" name="kullanici_gender" class="form-control" id="month">
                          <option value="month" disabled selected>Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="LGBTQ">LGBTQ</option>
                        </select>
                      </div>   
                    </div>


                    <div class="row">
                      <p class="birth"><strong>Date of Birth</strong></p>
                      <div  class="form-group col-sm-3 col-xs-6">
                        <label  for="month" class="sr-only"></label>
                        <select required="required" name="kullanici_gun" class="form-control" id="day">
                          <option value="Day" disabled selected>Day</option>
                          <option value="1" >1</option>
                          <option value="2" >2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="month" class="sr-only"></label>
                        <select required="required" name="kullanici_ay" class="form-control" id="month">
                          <option value="month" disabled selected>Month</option>
                          <option value="1">Jan</option>
                          <option value="2">Feb</option>
                          <option value="3">Mar</option>
                          <option value="4">Apr</option>
                          <option value="5">May</option>
                          <option value="6">Jun</option>
                          <option value="7">Jul</option>
                          <option value="8">Aug</option>
                          <option value="9">Sep</option>
                          <option value="10">Oct</option>
                          <option value="11">Nov</option>
                          <option value="12">Dec</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                        <label for="year" class="sr-only"></label>
                        <select required="required" name="kullanici_yil" class="form-control" id="year">
                          <option value="year" disabled selected>Year</option>
                          <option value="1930">1930</option>
                          <option value="1931">1931</option>
                          <option value="1932">1932</option>
                          <option value="1933">1933</option>
                          <option value="1934">1934</option>
                          <option value="1935">1935</option>
                          <option value="1936">1936</option>    
                          <option value="1937">1937</option>
                          <option value="1938">1938</option>
                          <option value="1939">1939</option>
                          <option value="1940">1940</option>
                          <option value="1941">1941</option>
                          <option value="1942">1942</option>                         
                          <option value="1943">1943</option>
                          <option value="1944">1944</option>
                          <option value="1945">1945</option>
                          <option value="1946">1946</option>
                          <option value="1947">1947</option>
                          <option value="1948">1948</option>
                          <option value="1949">1949</option>
                          <option value="1950">1950</option>
                          <option value="1951">1951</option>
                          <option value="1952">1952</option>
                          <option value="1953">1953</option>
                          <option value="1954">1954</option>
                          <option value="1955">1955</option>
                          <option value="1956">1956</option>
                          <option value="1957">1957</option>
                          <option value="1958">1958</option>
                          <option value="1959">1959</option>
                          <option value="1960">1960</option>
                          <option value="1961">1961</option>
                          <option value="1962">1962</option>
                          <option value="1963">1963</option>
                          <option value="1964">1964</option>
                          <option value="1965">1965</option>
                          <option value="1966">1966</option>
                          <option value="1967">1967</option>
                          <option value="1968">1968</option>
                          <option value="1969">1969</option>
                          <option value="1970">1970</option>
                          <option value="1971">1971</option>
                          <option value="1972">1972</option>
                          <option value="1973">1973</option>
                          <option value="1974">1974</option>
                          <option value="1975">1975</option>
                          <option value="1976">1976</option>
                          <option value="1977">1977</option>
                          <option value="1978">1978</option>
                          <option value="1979">1979</option>
                          <option value="1980">1980</option>
                          <option value="1981">1981</option>
                          <option value="1982">1982</option>
                          <option value="1983">1983</option>
                          <option value="1984">1984</option>
                          <option value="1985">1985</option>
                          <option value="1986">1986</option>
                          <option value="1987">1987</option>
                          <option value="1988">1988</option>
                          <option value="1989">1989</option>
                          <option value="1990">1990</option>
                          <option value="1991">1991</option>
                          <option value="1992">1992</option>
                          <option value="1993">1993</option>
                          <option value="1994">1994</option>
                          <option value="1995">1995</option>
                          <option value="1996">1996</option>
                          <option value="1997">1997</option>
                          <option value="1998">1998</option>
                          <option value="1999">1999</option>
                          <option value="2000">2000</option>
                          <option value="2001">2001</option>
                          <option value="2003">2002</option>
                          <option value="2004">2004</option>
                          <option value="2005">2005</option>
                          <option value="2006">2006</option>
                          <option value="2007">2007</option>
                          <option value="2008">2008</option>
                          <option value="2009">2009</option>
                          <option value="2010">2010</option>
                          <option value="2011">2011</option>
                          <option value="2012">2012</option>
                        </select>
                      </div>
                    </div>


                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="city" class="sr-only">City</label>
                        <input name="kullanici_city" required="required"  id="city" class="form-control input-group-lg reg_name" type="text" name="city" title="Enter city" placeholder="Your city"/>
                      </div>




                      <div class="form-group col-xs-6">
                        <label for="country" class="sr-only"></label>
                          <select required="required" class="form-control" name="kullanici_country" id="country">
                                   <option value="month" disabled selected>Country</option>
                                   <option value="Afganistan">Afghanistan</option>
                                   <option value="Albania">Albania</option>
                                   <option value="Algeria">Algeria</option>
                                   <option value="American Samoa">American Samoa</option>
                                   <option value="Andorra">Andorra</option>
                                   <option value="Angola">Angola</option>
                                   <option value="Anguilla">Anguilla</option>
                                   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                   <option value="Argentina">Argentina</option>
                                   <option value="Armenia">Armenia</option>
                                   <option value="Aruba">Aruba</option>
                                   <option value="Australia">Australia</option>
                                   <option value="Austria">Austria</option>
                                   <option value="Azerbaijan">Azerbaijan</option>
                                   <option value="Bahamas">Bahamas</option>
                                   <option value="Bahrain">Bahrain</option>
                                   <option value="Bangladesh">Bangladesh</option>
                                   <option value="Barbados">Barbados</option>
                                   <option value="Belarus">Belarus</option>
                                   <option value="Belgium">Belgium</option>
                                   <option value="Belize">Belize</option>
                                   <option value="Benin">Benin</option>
                                   <option value="Bermuda">Bermuda</option>
                                   <option value="Bhutan">Bhutan</option>
                                   <option value="Bolivia">Bolivia</option>
                                   <option value="Bonaire">Bonaire</option>
                                   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                   <option value="Botswana">Botswana</option>
                                   <option value="Brazil">Brazil</option>
                                   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                   <option value="Brunei">Brunei</option>
                                   <option value="Bulgaria">Bulgaria</option>
                                   <option value="Burkina Faso">Burkina Faso</option>
                                   <option value="Burundi">Burundi</option>
                                   <option value="Cambodia">Cambodia</option>
                                   <option value="Cameroon">Cameroon</option>
                                   <option value="Canada">Canada</option>
                                   <option value="Canary Islands">Canary Islands</option>
                                   <option value="Cape Verde">Cape Verde</option>
                                   <option value="Cayman Islands">Cayman Islands</option>
                                   <option value="Central African Republic">Central African Republic</option>
                                   <option value="Chad">Chad</option>
                                   <option value="Channel Islands">Channel Islands</option>
                                   <option value="Chile">Chile</option>
                                   <option value="China">China</option>
                                   <option value="Christmas Island">Christmas Island</option>
                                   <option value="Cocos Island">Cocos Island</option>
                                   <option value="Colombia">Colombia</option>
                                   <option value="Comoros">Comoros</option>
                                   <option value="Congo">Congo</option>
                                   <option value="Cook Islands">Cook Islands</option>
                                   <option value="Costa Rica">Costa Rica</option>
                                   <option value="Cote DIvoire">Cote DIvoire</option>
                                   <option value="Croatia">Croatia</option>
                                   <option value="Cuba">Cuba</option>
                                   <option value="Curaco">Curacao</option>
                                   <option value="North Cyprus">North Cyprus</option>
                                   <option value="South Cyprus">South Cyprus</option>
                                   <option value="Czech Republic">Czech Republic</option>
                                   <option value="Denmark">Denmark</option>
                                   <option value="Djibouti">Djibouti</option>
                                   <option value="Dominica">Dominica</option>
                                   <option value="Dominican Republic">Dominican Republic</option>
                                   <option value="East Timor">East Timor</option>
                                   <option value="Ecuador">Ecuador</option>
                                   <option value="Egypt">Egypt</option>
                                   <option value="El Salvador">El Salvador</option>
                                   <option value="Equatorial Guinea">Equatorial Guinea</option>
                                   <option value="Eritrea">Eritrea</option>
                                   <option value="Estonia">Estonia</option>
                                   <option value="Ethiopia">Ethiopia</option>
                                   <option value="Falkland Islands">Falkland Islands</option>
                                   <option value="Faroe Islands">Faroe Islands</option>
                                   <option value="Fiji">Fiji</option>
                                   <option value="Finland">Finland</option>
                                   <option value="France">France</option>
                                   <option value="French Guiana">French Guiana</option>
                                   <option value="French Polynesia">French Polynesia</option>
                                   <option value="French Southern Ter">French Southern Ter</option>
                                   <option value="Gabon">Gabon</option>
                                   <option value="Gambia">Gambia</option>
                                   <option value="Georgia">Georgia</option>
                                   <option value="Germany">Germany</option>
                                   <option value="Ghana">Ghana</option>
                                   <option value="Gibraltar">Gibraltar</option>
                                   <option value="Great Britain">Great Britain</option>
                                   <option value="Greece">Greece</option>
                                   <option value="Greenland">Greenland</option>
                                   <option value="Grenada">Grenada</option>
                                   <option value="Guadeloupe">Guadeloupe</option>
                                   <option value="Guam">Guam</option>
                                   <option value="Guatemala">Guatemala</option>
                                   <option value="Guinea">Guinea</option>
                                   <option value="Guyana">Guyana</option>
                                   <option value="Haiti">Haiti</option>
                                   <option value="Hawaii">Hawaii</option>
                                   <option value="Honduras">Honduras</option>
                                   <option value="Hong Kong">Hong Kong</option>
                                   <option value="Hungary">Hungary</option>
                                   <option value="Iceland">Iceland</option>
                                   <option value="Indonesia">Indonesia</option>
                                   <option value="India">India</option>
                                   <option value="Iran">Iran</option>
                                   <option value="Iraq">Iraq</option>
                                   <option value="Ireland">Ireland</option>
                                   <option value="Isle of Man">Isle of Man</option>
                                   <option value="Israel">Israel</option>
                                   <option value="Italy">Italy</option>
                                   <option value="Jamaica">Jamaica</option>
                                   <option value="Japan">Japan</option>
                                   <option value="Jordan">Jordan</option>
                                   <option value="Kazakhstan">Kazakhstan</option>
                                   <option value="Kenya">Kenya</option>
                                   <option value="Kiribati">Kiribati</option>
                                   <option value="Korea North">Korea North</option>
                                   <option value="Korea South">Korea South</option>
                                   <option value="Kuwait">Kuwait</option>
                                   <option value="Kyrgyzstan">Kyrgyzstan</option>
                                   <option value="Laos">Laos</option>
                                   <option value="Latvia">Latvia</option>
                                   <option value="Lebanon">Lebanon</option>
                                   <option value="Lesotho">Lesotho</option>
                                   <option value="Liberia">Liberia</option>
                                   <option value="Libya">Libya</option>
                                   <option value="Liechtenstein">Liechtenstein</option>
                                   <option value="Lithuania">Lithuania</option>
                                   <option value="Luxembourg">Luxembourg</option>
                                   <option value="Macau">Macau</option>
                                   <option value="Macedonia">Macedonia</option>
                                   <option value="Madagascar">Madagascar</option>
                                   <option value="Malaysia">Malaysia</option>
                                   <option value="Malawi">Malawi</option>
                                   <option value="Maldives">Maldives</option>
                                   <option value="Mali">Mali</option>
                                   <option value="Malta">Malta</option>
                                   <option value="Marshall Islands">Marshall Islands</option>
                                   <option value="Martinique">Martinique</option>
                                   <option value="Mauritania">Mauritania</option>
                                   <option value="Mauritius">Mauritius</option>
                                   <option value="Mayotte">Mayotte</option>
                                   <option value="Mexico">Mexico</option>
                                   <option value="Midway Islands">Midway Islands</option>
                                   <option value="Moldova">Moldova</option>
                                   <option value="Monaco">Monaco</option>
                                   <option value="Mongolia">Mongolia</option>
                                   <option value="Montserrat">Montserrat</option>
                                   <option value="Morocco">Morocco</option>
                                   <option value="Mozambique">Mozambique</option>
                                   <option value="Myanmar">Myanmar</option>
                                   <option value="Nambia">Nambia</option>
                                   <option value="Nauru">Nauru</option>
                                   <option value="Nepal">Nepal</option>
                                   <option value="Netherland Antilles">Netherland Antilles</option>
                                   <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                   <option value="Nevis">Nevis</option>
                                   <option value="New Caledonia">New Caledonia</option>
                                   <option value="New Zealand">New Zealand</option>
                                   <option value="Nicaragua">Nicaragua</option>
                                   <option value="Niger">Niger</option>
                                   <option value="Nigeria">Nigeria</option>
                                   <option value="Niue">Niue</option>
                                   <option value="Norfolk Island">Norfolk Island</option>
                                   <option value="Norway">Norway</option>
                                   <option value="Oman">Oman</option>
                                   <option value="Pakistan">Pakistan</option>
                                   <option value="Palau Island">Palau Island</option>
                                   <option value="Palestine">Palestine</option>
                                   <option value="Panama">Panama</option>
                                   <option value="Papua New Guinea">Papua New Guinea</option>
                                   <option value="Paraguay">Paraguay</option>
                                   <option value="Peru">Peru</option>
                                   <option value="Phillipines">Philippines</option>
                                   <option value="Pitcairn Island">Pitcairn Island</option>
                                   <option value="Poland">Poland</option>
                                   <option value="Portugal">Portugal</option>
                                   <option value="Puerto Rico">Puerto Rico</option>
                                   <option value="Qatar">Qatar</option>
                                   <option value="Republic of Montenegro">Republic of Montenegro</option>
                                   <option value="Republic of Serbia">Republic of Serbia</option>
                                   <option value="Reunion">Reunion</option>
                                   <option value="Romania">Romania</option>
                                   <option value="Russia">Russia</option>
                                   <option value="Rwanda">Rwanda</option>
                                   <option value="St Barthelemy">St Barthelemy</option>
                                   <option value="St Eustatius">St Eustatius</option>
                                   <option value="St Helena">St Helena</option>
                                   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                   <option value="St Lucia">St Lucia</option>
                                   <option value="St Maarten">St Maarten</option>
                                   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                   <option value="Saipan">Saipan</option>
                                   <option value="Samoa">Samoa</option>
                                   <option value="Samoa American">Samoa American</option>
                                   <option value="San Marino">San Marino</option>
                                   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                   <option value="Saudi Arabia">Saudi Arabia</option>
                                   <option value="Senegal">Senegal</option>
                                   <option value="Seychelles">Seychelles</option>
                                   <option value="Sierra Leone">Sierra Leone</option>
                                   <option value="Singapore">Singapore</option>
                                   <option value="Slovakia">Slovakia</option>
                                   <option value="Slovenia">Slovenia</option>
                                   <option value="Solomon Islands">Solomon Islands</option>
                                   <option value="Somalia">Somalia</option>
                                   <option value="South Africa">South Africa</option>
                                   <option value="Spain">Spain</option>
                                   <option value="Sri Lanka">Sri Lanka</option>
                                   <option value="Sudan">Sudan</option>
                                   <option value="Suriname">Suriname</option>
                                   <option value="Swaziland">Swaziland</option>
                                   <option value="Sweden">Sweden</option>
                                   <option value="Switzerland">Switzerland</option>
                                   <option value="Syria">Syria</option>
                                   <option value="Tahiti">Tahiti</option>
                                   <option value="Taiwan">Taiwan</option>
                                   <option value="Tajikistan">Tajikistan</option>
                                   <option value="Tanzania">Tanzania</option>
                                   <option value="Thailand">Thailand</option>
                                   <option value="Togo">Togo</option>
                                   <option value="Tokelau">Tokelau</option>
                                   <option value="Tonga">Tonga</option>
                                   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                   <option value="Tunisia">Tunisia</option>
                                   <option value="Turkey">Turkey</option>
                                   <option value="Turkmenistan">Turkmenistan</option>
                                   <option value="Turks & Caicos Is">Turks & Caicos Islands</option>
                                   <option value="Tuvalu">Tuvalu</option>
                                   <option value="Uganda">Uganda</option>
                                   <option value="United Kingdom">United Kingdom</option>
                                   <option value="Ukraine">Ukraine</option>
                                   <option value="United Arab Erimates">United Arab Emirates</option>
                                   <option value="United States of America">United States of America</option>
                                   <option value="Uraguay">Uruguay</option>
                                   <option value="Uzbekistan">Uzbekistan</option>
                                   <option value="Vanuatu">Vanuatu</option>
                                   <option value="Vatican City State">Vatican City State</option>
                                   <option value="Venezuela">Venezuela</option>
                                   <option value="Vietnam">Vietnam</option>
                                   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                   <option value="Wake Island">Wake Island</option>
                                   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                   <option value="Yemen">Yemen</option>
                                   <option value="Zaire">Zaire</option>
                                   <option value="Zambia">Zambia</option>
                                   <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                      </div>


                    </div>
                  <!--Register Now Form Ends-->
                  <p><a href="login.php">Already have an account?</a></p>
                  <button type="submit" name="kullanicikaydet" class="btn btn-primary">Register Now</button>
                </form>
                </div><!--Registration Form Contents Ends-->
                
                <!--Login-->
                <div class="tab-pane" id="login">
                  <h3>Login</h3>
                  <p class="text-muted">Login to your account</p>
                  
                  <!--Login Form-->
                  <form action="nedmin/netting/islem.php" method="POST" role="form"  name="Login_form" id='Login_form'>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input required="required" id="my-email" class="form-control input-group-lg" type="email" name="kullanici_mail" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input maxlength="8" required="required" id="my-password" class="form-control input-group-lg" type="password" name="kullanici_password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>
                      <!--Login Form Ends--> 
                       <p><a href="forgetpass.php">Forgot Password?</a></p>
                        <button type="submit" name="kullanicigiris" class="btn btn-primary">Login Now</button>
                  </form>


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
