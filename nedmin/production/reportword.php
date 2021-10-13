<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Bildirilen wordler <small>,

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
                  <th>word</th>
                  <th>Kullanıcı</th>
                  <th>word ID</th>
              </tr>
              </thead>

              <tbody>

                <?php 

$yorumsor=$db->prepare("SELECT * FROM bildir where (word_id != 0) order by word_id DESC ");
$yorumsor->execute();
$say=0;
while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) { $say++

 ?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td>


    <?php  

  $wordyorum_id=$yorumcek['word_id'];

  $wordyorumsor=$db->prepare("SELECT * FROM word where word_id=:word_id");
$wordyorumsor->execute(array(

    'word_id'=> $wordyorum_id

  ));

  $wordyorumcek=$wordyorumsor->fetch(PDO::FETCH_ASSOC);



    echo nl2br( substr($wordyorumcek['word_ad'], 0,500) ); ?>

                   



                 </td>




                 <td><?php 

                   $kullanici_mail=$yorumcek['kullanici_mail'];

                   $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail");
                   $kullanicisor->execute(array(
                    'kullanici_mail' => $kullanici_mail
                    ));

                   $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

                   echo $kullanicicek['kullanici_unvan'];
                   ?>
                     

                   </td>
             
                
                     <td>
                      <?php echo nl2br( substr($yorumcek['word_id'], 0,500) ); ?>
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
