<?php 

include 'header.php'; 




?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Entry Ekleme <small>,

               <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



              <!-- Kategori seçme başlangıç -->


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $entry_id=$entrycek['kategori_id']; 

                  $kategorisor=$db->prepare("select * from kategori where kategori_ust=:kategori_ust order by kategori_sira");
                  $kategorisor->execute(array(
                    'kategori_ust' => 0
                    ));

                    ?>
                    <select class="select2_multiple form-control" required="" name="kategori_id" >


                     <?php 

                     while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

                       $kategori_id=$kategoricek['kategori_id'];

                       ?>

                       <option <?php if ($kategori_id==$entry_id) { echo "selected='select'"; } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>

                 <!-- kategori seçme bitiş -->
                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Entry Ad <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="entry_ad" value="<?php echo $entrycek['entry_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <!-- Ck Editör Başlangıç -->

                

<div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Entry Detay <span ></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="entry_detay" value="Detayları Gir"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <!-- Ck Editör Bitiş -->


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Entry Dipnot <span ></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="entry_dipnot" value="<?php echo $entrycek['entry_dipnot'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanici ID <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_id" value="<?php echo $entrycek['kullanici_id'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>







              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Entry Öne Çıkar<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="entry_onecikar" required>



                  <option value="1" <?php echo $entrycek['entry_onecikar'] == '1' ? 'selected=""' : ''; ?>>Evet</option>



                  <option value="0" <?php if ($entrycek['entry_onecikar']==0) { echo 'selected=""'; } ?>>Hayır</option>
                 

                 </select>
               </div>
             </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Entry Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="entry_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $entrycek['entry_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->




                  <option value="1" <?php echo $entrycek['entry_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($entrycek['entry_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                  <!-- <?php 

                   if ($entrycek['entry_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> -->


                 </select>
               </div>
             </div>


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="entryekle" class="btn btn-success">Kaydet</button>
              </div>
            </div>

          </form>



        </div>
      </div>
    </div>
  </div>



  <hr>
  <hr>
  <hr>



</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
