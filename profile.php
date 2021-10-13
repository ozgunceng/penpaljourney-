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
                  
                  <h3><?php echo $kullanicicek['kullanici_ad'];   ?> </h3>

                  
                   <br>
                   <p class="text-muted"><ion-icon name="person"></ion-icon> Member Since <b>

                   <?php date_default_timezone_set('Europe/Istanbul'); ?>
                   <?php  echo date("M", strtotime($kullanicicek['kullanici_zaman'])); ?> 
                  
                   <?php  echo date("d", strtotime($kullanicicek['kullanici_zaman'])); ?> 
                    ,
                   <?php  echo date("Y", strtotime($kullanicicek['kullanici_zaman'])); ?>





                   </b></p>
                  <p class="text-muted"><ion-icon name="eye"></ion-icon> Profile viewed <b>x </b> times (Soon)</p>
                  <p class="text-muted"><ion-icon name="wifi"></ion-icon> Last login <b>


  <?php 
$id=$kullanicicek['kullanici_id'];
$lastkullanicisor=$db->prepare("SELECT * FROM lastlogin where kullanici_id=:kullanici_id");
$lastkullanicisor->execute(array(
      'kullanici_id' => $id
  ));
$lastkullanicicek=$lastkullanicisor->fetch(PDO::FETCH_ASSOC);

?> 


 <?php date_default_timezone_set('Europe/Istanbul'); ?>


 <?php  echo date("h:i", strtotime($lastkullanicicek['last_time'])); ?>


                    </b>
 <?php  echo date("M", strtotime($lastkullanicicek['last_time'])); ?> 
 <?php  echo date("d", strtotime($lastkullanicicek['last_time'])); ?> 
 <?php  echo date("Y", strtotime($lastkullanicicek['last_time'])); ?>

</p>
                  <p class="text-muted"><ion-icon name="alert-circle"></ion-icon> <a>report profile</a> </p>
                 
                  



<style type="text/css">
  #d3 {
    display: none;
}
</style>

<script type="text/javascript">
                        var button = document.getElementById("button");
var d3 = document.getElementById("d3");
function showMore() {
    button.style.display="none";
    d3.style.display="block";
}

function showLess() {
    button.style.display="inline-block";
    d3.style.display="none";
}
</script>





                </div>
              </div>




<!--
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <b><li><a href="timeline.html">Sarah's Profile</a></li>
                  <b><li><a href="timeline.html">ID:8645952</a></li>
                  <li><a href="timeline.html">Timeline</a></li>
                  <li><a href="timeline-about.html" class="active">About</a></li>
                  <li><a href="timeline-album.html">Album</a></li>
                  <li><a href="timeline-friends.html">Friends</a></li>
                </b>
                </ul>
                <ul class="follow-me list-inline">
                  <li><button class="btn-primary">Send Message</button></li>
                </ul>
              </div>
              <li><button class="btn-primary">Send Message</button></li>

-->

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
              <h4><?php echo  substr($kullanicicek['kullanici_ad'],0,10)   ?></h4>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i> <?php echo  $kullanicicek['kullanici_country']   ?>
                   <img src="images/flags/<?php echo $kullanicicek['kullanici_country']?>.png"/></h4>
                </div>
                <button class="btn btn-primary" id="button" type="button" value="Follow" onclick="showMore()" > <ion-icon name="person-add"></ion-icon> Follow </button>
                 <div id="d3">
                        <button class="btn btn-primary" type="button" value="Show less" onclick="showLess()"> <ion-icon name="close-circle"></ion-icon> Unfollow</button>
                      </div>



            </div>

            <div class="mobile-menu">
              <ul class="list-inline">
                 <li><?php echo $kullanicicek['kullanici_dil'];   ?></li>
              </ul>
              <div class="container">

                
              </div>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-7">


              <!-- About
              ================================================= -->
              <div class="about-profile">


                <div class="about-content-block">
                        <?php 
                    if ($_GET['durum']=="validOk") {?>

                      <div class="alert alert-success">
                        <strong>Welcome!</strong> Validation successfull! Welcome to Penpal Journey.
                      </div>

                      <?php } elseif ($_GET['durum']=="farklisifre") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Passwords are doesn't match.
                      </div>
                        
                      <?php } elseif ($_GET['durum']=="eksiksifre") {?>

                      <div class="alert alert-danger">
                        <strong>Alert!</strong> Password must be 8 characters long.
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




                <center>  <h4 class="grey2">   <b class="boldie"><?php echo $kullanicicek['kullanici_ad']  ?>'</b>s PROFILE  </h4><p> UserID: <?php echo $kullanicicek['kullanici_id']; ?></p> </center>
                </div>

                <div class="about-content-block">
                  <h4 class="grey"><ion-icon name="location"></ion-icon> Current Country: <b class="boldie"><?php echo $kullanicicek['kullanici_country'];   ?> </b>  <img src="images/flags/<?php echo $kullanicicek['kullanici_country']?>.png"/> </h4>
                  <h4 class="grey"> <ion-icon name="egg"></ion-icon> Birth Country: <b class="boldie"> <?php echo $kullanicicek['kullanici_Bcountry'];   ?></b> <img src="images/flags/<?php echo $kullanicicek['kullanici_Bcountry']?>.png"/> </h4>
                  <h4 class="grey"> <ion-icon name="search"></ion-icon> Looking for <b class="boldie"> <?php echo $kullanicicek['kullanici_lookGen'];   ?> </b> penpals  Between <b class="boldie"> <?php echo $kullanicicek['kullanici_lookAgeOne'];   ?></b> and <b class="boldie">
                    <?php echo $kullanicicek['kullanici_lookAgeTwo'];   ?> </b>  </h4>


                  <h4 class="grey"><ion-icon name="accessibility"></ion-icon> 
                    <b class="boldie">
                      <?php
                       date_default_timezone_set('Europe/Istanbul');
                       $age=$kullanicicek['kullanici_yil'];
                       $today=date("Y");
                       $result=$today-$age;
                       echo $result;

                      ?>
        </b>years old <b class="boldie"> <?php echo $kullanicicek['kullanici_gender'];   ?> </b></h4>
                  <h4 class="grey"> <ion-icon name="heart"></ion-icon> Status :  <b class="boldie"> <?php echo $kullanicicek['kullanici_iliski'];   ?></b>   </h4>
                  <h4 class="grey"> <ion-icon name="logo-linkedin"></ion-icon> Job : <b class="boldie"> <?php echo $kullanicicek['kullanici_meslek'];   ?></b>   </h4>
                  <h4 class="grey"> <ion-icon name="language"></ion-icon> Language : <b class="boldie"> <?php echo $kullanicicek['kullanici_dil'];   ?></b>   </h4>
                  <h4 class="grey"> <ion-icon name="flash"></ion-icon> Special Power : <b class="boldie"><?php echo $kullanicicek['kullanici_special'];   ?></b>   </h4>
                  <h4 class="grey"> <ion-icon name="musical-notes-outline"></ion-icon> Favorite Band : <b class="boldie"> <?php echo $kullanicicek['kullanici_band'];   ?> </b>   </h4>
                  <h4 class="grey"> <ion-icon name="home-outline"></ion-icon> City : <b class="boldie"> <?php echo $kullanicicek['kullanici_city'];   ?> </b>   </h4>
                   <h4 class="grey"> <ion-icon name="logo-instagram"></ion-icon> : <b class="boldie"> <?php echo $kullanicicek['kullanici_insta'];   ?></b>   </h4>
                  <h4 class="grey"> <ion-icon name="logo-snapchat"></ion-icon>  : <b class="boldie"> <?php echo $kullanicicek['kullanici_snap'];   ?></b>   </h4>

                </div>
                
              

               


                <div class="about-content-block">
                  
                  <p class="fontbigger"><img src="images/quoteStart2.png" width="22" height="18" alt="Quote"> <?php echo nl2br($kullanicicek['kullanici_text'])   ?>

                    <img src="images/quoteEnd2.png" width="22" height="18" alt="Quote"> </p>
                </div>
                 













                <!--
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                </div>
              -->


                
              </div>
              <!-- HIDDEN MOBILE MENU TO SEND MESSAGE-->
      <div class="navbar-mobile hidden-lg hidden-md">
            <div class="mobile-menu">
              <div class="container">
                <div class="send-message">
                    <div class="input-group">
                      <textarea name="texts" id="exampleTextarea" cols="100%" rows="10" class="form-control" placeholder="Write your message" spellcheck="false"></textarea>
                      <span class="">
                        <br>
                        <button class="btn-primary">Send Message</button>
                      </span>
                    </div>
                   </div>
                   <br>
                
              </div>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

                <div class="about-content-block">
                <center>  
                  <h4 class="grey2">  LAST  <b class="boldie">COMMENTS</b>   </h4> <br>
                </center>
                </div>
                  <!-- Post Content-->
       

<?php 

$wall_id=$kullanicicek['kullanici_id'];

  $commentsor=$db->prepare("SELECT * FROM wallcomment where wall_id=:wall_id order by com_zaman DESC limit 10");
  $commentsor->execute(array(
                'wall_id' => $wall_id,
                )); 

             $say=0;
      while($commentcek=$commentsor->fetch(PDO::FETCH_ASSOC)) { $say++;

                   
   $id=$commentcek['kullanici_id'];
   $lastkullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
    $lastkullanicisor->execute(array(
      'kullanici_id' => $id

  ));

    $say=$lastkullanicisor->rowCount();
    $lastkullanicicek=$lastkullanicisor->fetch(PDO::FETCH_ASSOC);


?>





              <div class="post-content">
               <div class="post-container">
                  <img src="<?php echo $lastkullanicicek['kullanici_foto'] ?>" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="profileShow.php?kullanici_id=<?php echo $lastkullanicicek['kullanici_id']; ?>" class="profile-link"><?php echo $lastkullanicicek['kullanici_ad']; ?></a> <span class="following"> 

 <?php date_default_timezone_set('Europe/Istanbul'); ?>


 (<?php  echo date("H:i", strtotime($commentcek['com_zaman'])); ?>

) 
                    </b>
 <?php  echo date("M", strtotime($commentcek['com_zaman'])); ?> 
 <?php  echo date("d", strtotime($commentcek['com_zaman'])); ?> 
 <?php  echo date("Y", strtotime($commentcek['com_zaman'])); ?>



                          </span></h5>
                     <!-- <p class="text-muted">Published a photo about 15 mins ago</p> -->
                    </div>
                    <div class="post-text">
                      <p class="fontbigger2"> <?php echo $commentcek['com_detay']; ?> <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                      <p><a href="#" ><i class="em em-anguished">report</i></a></p>


                    </div>
                  </div>
                </div>
              </div>


<?php  }?>


        <br>
              


              <!-- Post Content
              ================================================= -->
            </div>
           
<div class="col-md-2 static">
              <div id="sticky-sidebar">
                
                
                

                


                <br><br>
                <h4 class="grey"><ion-icon name="planet"></ion-icon> Communities</h4>
                <p>Coming Soon!</p>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Hiking</a></p>
                  </div>
                </div>

                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Reading</a> </p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Music</a></p>
                  </div>
                </div>





                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


   <?php

include 'footer.php';


    ?>