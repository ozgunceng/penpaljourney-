<?php include 'header.php'; 



if (isset($_POST['advance'])) {

date_default_timezone_set('Europe/Istanbul');
$today=date("Y");
$min=$today-$_POST['one'];
$max=$today-$_POST['two'];


       $age1=$_POST['one'];
       $gender=$_POST['kullanici_gender'];
       $country=$_POST['kullanici_country'];
       $arasor=$db->prepare("SELECT * FROM kullanici where kullanici_country='$country' or kullanici_gender='$gender' or kullanici_yil Like '%$min%' or kullanici_yil Like '%$max%' order by kullanici_zaman DESC limit 100");
       $arasor->execute(array());

       $say2=$arasor->rowCount();
       

    } else {

       Header("Location:search.php");

}




?>

    <div id="page-contents">
    	<div class="container">
    		<div class="row">

    			<!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3 static">
            <div class="profile-card">
            
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
               ?> "
               alt="user" class="profile-photo" />
            	<h3><a href="profileShow.php?kullanici_id=<?php echo $kullanicicek['kullanici_id'] ?>" class="text-white"><?php echo $kullanicicek['kullanici_ad'] ?></a></h3>
            	<!--<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>-->
            </div><!--profile card 
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">My Profile</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="newsfeed-people-nearby.html">People Nearby</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.html">Friends</a></div></li>
              <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Messages</a></div></li>
              <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>
            </ul>  news-feed links ends-->
            <!--
            <div id="chat-block">
              <div class="title">Chat online</div>
              <ul class="online-users list-inline">
                <li><a href="newsfeed-messages.html" title="Linda Lohan"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Sophia Lee"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="John Doe"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Alexis Clark"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="James Carter"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Robert Cook"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Richard Bell"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Anna Young"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Julia Cox"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
              </ul>
            </div> chat block ends-->
          </div>
          
    			<div class="col-md-7">
               <br>
                <div class="about-content-block">
                <center>  <h4 class="grey2">  SEARCH  <b class="boldie">RESULTS</b>   </h4> <BR> </center>
                </div>
            <hr>

<?php

  if ($say2==0) {?>
                     
 <div class="about-content-block">
                <center>  <h4 class="grey2">  No  <b class="boldie">Result</b> Found :(  </h4> <BR> </center>
                </div>



 <?php } ?>

                 <?

             $say=0;
      while($arasorcek=$arasor->fetch(PDO::FETCH_ASSOC) and $arasorcek['kullanici_yetki']==1 and $arasorcek['kullanici_fotonay']==1  ) { $say++;

                   
   $id=$arasorcek['kullanici_id'];
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
                      <a href="profileShow.php?kullanici_id=<?php echo $lastkullanicicek['kullanici_id'] ?>" class="profile-link"><?php echo $lastkullanicicek['kullanici_ad']; ?></a>

                      <b> AGE

                       <?php
    date_default_timezone_set('Europe/Istanbul');
 $age=$lastkullanicicek['kullanici_yil'];
 $today=date("Y");
 $result=$today-$age;
 echo $result;

?> 


                </b><br><br><b>      <?php echo $lastkullanicicek['kullanici_country']; ?></b> <img src="images/flags/<?php echo $lastkullanicicek['kullanici_country']; ?>.png"/></h4>

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
                   <a href="profileShow.php?kullanici_id=<?php echo $lastkullanicicek['kullanici_id']; ?>"> <button class="btn btn-primary pull-right">Send Message</button> </a>
                  </div>
                </div>
              </div>
            <br>
<hr>
                  <?php  }?>




      
            </div>
          </div>

         <!-- Newsfeed Common Side Bar Right
          ================================================= -->
    		
    		</div>
    	</div>
    </div>

<?php

include 'footer.php';


    ?>