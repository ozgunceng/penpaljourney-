<?php 

include 'header.php'; 


                    $siparisaltsor=$db->prepare("SELECT * FROM siparis where siparis_id=:siparis_id ");

                  $siparisaltsor->execute(array(
                    'siparis_id' => $_GET['siparis_id']
                  ));

$siparisaltcek=$siparisaltsor->fetch(PDO::FETCH_ASSOC);
      

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?php echo $_GET['siparis_id'] ?> Numaralı Sipariş Detayı 
            </h2><small>,

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

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  
                  <th>Sipariş Tarihi</th>
                  <th>Sipariş kod</th>
                 <th>Ürün Kodu</th> 
                 <th>Sipariş Tipi</th>
                <th>Sipariş Banka</th>

                  <th>Ürün Fiyat</th>
                  <th>Ürün Adet</th>
                  <th>Ürün Adı</th>
                  <th>Müşteri</th>
                  <th>Adres</th>
                  <th>İl</th>
                  <th>İlçe</th>
                  <th>GSM</th>


                </tr>
              </thead>
                       <tbody>
                   <?php 

               $kullanici_id=$kullanicicek['kullanici_id'];
           
                    $siparissor=$db->prepare("SELECT * FROM siparis_detay where siparis_id=:siparis_id ");

                  $siparissor->execute(array(
                    'siparis_id' => $_GET['siparis_id']
                  ));

// alan kişinin id gelmiyor toplu geliyor onu seçmen lazım
                      $say=0;

                while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++



                  ?>



                <tr>
                 <td><?php echo $sipariscek['siparis_zaman'] ?></td>
                 <td><?php echo $sipariscek['siparis_id'] ?></td>
                 
                 <td><?php echo $sipariscek['urun_id'] ?></td>
                 <td><?php echo $sipariscek['siparis_tip'] ?></td>

               <td><?php echo $siparisaltcek['siparis_banka'] ?></td>


                 <td width="20"><?php echo $sipariscek['urun_fiyat'] ?> TL</td>

                 <td width="20"><?php echo $sipariscek['urun_adet'] ?></td>
                 <td><?php echo $sipariscek['urun_ad'] ?></td>
                 <td><?php echo $sipariscek['kullanici_adsoyad'] ?></td>
                 <td><?php echo $sipariscek['kullanici_adres'] ?></td>
                 <td><?php echo $sipariscek['kullanici_il'] ?></td>
                 <td><?php echo $sipariscek['kullanici_ilce'] ?></td>
                 <td><?php echo $sipariscek['kullanici_gsm'] ?></td>
                


               

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
