<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$yorumsor=$db->prepare("SELECT * FROM comment order by com_zaman DESC");
$yorumsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yorum Listeleme <small>,

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
                  <th>Yorum</th>
                  <th>Yorum ID</th>
                  <th>Kullanıcı</th>
                  <th>Ürün</th>
              
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td>

                 <?php  echo nl2br( substr($yorumcek['com_detay'], 0,500) ); ?>
                   



                 </td>
                 <td>

                 <?php  echo nl2br( substr($yorumcek['com_id'], 0,500) ); ?>
                   



                 </td>




                 <td><?php 

                   $kullanici_id=$yorumcek['kullanici_id'];

                   $kullanicisor2=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
                   $kullanicisor2->execute(array(
                    'id' => $kullanici_id
                    ));

                   $kullanicicek2=$kullanicisor2->fetch(PDO::FETCH_ASSOC);

                   echo $kullanicicek2['kullanici_unvan'];



                   ?></td>
             
                
                     


           
            <td><center><a href="../netting/islem.php?com_id=<?php echo $yorumcek['com_id']; ?>&com1sil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
