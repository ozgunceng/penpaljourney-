<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$entrysor=$db->prepare("SELECT * FROM entry order by entry_id DESC");
$entrysor->execute();


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
                  <th>S.No</th>
                  <th>Entry Id</th>
                  <th>Entry Ad</th>
                  <th>Entry Detay</th>
                  <th>Entry Dipnot</th>
                  <th>Entry Kategori</th>

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

                while($entrycek=$entrysor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                   <?php
$kategori_id=$entrycek['kategori_id'];

                   $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:id");
                   $kategorisor->execute(array(
                    'id' => $kategori_id
                    ));

                   $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
 ?>




                <tr>
                 <td width="20"><?php echo $say ?></td>
                  <td><?php echo $entrycek['entry_id'] ?></td>
                 <td><?php echo substr($entrycek['entry_ad'], 0,30)  ?></td>
                 <td><?php echo substr($entrycek['entry_detay'], 0,30)  ?></td>
                 <td><?php echo substr($entrycek['entry_dipnot'], 0,15)  ?></td>

                 <td><?php echo substr($kategoricek['kategori_ad'], 0,15)  ?></td>
                 <!-- -Entry id sini alarak gidecek bu sayfaya -->

                   <?php
$kullanici_id=$entrycek['kullanici_id'];

                   $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
                   $kullanicisor->execute(array(
                    'id' => $kullanici_id
                    ));

                   $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
 ?>


 <td><?php echo substr($kullanicicek['kullanici_unvan'], 0,15)  ?></td>




                
                 <td><center><?php 

                 if ($entrycek['entry_onecikar']==0) {?>

                 <a href="../netting/islem.php?entry_id=<?php echo $entrycek['entry_id'] ?>&entry_one=1&entry_onecikar=ok"><button class="btn btn-success btn-xs">Ön Çıkar</button></a>
                   

                 <?php } elseif ($entrycek['entry_onecikar']==1) {?>


                 <a href="../netting/islem.php?entry_id=<?php echo $entrycek['entry_id'] ?>&entry_one=0&entry_onecikar=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>

                   <?php } ?>

                   </center></td>



                   <td><center><?php 

                 if ($entrycek['entry_durum']==0) {?>

                 <a href="../netting/islem.php?entry_id=<?php echo $entrycek['entry_id'] ?>&entry_dur=1&entry_durum=ok"><button class="btn btn-danger btn-xs">Pasif</button></a>
                   

                 <?php } elseif ($entrycek['entry_durum']==1) {?>


                 <a href="../netting/islem.php?entry_id=<?php echo $entrycek['entry_id'] ?>&entry_dur=0&entry_durum=ok"><button class="btn btn-success btn-xs">Aktif</button></a>

                   <?php } ?>

                   </center></td>



            <td><center><a href="entry-duzenle.php?entry_id=<?php echo $entrycek['entry_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
            <td><center><a href="../netting/islem.php?entry_id=<?php echo $entrycek['entry_id']; ?>&entrysil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
