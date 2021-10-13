<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$wordsor=$db->prepare("SELECT * FROM word order by word_id DESC");
$wordsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>-Kelimeler Listeleme <small>,

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
              <a href="word-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>word Id</th>
                  <th>word Ad</th>
                  <th>word Detay</th>
                  <th>word Dipnot</th>
                  <th>word Kategori</th>

                  <th>Kullanici</th>
                  <th>Öne Çıkar</th>
                  <th>Durum</th>
                  <th>Düzenle</th>
                  <th>Sil</th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($wordcek=$wordsor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                   <?php
$kategori_id=$wordcek['kategori_id'];

                   $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:id");
                   $kategorisor->execute(array(
                    'id' => $kategori_id
                    ));

                   $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
 ?>




                <tr>
                 <td width="20"><?php echo $say ?></td>
                  <td><?php echo $wordcek['word_id'] ?></td>
                 <td><?php echo substr($wordcek['word_ad'], 0,30)  ?></td>
                 <td><?php echo substr($wordcek['word_detay'], 0,30)  ?></td>
                 <td><?php echo substr($wordcek['word_dipnot'], 0,15)  ?></td>

                 <td><?php echo substr($kategoricek['kategori_ad'], 0,15)  ?></td>
                 <!-- -word id sini alarak gidecek bu sayfaya -->

<?php
$kullanici_id=$wordcek['kullanici_id'];

                   $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
                   $kullanicisor->execute(array(
                    'id' => $kullanici_id
                    ));

                   $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
 ?>


 <td><?php echo substr($kullanicicek['kullanici_unvan'], 0,15)  ?></td>




                
                 <td><center><?php 

                 if ($wordcek['word_onecikar']==0) {?>

                 <a href="../netting/islem.php?word_id=<?php echo $wordcek['word_id'] ?>&word_one=1&word_onecikar=ok"><button class="btn btn-success btn-xs">Ön Çıkar</button></a>
                   

                 <?php } elseif ($wordcek['word_onecikar']==1) {?>


                 <a href="../netting/islem.php?word_id=<?php echo $wordcek['word_id'] ?>&word_one=0&word_onecikar=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>

                   <?php } ?>

                   </center></td>



                   <td><center><?php 

                 if ($wordcek['word_durum']==0) {?>

                 <a href="../netting/islem.php?word_id=<?php echo $wordcek['word_id'] ?>&word_dur=1&word_durum=ok"><button class="btn btn-danger btn-xs">Pasif</button></a>
                   

                 <?php } elseif ($wordcek['word_durum']==1) {?>


                 <a href="../netting/islem.php?word_id=<?php echo $wordcek['word_id'] ?>&word_dur=0&word_durum=ok"><button class="btn btn-success btn-xs">Aktif</button></a>

                   <?php } ?>

                   </center></td>



            <td><center><a href="word-duzenle.php?word_id=<?php echo $wordcek['word_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
            <td><center><a href="../netting/islem.php?word_id=<?php echo $wordcek['word_id']; ?>&wordsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
