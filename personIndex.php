<?php

include 'header.php';


    ?>

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
   
            <div class="row">
              <div class="col-md-12">
                <br><br>

              <center>  <img src="images/logo200wb.png" > </center><br><br>
                

                 <center>  <h4 class="grey2">  Welcome  <b class="boldie"><?php echo $kullanicicek['kullanici_ad'] ?></b>  </h4>  
                  <p class="text-muted fontbigger">Feel Free To <a href="edit.php" > Edit </a> Your Profile </p></center>
                <div class="profile-info">
 
                </div>
              </div>
             
            </div>
       <!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->


        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- About
              ================================================= -->
              <div class="about-profile">

                <div class="row">
                  <div class="col">
                <div class="about-content-block">
                <h4 class="grey fontbigger "><i class="ion-ios-information-outline icon-in-title"></i>We recommend you to edit your <a href="text.php" > profile text</a></h4>
                  <ul>
                    <li class="fontbigger"><a href="upload.php">Upload</a> Your Profile Picture</li><br>
                    <li class="fontbigger">Write your <a href="edit.php">State/Province</a></li><br>                
                   </ul>
                  <p class="fontbigger">Do not forget to change your <a href="editpass.php" >password</a> regularly!</p>
                </div>
                   </div>
                   <div class="col">

                <div class="about-content-block">
                <h4 class="grey fontbigger "><i class="ion-ios-information-outline icon-in-title"></i>What you can do?</h4>
                <ul>
                    <li class="fontbigger">You can see who viewed your profile</li><br>
                    <li class="fontbigger"><a href="search.php">Search </a> other penpals</li><br>                    
                    <li class="fontbigger">Look at your <a href="profile.php">comments</a></li><br>                    
                </ul>
                  <p class="fontbigger">Do not forget to change your password regularly!</p>
                </div>
                  </div>
                </div>
                 

            </div>
               <div class="people-nearby">
              <div class="about-content-block">
                <center>  <h4 class="grey2">  LAST  <b class="boldie">25</b> LOGIN  </h4> <BR> </center>
                </div>
              
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


              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
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
               ?> "  alt="" class="profile-photo-lg" />


                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h4 class="grey">
                      <a href="profileShow.php?kullanici_id=<?php echo $lastkullanicicek['kullanici_id'] ?>"><?php echo $lastkullanicicek['kullanici_ad']; ?></a>

                      <b> AGE

                       <?php
                         date_default_timezone_set('Europe/Istanbul');
                         $age=$lastkullanicicek['kullanici_yil'];
                         $today=date("Y");
                         $result=$today-$age;
                         echo $result;

                        ?> 


                       </b>
                      <br><br><b> <?php echo $lastkullanicicek['kullanici_country']; ?></b> <img src="images/flags/<?php echo $lastkullanicicek['kullanici_country']; ?>.png"/></h4>




                    <p class="fontbigger2"> looking for <b><?php echo $lastkullanicicek['kullanici_lookGen']; ?></b> between <b> <?php echo $lastkullanicicek['kullanici_lookAgeOne']; ?></b> and <b><?php echo $lastkullanicicek['kullanici_lookAgeTwo']; ?></b></p>

                    <p class="fontbigger2"> <i>"<?php echo substr( $lastkullanicicek['kullanici_text'],0,100) ?>" </i></p>

<hr>
                    <p class="text-muted fontbigger2">

                     Seen <b> 


 <?php

date_default_timezone_set('Europe/Istanbul');
   echo date("H:i", strtotime($lastlogincek['last_time'])); 

   ?>

                      </b> 


                      joined in

                     <b>
                   <?php date_default_timezone_set('Europe/Istanbul'); ?>
                   <?php  echo date("M", strtotime($lastkullanicicek['kullanici_zaman'])); ?> 
                  
                   <?php  echo date("d", strtotime($lastkullanicicek['kullanici_zaman'])); ?> 
                    
                   <?php  echo date("Y", strtotime($lastkullanicicek['kullanici_zaman'])); ?>




                     </b>
                    </p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                   <a href="profileShow.php?kullanici_id=<?php echo $lastkullanicicek['kullanici_id']?>"> <button class="btn btn-primary pull-right">Send Message</button> </a>
                  </div>
                </div>
              </div>
            <br>

                  <?php  }?>






         <!--   <div class="col-md-2 static">
              <div id="sticky-sidebar">
                <h4 class="grey">Sarah's activity</h4>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                    <p class="text-muted">5 mins ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                    <p class="text-muted">an hour ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                    <p class="text-muted">4 hours ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                    <p class="text-muted">a day ago</p>
                  </div>
                </div>
              </div>
            </div> -->




          </div>
        </div>
      </div>
    </div>


<?php include 'footer.php'; ?>