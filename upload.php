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

              <!-- Edit Interests
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-heart-outline"></i>Upload Your Profile Picture</h4>
                  <div class="line"></div>
                  <p class="fontbigger2"> We use same width and height pictures to transform it 400x400px form. <br>Available picture formats are "jpg" and "png" types. <br>To get a perfect pal you should upload an amazing profile picture</p>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  
                  <div class="line"></div>
                  <div class="row">

                    <div  class="row">
                      <div class="form-group col-sm-10">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Current Picture</label><br>
                            <div class="col-sm-9">
                                <img  src="<?php echo $kullanicicek['kullanici_foto'] ?>">
                            </div>
                        </div>

                      </div>
                      
                    </div>




                    <div class="row">
                    <div class="form-group col-sm-4">
                      <form action="nedmin/netting/adminislem.php" method="POST" enctype="multipart/form-data">
                        Select image to upload:<br>
                      <input type="file" name="kullanici_foto" id="fileToUpload">
                      <br>
                      <input type="hidden" name="eski_yol" value="<?php echo $kullanicicek['kullanici_foto'] ?>">
                     <button class="btn btn-primary"name="kullaniciresimguncelle" id="login-update">Update</button>
                      </form>
                    </div>
                    </div>

                    </div>
                  </div>
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


 <?php include 'footer.php' ?>