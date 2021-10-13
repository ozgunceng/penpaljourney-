 <?php include 'header.php' ?>

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

              <!-- Change Password
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-locked-outline"></i>Change Your Password</h4>
                   <?php 
                    if ($_GET['durum']=="frk") {?>

                      <div class="alert alert-danger">
                        <strong>Passwords are not same!</strong> Please write again.
                      </div>

                      <?php } elseif ($_GET['durum']=="ok") {?>

                      <div class="alert alert-success">
                        <strong>Saved!</strong> Your new profile text is saved to the database .
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="old") {?>

                      <div class="alert alert-danger">
                        <strong>Old password is wrong!</strong> Try again.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="no") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Check your information.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="dif") {?>

                      <div class="alert alert-danger">
                        <strong>Lack of number!</strong> Please write 8 digit at least both of them needs to be same.
                      </div>
                        
                      <?php }
                       ?>


                  <div class="line"></div>
                  <p class="fontbigger2">Feel free to change your password. Do not forget to change It regularly and after a new generated password.</p>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <form action="nedmin/netting/islem.php" method="POST" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password">Old password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="kullanici_eskipassword" title="Enter password" minlength="8" required="required" placeholder="Old password"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label>New password</label>
                        <input class="form-control input-group-lg" type="password" name="kullanici_passwordone" minlength="8" required="required" title="Enter password" placeholder="New password"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Confirm password</label>
                        <input class="form-control input-group-lg" type="password" name="kullanici_passwordtwo" minlength="8" required="required" title="Enter password" placeholder="Confirm password"/>
                      </div>

                         <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">


                    </div>
                    <p><a href="forgetpass.php">Forgot Password?</a></p>
                    <button class="btn btn-primary" name="kullanicisifreguncelle" >Update Password</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-2 static">
              
              <!--Sticky Timeline Activity Sidebar-->
             
            </div>
          </div>
        </div>
      </div>
    </div>
 <?php include 'footer.php' ?>