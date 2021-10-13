<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$siparissor=$db->prepare("SELECT * FROM siparis order by siparis_id DESC");
$siparissor->execute();


$urunsor=$db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Sipariş Listeleme <small>,

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
                  <th>Siparis Tarihi</th>
                  <th>Siparis Numarası</th>
                  <th>Sipariş Toplam</th>
                  
                  <th>Detay</th>
                  <th>Düzenle</th>

                </tr>
              </thead>

              <tbody>
           
                <?php 

                $say=0;

                while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $sipariscek['siparis_zaman'] ?></td>
                 <td><?php echo $sipariscek['siparis_id'] ?></td>
                 
                 <td><?php echo $sipariscek['siparis_toplam'] ?> TL</td>


      





                 <td><a href="siparis-detay?siparis_id=<?php echo $sipariscek['siparis_id']?>"><button class="btn btn-primary btn-xs">Detay</button></a></td>

       
                  <td><center><a href="siparis-duzenle.php?siparis_id=<?php echo $sipariscek['siparis_id'];?>"> <button class="btn btn-success btn-xs">Düzenle</button></a></center></td>
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
