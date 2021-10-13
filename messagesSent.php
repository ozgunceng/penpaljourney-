<?php

include 'header.php';


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
            </div><!--profile card -->

            <ul class="nav-news-feed">
              
              <li><a href="messagesReceived.php"><i class="icon ion-chatboxes"><ion-icon name="caret-back-sharp"></ion-icon></i><div><b>Messages Received</b></a></div></li>
              <li><a href="messagesSent.php"><i class="icon ion-chatboxes"><ion-icon name="play-sharp"></ion-icon></i><div><b> Messages Sent </b> </a></div></li>
              
            </ul> 
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

            <!-- Post Create Box
            ================================================= -->


            <!-- Chat Room
            ================================================= -->
            <div class="chat-room">
              <div  class="row">
                <div class="col-md-15">

                  <!-- Contact List in Left-->
                  <ul class="nav nav-tabs contact-list scrollbar-wrapper scrollbar-outer">
 <?php 

  $mesajsor=$db->prepare("SELECT * FROM mesaj where kullanici_gon=:kullanici_gon group by kullanici_gel  order by mesaj_zaman DESC limit 7");
  $mesajsor->execute(array(
'kullanici_gon'=>$_SESSION['userkullanici_id']

   ));

  $say=0;

while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) { 

   $id=$mesajcek['kullanici_gel'];
   $lastkullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
    $lastkullanicisor->execute(array(
      'kullanici_id' => $id
));

 $lastkullanicicek=$lastkullanicisor->fetch(PDO::FETCH_ASSOC);
        $say++;?>


                    <li>
                      <a href="messageDetail.php?kullanici_gel=<?php echo $mesajcek['kullanici_gon']?>&kullanici_gon=<?php echo $mesajcek['kullanici_gel']?>" >
                        <div class="contact">
                 

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
               ?> "  alt=""  class="profile-photo-sm pull-left"/>
                        	<div class="msg-preview">
                        		<h4><?php echo $lastkullanicicek['kullanici_ad']?></h4>
                        		<p class="text-muted fontbigger"><?php 

                            $kullanici_gon2=$mesajcek['kullanici_gon'];
                            $kullanici_gel2=$mesajcek['kullanici_gel'];

                            $lastmesajsor=$db->prepare("SELECT * FROM mesaj where kullanici_gon=$kullanici_gon2 and kullanici_gel=$kullanici_gel2 or kullanici_gon=$kullanici_gel2 and kullanici_gel=$kullanici_gon2
 order by mesaj_okunma,mesaj_zaman Desc");
                              $lastmesajsor->execute(array(
                            'kullanici_gon'=>$_SESSION['userkullanici_id']

                                         ));
                               $lastmesajcek=$lastmesajsor->fetch(PDO::FETCH_ASSOC);

                            echo substr($lastmesajcek['mesaj_detay'],0,30)?>


                          ...</p>
                            <small class="text-muted fontbigger2">
                              
                              
<?php date_default_timezone_set('Europe/Istanbul'); ?>
<?php  echo date("H:i",strtotime($mesajcek['mesaj_zaman'])); ?>               
<?php  echo date("M", strtotime($mesajcek['mesaj_zaman'])); ?> 
<?php  echo date("d", strtotime($mesajcek['mesaj_zaman'])); ?> 
<?php  echo date("Y", strtotime($mesajcek['mesaj_zaman'])); ?>


                            </small>
                            

                        	</div>
                        </div>
                      </a>
                    </li>

                   
  <?php  }?>                   
               
                  </ul><!--Contact List in Left End-->

                </div>
                
                <div class="clearfix"></div>
              </div>
            </div>
          </div>


    		</div>
    	</div>
    </div>

 <?php include 'footer.php'; ?>