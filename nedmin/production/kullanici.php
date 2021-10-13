<?php 

include 'header.php'; 

//tüm kullanıcıları seçtik
$kullanicisor=$db->prepare("SELECT * FROM kullanici order by kullanici_zaman DESC");
$kullanicisor->execute();


?>


<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> Users  <small>,
              <img src="../../images/logo200.png" class="img-responsive profile-photo">

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>

  </small>
</h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="kullanici-ekle.php"><button class="btn btn-success btn-xs"> Editör Ekle</button></a>

            </div>
          </div>
      
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Kayıt Tarih</th>
                  <th>ID</th>
                  <th>Foto</th>
                  <th>Foto Onay</th>
                  <th>Yetki</th>
                  <th>Name</th> 
                  <th>Mail</th>
                  <th>Son IP</th>
                  <th>Şifre</th>
                  <th>Meslek</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td>
                    
<?php date_default_timezone_set('Europe/Istanbul'); ?>


 <?php  echo date("h:i", strtotime($lastkullanicicek['last_time'])); ?>


                    </b>
 <?php  echo date("M", strtotime($kullanicicek['kullanici_zaman'])); ?> 
 <?php  echo date("d", strtotime($kullanicicek['kullanici_zaman'])); ?> 
 <?php  echo date("Y", strtotime($kullanicicek['kullanici_zaman'])); ?>

                  </td>
                  <td><img src="../../<?php echo $kullanicicek['kullanici_foto'] ?>" width="250px" height="250px" class="img-responsive profile-photo"></td>
                  <td><?php echo $kullanicicek['kullanici_id'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_yetki'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_unvan'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_mail'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_sonip'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_password'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_meslek'] ?></td>

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
