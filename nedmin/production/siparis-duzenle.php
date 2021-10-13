<?php 
include 'header.php';


$siparissor=$db->prepare("SELECT * FROM siparis where siparis_id=:id");
$siparissor->execute(array(
'id'=>$_GET['siparis_id']
));


$sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);






;?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            


            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sipariş Düzenleme <small>
                      
                      <?php 

                     if($_GET['durum']=="ok"){  ?>

                     <b style="color:green; "> İşlem Başarılı... </b>

                     <?php }elseif($_GET['durum']=="no"){  ?>

                     <b style="color:red; "> İşlem Başarısız... </b>

                     <?php }  
   
                       ?>



                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <form action="../netting/islem.php" method="POST"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                 
                      <!-- ../ ile üst klasöre çıktım -->
<?php 

$zaman=explode(" ", $sipariscek['siparis_zaman']);

?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tarih <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="first-name" name="siparis_zaman" disabled="" value="<?php echo $zaman[0]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sipariş ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="siparis_id" disabled=""  value="<?php echo $sipariscek['siparis_id']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="kullanici_id" disabled=""  value="<?php echo $sipariscek['kullanici_id']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Toplam <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="siparis_toplam" disabled=""  value="<?php echo $sipariscek['siparis_toplam']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>





                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sipariş Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="siparis_durum" value="<?php echo $sipariscek['siparis_durum']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>








            


                  
                      
             <input type="hidden" name="siparis_id" value="<?php echo $sipariscek['siparis_id'] ?>"> 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button type="submit" name="siparisduzenle" class="btn btn-success"> Güncelle</button>
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

      <?php include 'footer.php' ?>