<?php 

include 'header.php'; 

//tüm kullanıcıları seçtik
$kullanicisor=$db->prepare("SELECT * FROM kullanici order by kullanici_zaman DESC");
$kullanicisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>-Entry Listeleme <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="entry-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Enroll Date</th>
                  <th>User ID</th>
                  <th>Picture</th>
                  <th>I/O</th>
                  
                  <th>Approved?</th>
                  <th>Authority</th>
                  <th>Username</th>

                  <th>Mail</th>
                  <th>Last IP</th>
                  <th>Update</th>

                  <th>Delete User</th>
                </tr>
              </thead>

              <tbody>

                   <?php 

                while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td>
                    
 <?php date_default_timezone_set('Europe/Istanbul'); ?>
 <?php  echo date("h:i", strtotime($kullanicicek['kullanici_zaman'])); ?>
 <?php  echo date("M", strtotime($kullanicicek['kullanici_zaman'])); ?> 
 <?php  echo date("d", strtotime($kullanicicek['kullanici_zaman'])); ?> 
 <?php  echo date("Y", strtotime($kullanicicek['kullanici_zaman'])); ?>
                  </td>
                  <td><?php echo $kullanicicek['kullanici_id'] ?></td>
                  <td>

       <img src=" <?php echo "../../".$kullanicicek['kullanici_foto']; ?>"  alt="" class="img-responsive profile-photo"  width="250px" height="250px" class="img-responsive profile-photo"></td>
                  <td><?php echo $kullanicicek['kullanici_fotonay'] ?></td>

                   <td>
                    <center><?php 

                 if ($kullanicicek['kullanici_fotonay']==0) {?>

                 <a href="../netting/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']  ?>&kullanici_fotonay=1&foto_onay=ok"><button class="btn btn-warning btn-xs">Unapproved</button></a>
                   

                 <?php } elseif ($kullanicicek['kullanici_fotonay']==1) {?>


                 <a href="../netting/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']  ?>&kullanici_fotonay=0&foto_onay=ok"><button class="btn btn-success btn-xs">Approved</button></a>

                   <?php } ?>

                   </center>
                 </td>




                  
                  <td><?php echo $kullanicicek['kullanici_yetki'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_ad'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_mail'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_sonip'] ?></td>

                  <td><center><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id'];?>"> <button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>&kullanicisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                </tr> 



                <?php  }

                ?>


        </tbody>
      </table>

      <!-- Div İçerik Bitişi -->


    </div>
  </div>
</div>
</div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
