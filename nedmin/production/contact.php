<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$contactsor=$db->prepare("SELECT * FROM contact order by cont_id Desc");
$contactsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mesajlar Listeleme <small>,

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
           <!--   <a href="yorum-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>-->

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Mesaj Başlık</th>
                  <th>Detay</th>
                  <th>Kullanıcı</th>
                  <th>Zaman</th>
                  
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($contactcek=$contactsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td>

                 <?php  echo nl2br( substr($contactcek['cont_baslik'], 0,100) ); ?>
                   



                 </td>
                 <td>

                 <?php  echo nl2br( substr($contactcek['cont_detay'], 0,100) ); ?>
                   



                 </td>
                 







                 <td><?php 

                   $kullanici_id=$contactcek['kullanici_id'];

                   $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
                   $kullanicisor->execute(array(
                    'id' => $kullanici_id
                    ));

                   $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

                   echo $kullanicicek['kullanici_unvan'];



                   ?></td> 
                   <td>

                 <?php  echo nl2br( substr($contactcek['cont_zaman'], 0,100) ); ?>
                   



                 </td>
             

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
