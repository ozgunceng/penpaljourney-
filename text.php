<?php include 'header.php';  ?>

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
            
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3">
              
               <?php include 'lefteditbar.php' ?>
            </div>
            <div class="col-md-7">

              <!-- Edit Work and Education
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-book-outline"></i>Edit Profile Text</h4>
                  <div class="line"></div>
                  
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <form action="nedmin/netting/islem.php" method="POST" class="form-inline">
                        <?php 
                    if ($_GET['durum']=="kayitbasarili") {?>

                      <div class="alert alert-danger">
                        <strong>Note!</strong> Register successfull! One more step to join us.
                      </div>

                      <?php } elseif ($_GET['durum']=="ok") {?>

                      <div class="alert alert-success">
                        <strong>Saved!</strong> Your new profile text is saved to the database .
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="no") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Something went wrong try again or please check the text again.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="no") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Check your information.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="sent") {?>

                      <div class="alert alert-danger">
                        <strong>Mail Sent!</strong> Please check your Spam Box either. If you think you have an error please e-mail us.
                      </div>
                        
                      <?php }
                       ?>

                    
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="edu-description">Profile Text</label>
                        <textarea id="edu-description" name="kullanici_text" class="form-control fontbigger2" placeholder="Tell us a brief story of you" rows="24" cols="400"><?php echo $kullanicicek['kullanici_text'];   ?></textarea>

                        <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">


                      </div>
                    </div>
                    <div class="row">
                      
                    </div>
                    <button class="btn btn-primary" name="textupdate">Save Changes</button>
                  </form>
                </div>
               
               
              </div>
            </div>
            <div class="col-md-2 static">
              
              <!--Sticky Timeline Activity Sidebar-->
              <div id="sticky-sidebar">
              
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


 <?php

include 'footer.php';


    ?>