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

            <!-- Post Create Box
            ================================================= -->


            <!-- Chat Room
            ================================================= -->
            <div class="chat-room">
              <div  class="row">
             
                <div class="col-md-20">

                  <!--Chat Messages in Right-->
                  <div class="tab-content scrollbar-wrapper wrapper scrollbar-outer">
                    <div class="tab-pane active" id="contact-1">
                      <div class="chat-body">
                      	<ul class="chat-message">
 <?php 


 $kullanici_gon=$_GET['kullanici_gon'];
 $kullanici_gel=$_GET['kullanici_gel'];
 $conv_id1=$_GET['kullanici_gon'];
 $conv_id2=$_GET['kullanici_gel'];


$mesajsor=$db->prepare("SELECT * FROM mesaj where conv_id=$conv_id1 or conv_id=$conv_id2
 order by mesaj_zaman ASC");
$mesajsor->execute();
  $say=0;
      while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) { $say++;?>
 <?php  


   if($mesajcek['kullanici_gon'] == $kullanici_gon){?>


                         <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5><?php echo $mesajcek['kullanici_ad'] ?></h5>
                                <small class="text-muted"><?php echo $mesajcek['mesaj_zaman'];?></small>
                              </div>
                              <p><?php echo $mesajcek['mesaj_detay'] ?></p>
                            </div>
                          </li>



   <?php } else if( $mesajcek['kullanici_gon'] == $kullanici_gel){?>


                      <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah Cruiz</h5>
                                <small class="text-muted"><?php echo $mesajcek['mesaj_zaman'];?></small>
                              </div>
                              <p><?php echo $mesajcek['mesaj_detay'];?></p>
                            </div>
                          </li> 




    <?php }
?>





  <?php  }?>     

                     <!--    

<li class="left">
                            <img src="<?php echo $mesajcek['kullanici_foto'] ?>" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5><?php echo $mesajcek['kullanici_ad'] ?></h5>
                                <small class="text-muted"><?php echo $mesajcek['mesaj_zaman'] ?></small>
                              </div>
                              <p><?php echo $gonderencek['mesaj_detay'] ?></p>
                            </div>
                          </li>




                      <li class="right">
                      			<img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                      			<div class="chat-item">
                              <div class="chat-item-header">
                              	<h5>Sarah Cruiz</h5>
                              	<small class="text-muted">3 days ago</small>
                              </div>
                              <p>I have been on vacation</p>
                            </div>
                      		</li> -->
                         
                         
                       
                      	</ul>
                      </div>
                    </div>

            
                  </div><!--Chat Messages in Right End-->
</div>
<form action="nedmin/netting/islem.php" method="POST">

                  <div class="send-message">
                    <div class="input-group">
                    
                      <textarea rows="5" name="mesaj_detay" placeholder="Type your message"></textarea>


                      <input type="hidden" name="kullanici_gel" value="<?php echo $_GET['kullanici_gon'] ?>">

                      <input type="hidden" name="kullanici_gon" value="<?php echo $_SESSION['userkullanici_id'] ?>">


                      <span class="input-group-btn">
                        <button name="mesajcevap" class="btn btn-default" type="submit">Send</button>
                      </span>
                    </div>
                  </div>
</form>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>


    		</div>
    	</div>
    </div>

 <?php

include 'footer.php';


    ?>