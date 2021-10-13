<?php

include 'header.php';


    ?>

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">

<!--    if($kullanicicek['kullanici_foto']!=NULL && $kullanicicek['kullanici_fotonay']==1 ) -->
                   <img src="
               <?php 
               if($kullanicicek['kullanici_foto']!=NULL ){
                if($kullanicicek['kullanici_fotonay']==1){
               echo $kullanicicek['kullanici_foto'];}
               else{
                echo "images/awaiting.png";
               }
                }
               else
                echo "images/nopic.png";
               ?> "  alt="" class="img-responsive profile-photo" />
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  
                </ul>
                <ul class="follow-me list-inline">
                  
                
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="
               <?php 
               if($kullanicicek['kullanici_foto']!=NULL ){
                if($kullanicicek['kullanici_fotonay']==1){
               echo $kullanicicek['kullanici_foto'];}
               else{
                echo "images/awaiting.png";
               }
                }
               else
                echo "images/nopic.png";
               ?> "  alt="" class="img-responsive profile-photo" />
              
            </div>
            <div class="mobile-menu">
    
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3">
              
              <?php include 'lefteditbar.php' ?>
            </div>
            <div class="col-md-7">

              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Update Profile</h4>
                  <div class="line"></div>

                   <?php 
                    if ($_GET['durum']=="ok") {?>

                      <div class="alert alert-success">
                        <strong>Changes Saved!</strong><br> New informations saved to the database.
                      </div>

                      <?php } elseif ($_GET['durum']=="ok") {?>

                      <div class="alert alert-danger">
                        <strong>Profile Updated!</strong> <br>Please on your profile.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="no") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Something went wrong try again.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="non") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Check your information.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="sent") {?>

                      <div class="alert alert-danger">
                        <strong>Mail Sent!</strong> Please check your Spam Box either. If you think you have an error please e-mail us.
                      </div>
                        
                      <?php }
                       ?>


                  <p class="fontbigger2">Feel free to update your profile! To find your best pal, we recommend you to write a good profile text with an amazing picture.</p>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <form action="nedmin/netting/islem.php" method="POST" class="form-inline">
                    <div class="row">
                       <div class="form-group col-xs-6">
                        <b>Current Country</b>
                        <label for="country" class="sr-only"></label>
                          <select required="required" class="form-control" name="kullanici_country" id="country">
                                   <option value="<?php echo $kullanicicek['kullanici_country'] ?>"><?php echo $kullanicicek['kullanici_country'] ?></option>
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
                                   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
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


                     <div class="form-group col-xs-6"><b>Birth Country</b>
                        <label for="country" class="sr-only"><b>Birth Country</b></label>
                          <select required="required" class="form-control" name="kullanici_Bcountry" id="country">
                                   <option value="<?php echo $kullanicicek['kullanici_Bcountry'] ?>" ><?php echo $kullanicicek['kullanici_Bcountry'] ?></option>
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
                                   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
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

                      <div class="form-group col-xs-6">
                        <b>Mother Language</b>
                            <label for="country" class="sr-only"> </label>
                               <select required="required" class="form-control" name="kullanici_dil" id="dil">
                          <option value="<?php echo $kullanicicek['kullanici_dil'] ?>"><?php echo $kullanicicek['kullanici_dil'] ?></option>
                          <option value="Afrikaans">Afrikaans</option>
                          <option value="Albanian">Albanian - shqip</option>
                          <option value="Amharic">Amharic - አማርኛ</option>
                          <option value="Arabic">Arabic - العربية</option>
                          <option value="Aragonese">Aragonese - aragonés</option>
                          <option value="Armenian">Armenian - հայերեն</option>
                          <option value="Asturian">Asturian - asturianu</option>
                          <option value="Azerbaijani">Azerbaijani - azərbaycan dili</option>
                          <option value="Basque">Basque - euskara</option>
                          <option value="Belarusian">Belarusian - беларуская</option>
                          <option value="Bengali">Bengali - বাংলা</option>
                          <option value="Bosnian">Bosnian - bosanski</option>
                          <option value="Breton">Breton - brezhoneg</option>
                          <option value="Bulgarian">Bulgarian - български</option>
                          <option value="Catalan">Catalan - català</option>
                          <option value="Kurdish">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                          <option value="Chinese">Chinese - 中文</option>
                          <option value="Corsican">Corsican</option>
                          <option value="Croatian">Croatian - hrvatski</option>
                          <option value="Czech">Czech - čeština</option>
                          <option value="Danish">Danish - dansk</option>
                          <option value="Dutch">Dutch - Nederlands</option>
                          <option value="English">English</option>
                          <option value="English">English (United Kingdom)</option>
                          <option value="English">English (United States)</option>
                          <option value="Esperanto">Esperanto - esperanto</option>
                          <option value="Estonian">Estonian - eesti</option>
                          <option value="Faroese">Faroese - føroyskt</option>
                          <option value="Filipino">Filipino</option>
                          <option value="Finnish">Finnish - suomi</option>
                          <option value="French">French - français</option>
                          <option value="Galician">Galician - galego</option>
                          <option value="Georgian">Georgian - ქართული</option>
                          <option value="German">German - Deutsch</option>
                          <option value="Greek">Greek - Ελληνικά</option>
                          <option value="Guarani">Guarani</option>
                          <option value="Gujarati">Gujarati - ગુજરાતી</option>
                          <option value="Hausa">Hausa</option>
                          <option value="Hawaiian">Hawaiian - ʻŌlelo Hawaiʻi</option>
                          <option value="Hebrew">Hebrew - עברית</option>
                          <option value="Hindi">Hindi - हिन्दी</option>
                          <option value="Hungarian">Hungarian - magyar</option>
                          <option value="Icelandic">Icelandic - íslenska</option>
                          <option value="Indonesian">Indonesian - Indonesia</option>
                          <option value="Interlingua">Interlingua</option>
                          <option value="Irish">Irish - Gaeilge</option>
                          <option value="Italian">Italian - italiano</option>
                          <option value="Japanese">Japanese - 日本語</option>
                          <option value="Kannada">Kannada - ಕನ್ನಡ</option>
                          <option value="Kazakh">Kazakh - қазақ тілі</option>
                          <option value="Khmer">Khmer - ខ្មែរ</option>
                          <option value="Korean">Korean - 한국어</option>
                          <option value="Kurdish">Kurdish - Kurdî</option>
                          <option value="Kyrgyz">Kyrgyz - кыргызча</option>
                          <option value="Lao">Lao - ລາວ</option>
                          <option value="Latin">Latin</option>
                          <option value="Latvian">Latvian - latviešu</option>
                          <option value="Lingala">Lingala - lingála</option>
                          <option value="Lithuanian">Lithuanian - lietuvių</option>
                          <option value="Macedonian">Macedonian - македонски</option>
                          <option value="Malay">Malay - Bahasa Melayu</option>
                          <option value="Malayalam">Malayalam - മലയാളം</option>
                          <option value="Maltese">Maltese - Malti</option>
                          <option value="Marathi">Marathi - मराठी</option>
                          <option value="Mongolian">Mongolian - монгол</option>
                          <option value="Nepali">Nepali - नेपाली</option>
                          <option value="Norwegian">Norwegian - norsk</option>
                          <option value="Occitan">Occitan</option>
                          <option value="Oriya">Oriya - ଓଡ଼ିଆ</option>
                          <option value="Oromo">Oromo - Oromoo</option>
                          <option value="Pashto">Pashto - پښتو</option>
                          <option value="Persian">Persian - فارسی</option>
                          <option value="Polish">Polish - polski</option>
                          <option value="Portuguese">Portuguese - português</option>
                          <option value="Punjabi">Punjabi - ਪੰਜਾਬੀ</option>
                          <option value="Quechua">Quechua</option>
                          <option value="Romanian">Romanian - română</option>
                          <option value="Romansh">Romansh - rumantsch</option>
                          <option value="Russian">Russian - русский</option>
                          <option value="Scottish">Scottish Gaelic</option>
                          <option value="Serbian">Serbian - српски</option>
                          <option value="Serbo-Croatian">Serbo-Croatian - Srpskohrvatski</option>
                          <option value="Shona">Shona - chiShona</option>
                          <option value="Sindhi">Sindhi</option>
                          <option value="Sinhala">Sinhala - සිංහල</option>
                          <option value="Slovak">Slovak - slovenčina</option>
                          <option value="Slovenian">Slovenian - slovenščina</option>
                          <option value="Somali">Somali - Soomaali</option>
                          <option value="Southern Sotho">Southern Sotho</option>
                          <option value="Spanish">Spanish - español</option>
                          <option value="Sundanese">Sundanese</option>
                          <option value="Swahili">Swahili - Kiswahili</option>
                          <option value="Swedish">Swedish - svenska</option>
                          <option value="Tajik">Tajik - тоҷикӣ</option>
                          <option value="Tamil">Tamil - தமிழ்</option>
                          <option value="Tatar">Tatar</option>
                          <option value="Telugu">Telugu - తెలుగు</option>
                          <option value="Thai">Thai - ไทย</option>
                          <option value="Tigrinya">Tigrinya - ትግርኛ</option>
                          <option value="Tongan">Tongan - lea fakatonga</option>
                          <option value="Turkish">Turkish - Türkçe</option>
                          <option value="Turkmen">Turkmen</option>
                          <option value="Twi">Twi</option>
                          <option value="Ukrainian">Ukrainian - українська</option>
                          <option value="Urdu">Urdu - اردو</option>
                          <option value="Uyghur">Uyghur</option>
                          <option value="Uzbek">Uzbek - o‘zbek</option>
                          <option value="Vietnamese">Vietnamese - Tiếng Việt</option>
                          <option value="Walloon">Walloon - wa</option>
                          <option value="Welsh">Welsh - Cymraeg</option>
                          <option value="Western Frisian">Western Frisian</option>
                          <option value="Xhosa">Xhosa</option>
                          <option value="Yiddish">Yiddish</option>
                          <option value="Yoruba">Yoruba - Èdè Yorùbá</option>
                          <option value="Zulu">Zulu - isiZulu</option>
                      </select>
                      </div>


                    <div class="row">

                      <div class="form-group col-sm-6 col-xs-6"><b> Relationship Status </b>
                        <label for="gender" class="sr-only"></label>
                        <select required="required" name="kullanici_iliski"  class="form-control" id="month">
                          <option value="<?php echo $kullanicicek['kullanici_iliski'] ?>" ><?php echo $kullanicicek['kullanici_iliski'] ?></option>
                          <option value="Single">Single</option>
                          <option value="In a Relationship">In a Relationship</option>
                          <option value="Engaged">Engaged</option>
                          <option value="Married">Married</option>
                          <option value="It's Complicated">It's Complicated</option>
                          <option value="In an Open Relationship">In an Open Relationship</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Seperated">Seperated</option>
                          <option value="Divorced">Divorced</option>
                          <option value="In a Civil Union">In a Civil Union</option>
                          <option value="In a Domestic Partnership">In a Domestic Partnership</option>
                        </select>
                      </div>  
                      

                    </div>

                 
                 
                      <div class="form-group col-sm-6 col-xs-6"> <b> Looking For? </b>
                        <label for="gender" class="sr-only"></label>
                        <select required name="kullanici_lookGen"  class="form-control" id="month">
                          <option value="<?php echo $kullanicicek['kullanici_lookGen'] ?>" ><?php echo $kullanicicek['kullanici_lookGen'] ?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="LGBTQ">LGBTQ</option>
                          <option value="Female/Male">Female/Male</option>
                          <option value="Female/LGBTQ">Female/LGBTQ</option>
                          <option value="Male/LGBTQ">Male/LGBTQ</option>
                        </select>
                      </div>     
                 



                                          
                      <div class="form-group col-xs-12">
                        <label for="power">Special Power</label>
                        <input id="power" class="form-control input-group-lg" type="text" name="kullanici_special" title="Power" placeholder="Write Your Special Power" value="<?php echo $kullanicicek['kullanici_special'] ?>" />
                      </div>

                      <div class="form-group col-xs-12">
                        <label for="power">Job</label>
                        <input id="power" class="form-control input-group-lg" type="text" name="kullanici_meslek" title="Power" placeholder="Do you work?" value="<?php echo $kullanicicek['kullanici_meslek'] ?>" />
                      </div>

                                          
                    </div>

                    <div class="row">

                      <div class="form-group col-xs-3">
                        <label for="power">Penpal Age Range</label>
                        <input id="power" class=" form-control input-group-lg" type="number" name="kullanici_lookAgeOne" title="Power" placeholder="From" value="<?php echo $kullanicicek['kullanici_lookAgeOne'] ?>" />
                      </div>

                      <div class="form-group col-xs-3">
                        <label for="power">To</label>
                        <input id="power" class=" form-control input-group-lg" type="number" name="kullanici_lookAgeTwo" title="Power" placeholder="To" value="<?php echo $kullanicicek['kullanici_lookAgeTwo'] ?>" />  
                      </div>
                      
                    </div>



                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="Instagram">Instagram Username (Optional) </label>
                        <input id="Instagram" class="form-control input-group-lg" type="text" name="kullanici_insta" title="Instagram" placeholder="Instagram" value="<?php echo $kullanicicek['kullanici_insta'] ?>" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="Snapchat">Snapchat Username (Optional) </label>
                        <input id="Snapchat" class="form-control input-group-lg" type="text" name="kullanici_snap" title="Snapchat" placeholder="Snapchat" value="<?php echo $kullanicicek['kullanici_snap'] ?>" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="band">Favorite Band</label>
                        <input  class="form-control input-group-lg" type="text" name="kullanici_band" title="band" placeholder="Coldplay or System Of A Down?" value="<?php echo $kullanicicek['kullanici_band'] ?>" />
                      </div>
                    </div>


                  
                    
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="city"> My city</label>
                        <input id="city" class="form-control input-group-lg" type="text" name="kullanici_city" title="Enter city" placeholder="Your city" value="<?php echo $kullanicicek['kullanici_city'] ?>"/>
                      </div>


                    </div>

                      <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">


                    <button class="btn btn-primary" name="kullanicibasicupdate" >Save Changes</button>
                  </form>
                </div>
              </div>
            </div>

            
            <div class="col-md-2 static">
              
            
            </div>
          </div>
        </div>
      </div>
    </div>


<?php

include 'footer.php';


    ?>