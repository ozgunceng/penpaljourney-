<?php 

include 'header.php'; 

//tüm kullanıcıları seçtik
$mesajsor=$db->prepare("SELECT * FROM mesaj order by mesaj_zaman DESC");
$mesajsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Messages <small>,

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
                  <th>Message Time</th>
                  <th>Message ID</th>
                  <th>Sender</th>
                  <th>I/O</th>
                  
                  <th>Approved?</th>
                </tr>
              </thead>

              <tbody>

                   <?php 

                while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td>
                    
 <?php date_default_timezone_set('Europe/Istanbul'); ?>
 <?php  echo date("h:i", strtotime($mesajcek['mesaj_zaman'])); ?>
 <?php  echo date("M", strtotime($mesajcek['mesaj_zaman'])); ?> 
 <?php  echo date("d", strtotime($mesajcek['mesaj_zaman'])); ?> 
 <?php  echo date("Y", strtotime($mesajcek['mesaj_zaman'])); ?>
                  </td>
                  <td><?php echo $mesajcek['mesaj_id'] ?></td>

                  


                  
                  <td><?php echo $mesajcek['kullanici_gon'] ?></td>
                  <td><?php echo $mesajcek['kullanici_gel'] ?></td>
                  <td><?php echo $mesajcek['mesaj_detay'] ?></td>
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
