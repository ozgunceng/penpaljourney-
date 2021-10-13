<?php
 
//bunlara session için ihtiyacımız var kalıp
 ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';


if (isset($_POST['kullanicikaydet'])) {

  echo $kullanici_ad=trim($_POST['kullanici_ad']); echo "<br>";  
  echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";
  echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
  echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";
  echo $kullanici_gender=trim($_POST['kullanici_gender']); echo "<br>";
  echo $kullanici_gun=trim($_POST['kullanici_gun']); echo "<br>";
  echo $kullanici_ay=trim($_POST['kullanici_ay']); echo "<br>";
  echo $kullanici_yil=trim($_POST['kullanici_yil']); echo "<br>";
  echo $kullanici_city=trim($_POST['kullanici_city']); echo "<br>";
  echo $kullanici_country=trim($_POST['kullanici_country']); echo "<br>";

  if ($kullanici_passwordone==$kullanici_passwordtwo) {


    if (strlen($kullanici_passwordone)>=8) {


      

      



//kullanıcıyı mail olarak aldığımız için mail yani direk kullanıcıyı çekiyoruz
      $kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
      $kullanicisor->execute(array(
        'mail' => $kullanici_mail
        ));

      //dönen satır sayısını belirtir
      $say=$kullanicisor->rowCount();



      if ($say==0) {

        //şifreyi md5 fonksiyonu kullanarak  md5 e çevirdim (siber güvenlikteki şifreleme tekniği)
        $password=md5($kullanici_passwordone);

        $kullanici_yetki=1;
// burası bildiğimiz veri tabanına kayıt işlemi
        $kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
          kullanici_ad=:kullanici_ad,
          kullanici_mail=:kullanici_mail,
          kullanici_password=:kullanici_password,
          kullanici_gender=:kullanici_gender,
          kullanici_gun=:kullanici_gun,
          kullanici_ay=:kullanici_ay,
          kullanici_yil=:kullanici_yil,
          kullanici_city=:kullanici_city,
          kullanici_country=:kullanici_country,
          kullanici_yetki=:kullanici_yetki
          ");
        $insert=$kullanicikaydet->execute(array(
          'kullanici_ad' => $kullanici_ad,
          'kullanici_mail' => $kullanici_mail,
          'kullanici_password' => $password,
          'kullanici_gender' => $kullanici_gender,
          'kullanici_gun' => $kullanici_gun,
          'kullanici_ay' => $kullanici_ay,
          'kullanici_yil' => $kullanici_yil,
          'kullanici_city' => $kullanici_city,
          'kullanici_country' => $kullanici_country,
          'kullanici_yetki' => $kullanici_yetki
          ));

        if ($insert) {


          header("Location:../../validate.php?durum=kayitbasarili");


        //Header("Location:../production/genel-ayarlar.php?durum=ok");

        } else {


          header("Location:../../register.php?durum=basarisiz");
        }

      } else {

        header("Location:../../register.php?durum=mukerrerkayit");



      }

    // Bitiş

    } else {


      header("Location:../../register.php?durum=eksiksifre");


    }



  } else {



    header("Location:../../register.php?durum=farklisifre");
  }
  


}








 

if (isset($_POST['sliderkaydet'])) {


  $uploads_dir = '../../dimg/slider';
  @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
  @$name = $_FILES['slider_resimyol']["name"];
  //resmin isminin benzersiz olması
  $benzersizsayi1=rand(20000,32000);
  $benzersizsayi2=rand(20000,32000);
  $benzersizsayi3=rand(20000,32000);
  $benzersizsayi4=rand(20000,32000);  
  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
  $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
  


  $kaydet=$db->prepare("INSERT INTO slider SET
    slider_ad=:slider_ad,
    slider_sira=:slider_sira,
    slider_link=:slider_link,
    slider_resimyol=:slider_resimyol,

        slider_aciklama=:slider_aciklama,
            slider_fiyat=:slider_fiyat

    ");
  $insert=$kaydet->execute(array(
    'slider_ad' => $_POST['slider_ad'],
    'slider_sira' => $_POST['slider_sira'],
    'slider_link' => $_POST['slider_link'],
        'slider_aciklama' => $_POST['slider_aciklama'],
    'slider_fiyat' => $_POST['slider_fiyat'],

    'slider_resimyol' => $refimgyol
    ));

  if ($insert) {

    Header("Location:../production/slider.php?durum=ok");

  } else {

    Header("Location:../production/slider.php?durum=no");
  }




}




if (isset($_POST['sliderduzenle'])) {


  if($_FILES['slider_resimyol']["size"] > 0)  { 


    $uploads_dir = '../../dimg/slider';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $duzenle=$db->prepare("UPDATE slider SET
      slider_ad=:ad,

            slider_fiyat=:fiyat,
            slider_aciklama=:aciklama,

      slider_link=:link,
      slider_sira=:sira,
      slider_durum=:durum,
      slider_resimyol=:resimyol 
      WHERE slider_id={$_POST['slider_id']}");
    $update=$duzenle->execute(array(
      'ad' => $_POST['slider_ad'],

      'fiyat' => $_POST['slider_fiyat'],
      'aciklama' => $_POST['slider_aciklama'],



      'link' => $_POST['slider_link'],
      'sira' => $_POST['slider_sira'],
      'durum' => $_POST['slider_durum'],
      'resimyol' => $refimgyol,
    ));
    

    $slider_id=$_POST['slider_id'];

    if ($update) {

      $resimsilunlink=$_POST['slider_resimyol'];
      unlink("../../$resimsilunlink");

      Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

    } else {

      Header("Location:../production/slider-duzenle.php?durum=no");
    }



  } else {

    $duzenle=$db->prepare("UPDATE slider SET
      slider_ad=:ad,
      
      slider_fiyat=:fiyat,
            slider_aciklama=:aciklama,



      slider_link=:link,
      slider_sira=:sira,
      slider_durum=:durum   
      WHERE slider_id={$_POST['slider_id']}");
    $update=$duzenle->execute(array(
      'ad' => $_POST['slider_ad'],
     
      'fiyat' => $_POST['slider_fiyat'],
      'aciklama' => $_POST['slider_aciklama'],


      'link' => $_POST['slider_link'],
      'sira' => $_POST['slider_sira'],
      'durum' => $_POST['slider_durum']
    ));

    $slider_id=$_POST['slider_id'];

    if ($update) {

      Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

    } else {

      Header("Location:../production/slider-duzenle.php?durum=no");
    }
  }

}

// Slider Düzenleme Bitiş

if ($_GET['slidersil']=="ok") {
  
  $sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
  $kontrol=$sil->execute(array(
    'slider_id' => $_GET['slider_id']
    ));

  if ($kontrol) {

    $resimsilunlink=$_GET['slider_resimyol'];
    unlink("../../$resimsilunlink");

    Header("Location:../production/slider.php?durum=ok");

  } else {

    Header("Location:../production/slider.php?durum=no");
  }

}




if (isset($_POST['mesajgonder'])) {

  $kullanici_gel=$_POST['kullanici_gel'];


  $kaydet=$db->prepare("INSERT INTO mesaj SET

    mesaj_detay=:mesaj_detay,
    kullanici_gel=:kullanici_gel,
    kullanici_gon=:kullanici_gon

    ");

  $insert=$kaydet->execute(array(

    'mesaj_detay' => $_POST['mesaj_detay'],
    'kullanici_gel' => htmlspecialchars($_POST['kullanici_gel']),
    'kullanici_gon' => htmlspecialchars( $_SESSION['userkullanici_id'])

  ));

  if ($insert) {
    
    
    Header("Location:../../profileShow.php?kullanici_id=$kullanici_gel&durum=mesOk");

  } else {

    Header("Location:../../profileShow.php?kullanici_id=$kullanici_gel&durum=no");


  }


}




if (isset($_POST['mesajcevap'])) {

  $kullanici_gel=$_POST['kullanici_gel'];
  $user=$_SESSION['userkullanici_id'];

  $kaydet=$db->prepare("INSERT INTO mesaj SET

    mesaj_detay=:mesaj_detay,
    kullanici_gel=:kullanici_gel,
    kullanici_gon=:kullanici_gon
    ");

  $insert=$kaydet->execute(array(
    'mesaj_detay' => $_POST['mesaj_detay'],
    'kullanici_gel' => htmlspecialchars($_POST['kullanici_gel']),
    'kullanici_gon' => htmlspecialchars( $_SESSION['userkullanici_id'])

  ));

  if ($insert) {
    
    
    Header("Location:../../messageDetail.php?kullanici_gel=$user&kullanici_gon=$kullanici_gel&durum=mesOk");

  } else {

    Header("Location:../../messageDetail.php?kullanici_gel=$user&kullanici_gon=$kullanici_gel&durum=mesNo");


  }


}









if (isset($_POST['logoduzenle'])) {

  
//değişken oluşturdum ve dosyayı atadım
  $uploads_dir = '../../dimg';

  @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
  @$name = $_FILES['ayar_logo']["name"];

  $benzersizsayi4=rand(20000,32000);
  //belirlenen satırdan sonrasını gösteriyor str
  $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

  





  $duzenle=$db->prepare("UPDATE ayar SET
    ayar_logo=:logo
    WHERE ayar_id=0");
  $update=$duzenle->execute(array(
    'logo' => $refimgyol
    ));



  if ($update) {

    $resimsilunlink=$_POST['eski_yol'];

    //unlink resmi silmeye yarıyor eski resmi silmek için kullandık
    unlink("../../$resimsilunlink");

    Header("Location:../production/genel-ayar.php?durum=ok");

  } else {

    Header("Location:../production/genel-ayar.php?durum=no");
  }

}





//kullanıcı girişi gelen post admingiris nameine sahipse bu kodları çalıştır
if (isset($_POST['admingiris'])) {

      $kullanici_mail=$_POST['kullanici_mail'];
      $kullanici_password=$_POST['kullanici_password'];

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password  and kullanici_yetki=:yetki");

$kullanicisor->execute(array(
'mail'=>$kullanici_mail,
'password'=>$kullanici_password,
'yetki'=>5
));


//kaç satır döndüğünü say değişkenine atadım
 $say=$kullanicisor->rowCount();

if($say==1){

//echo "doğru";

$_SESSION['kullanici_mail']=$kullanici_mail;
header("Location:../production/index.php");


}else{

header("Location:../production/login.php?durum=no");
exit;

}


}





if (isset($_POST['kullanicigiris'])) {



  echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
  echo $kullanici_password=md5($_POST['kullanici_password']); 



  $kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum and kullanici_onay=:onay");
  $kullanicisor->execute(array(
    'mail' => $kullanici_mail,
    'yetki' => 1,
    'password' => $kullanici_password,
    'durum' => 1,
    'onay'=> 1
    ));


  $say=$kullanicisor->rowCount();



  if ($say==1) {
    $kullanici_sonip = $_SERVER['REMOTE_ADDR'];

    $ipguncelle=$db->prepare("UPDATE kullanici SET

        kullanici_sonip=:kullanici_sonip
        WHERE kullanici_mail='$kullanici_mail'");

    $update=$ipguncelle->execute(array(

      'kullanici_sonip'=>$kullanici_sonip

    ));


    if($update){
    
      $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
      $kullanici_id=$kullanicicek['kullanici_id'];


//kullanıcıyı mail olarak aldığımız için mail yani direk kullanıcıyı çekiyoruz
      $lastloginsor=$db->prepare("SELECT * from lastlogin where kullanici_id=:id");
      $lastloginsor->execute(array(
        'id' => $kullanici_id
        ));

      //dönen satır sayısını belirtir
      $say=$lastloginsor->rowCount();



      if ($say==0) {


  $kaydet=$db->prepare("INSERT INTO lastlogin SET
    kullanici_id=:kullanici_id
    ");
  $insert=$kaydet->execute(array(
    'kullanici_id' => $kullanici_id
    ));

                }
        elseif($say>=1){

       date_default_timezone_set('Europe/Istanbul'); 
       $time= date("Y-m-d H:i:s");

          $loginkaydet=$db->prepare("UPDATE lastlogin SET
          last_time=:last_time
          WHERE kullanici_id=:kullanici_id");

        
        $logininsert=$loginkaydet->execute(array(
          'last_time' => $time,
          'kullanici_id'=>$kullanici_id

          ));


        }

              }


    echo $_SESSION['userkullanici_mail']=$kullanici_mail;
//anasayfa demek
    header("Location:../../profile.php");
    exit;
    
  } else {


    header("Location:../../login.php?durum=couldnot");

  }


}






if(isset($_POST['genelayarkaydet'])){
	
//tablo güncelleme yaptım burada
$ayarkaydet=$db->prepare("UPDATE ayar SET 


      ayar_title=:ayar_title,
      ayar_description=:ayar_description,
      ayar_keywords=:ayar_keywords,
      ayar_author=:ayar_author
      WHERE ayar_id=0");

$update=$ayarkaydet->execute(array( 

'ayar_title'=>$_POST['ayar_title'],
'ayar_description'=>$_POST['ayar_description'],
'ayar_keywords'=>$_POST['ayar_keywords'],
'ayar_author'=>$_POST['ayar_author']
));

if($update){
//echo "güncelleme başarılı";
header("Location:../production/genel-ayar.php?durum=ok");


}
else{

	//echo "güncelleme başarısız";

	header("Location:../production/genel-ayar.php?durum=no");

}

}


if(isset($_POST['iletisimayarkaydet'])){
	
//tablo güncelleme yaptım burada
$ayarkaydet=$db->prepare("UPDATE ayar SET 
      ayar_tel=:ayar_tel,
      ayar_gsm=:ayar_gsm,
      ayar_faks=:ayar_faks,
      ayar_mail=:ayar_mail,
      ayar_ilce=:ayar_ilce,
      ayar_il=:ayar_il,
      ayar_adres=:ayar_adres,
      ayar_mesai=:ayar_mesai
      WHERE ayar_id=0");

$update=$ayarkaydet->execute(array( 
'ayar_tel'=>$_POST['ayar_tel'],
'ayar_gsm'=>$_POST['ayar_gsm'],
'ayar_faks'=>$_POST['ayar_faks'],
'ayar_mail'=>$_POST['ayar_mail'],
'ayar_ilce'=>$_POST['ayar_ilce'],
'ayar_il'=>$_POST['ayar_il'],
'ayar_adres'=>$_POST['ayar_adres'],
'ayar_mesai'=>$_POST['ayar_mesai']
));

if($update){
//echo "güncelleme başarılı";
header("Location:../production/iletisim-ayarlar.php?durum=ok");


}
else{

	//echo "güncelleme başarısız";

	header("Location:../production/iletisim-ayarlar.php?durum=no");

}

}



if(isset($_POST['apiayarkaydet'])){
	
//tablo güncelleme yaptım burada
$ayarkaydet=$db->prepare("UPDATE ayar SET 


      ayar_maps=:ayar_maps,
      ayar_analystic=:ayar_analystic,
      ayar_zopim=:ayar_zopim
      WHERE ayar_id=0");

$update=$ayarkaydet->execute(array( 

'ayar_maps'=>$_POST['ayar_maps'],
'ayar_analystic'=>$_POST['ayar_analystic'],
'ayar_zopim'=>$_POST['ayar_zopim']
));

if($update){
//echo "güncelleme başarılı";
header("Location:../production/api-ayarlar.php?durum=ok");


}
else{

	//echo "güncelleme başarısız";

	header("Location:../production/api-ayarlar.php?durum=no");

}

}




if(isset($_POST['sosyalayarkaydet'])){
	
//tablo güncelleme yaptım burada
$ayarkaydet=$db->prepare("UPDATE ayar SET 


      ayar_facebook=:ayar_facebook,
      ayar_twitter=:ayar_twitter,
      ayar_google=:ayar_google,
            ayar_insta=:ayar_insta,

      ayar_youtube=:ayar_youtube

      WHERE ayar_id=0");

$update=$ayarkaydet->execute(array( 

'ayar_facebook'=>$_POST['ayar_facebook'],
'ayar_twitter'=>$_POST['ayar_twitter'],
'ayar_google'=>$_POST['ayar_google'],
'ayar_insta'=>$_POST['ayar_insta'],

'ayar_youtube'=>$_POST['ayar_youtube']

));

if($update){
//echo "güncelleme başarılı";
header("Location:../production/sosyal-ayarlar.php?durum=ok");


}
else{

	//echo "güncelleme başarısız";

	header("Location:../production/sosyal-ayarlar.php?durum=no");

}

}


if(isset($_POST['mailayarkaydet'])){
	
//tablo güncelleme yaptım burada
$ayarkaydet=$db->prepare("UPDATE ayar SET 


      ayar_smtphost=:ayar_smtphost,
      ayar_smtpuser=:ayar_smtpuser,
      ayar_smtppassword=:ayar_smtppassword,
      ayar_smtpport=:ayar_smtpport

      WHERE ayar_id=0");

$update=$ayarkaydet->execute(array( 

'ayar_smtphost'=>$_POST['ayar_smtphost'],
'ayar_smtpuser'=>$_POST['ayar_smtpuser'],
'ayar_smtppassword'=>$_POST['ayar_smtppassword'],
'ayar_smtpport'=>$_POST['ayar_smtpport']

));

if($update){
//echo "güncelleme başarılı";
header("Location:../production/mail-ayarlar.php?durum=ok");


}
else{

	//echo "güncelleme başarısız";

	header("Location:../production/mail-ayarlar.php?durum=no");

}

}


if(isset($_POST['hakkimizdakaydet'])){
      
//tablo güncelleme yaptım burada
$ayarkaydet=$db->prepare("UPDATE hakkimizda SET 


       hakkimizda_baslik=:hakkimizda_baslik,
      hakkimizda_icerik=:hakkimizda_icerik,
      hakkimizda_video=:hakkimizda_video,
      hakkimizda_vizyon=:hakkimizda_vizyon,
      hakkimizda_misyon=:hakkimizda_misyon

      WHERE hakkimizda_id=0");

$update=$ayarkaydet->execute(array( 

'hakkimizda_baslik'=>$_POST['hakkimizda_baslik'],
'hakkimizda_icerik'=>$_POST['hakkimizda_icerik'],
'hakkimizda_video'=>$_POST['hakkimizda_video'],
'hakkimizda_vizyon'=>$_POST['hakkimizda_vizyon'],
'hakkimizda_misyon'=>$_POST['hakkimizda_misyon']


));

if($update){
//echo "güncelleme başarılı";
header("Location:../production/hakkimizda.php?durum=ok");


}
else{

      //echo "güncelleme başarısız";

      header("Location:../production/hakkimizda.php?durum=no");

}
 
}















if (isset($_POST['siparisduzenle'])) {

      $siparis_id=$_POST['siparis_id'];

      $ayarkaydet=$db->prepare("UPDATE siparis SET
            siparis_durum=:siparis_durum
    

            WHERE siparis_id={$_POST['siparis_id']}");

      $update=$ayarkaydet->execute(array(

    'siparis_durum' => $_POST['siparis_durum']
            ));


      if ($update) {

            Header("Location:../production/siparis-duzenle.php?siparis_id=$siparis_id&durum=ok");

      } else {

            Header("Location:../production/siparis-duzenle.php?siparis_id=$siparis_id&durum=no");
      }

}




if (isset($_POST['kullaniciduzenle'])) {

      $kullanici_id=$_POST['kullanici_id'];

      $ayarkaydet=$db->prepare("UPDATE kullanici SET
            kullanici_durum=:kullanici_durum,
            kullanici_meslek=:kullanici_meslek,
            kullanici_unvan=:kullanici_unvan,
            kullanici_mail=:kullanici_mail,
            kullanici_password=:kullanici_password

            WHERE kullanici_id={$_POST['kullanici_id']}");

      $update=$ayarkaydet->execute(array(
            'kullanici_durum' => $_POST['kullanici_durum'],
            'kullanici_meslek' => $_POST['kullanici_meslek'],
            'kullanici_unvan' => $_POST['kullanici_unvan'],
            'kullanici_mail' => $_POST['kullanici_mail'],
            'kullanici_password' => $_POST['kullanici_password']
            ));


      if ($update) {

            Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

      } else {

            Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
      }

}


if (isset($_POST['kullanicibilgiguncelle'])) {

  $kullanici_id=$_POST['kullanici_id'];


// bilgileri güncellerken burayı düzenlemeyi de unutma 
  $ayarkaydet=$db->prepare("UPDATE kullanici SET
    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_il=:kullanici_il,
    kullanici_ilce=:kullanici_ilce,
    kullanici_adres=:kullanici_adres,
    kullanici_gsm=:kullanici_gsm


    WHERE kullanici_id={$_POST['kullanici_id']}");

  $update=$ayarkaydet->execute(array(
    'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
    'kullanici_il' => $_POST['kullanici_il'],
    'kullanici_ilce' => $_POST['kullanici_ilce'],
    'kullanici_adres' => $_POST['kullanici_adres'],
    'kullanici_gsm' => $_POST['kullanici_gsm']

    ));


  if ($update) {

    Header("Location:../../hesabim?durum=ok");

  } else {

    Header("Location:../../hesabim?durum=no");
  }

}





if (isset($_POST['kullanicibasicupdate'])) {

  $kullanici_id=$_POST['kullanici_id'];


// bilgileri güncellerken burayı düzenlemeyi de unutma 
  $ayarkaydet=$db->prepare("UPDATE kullanici SET


    kullanici_country=:kullanici_country,
    kullanici_Bcountry=:kullanici_Bcountry,
    kullanici_dil=:kullanici_dil,
    kullanici_special=:kullanici_special,
    kullanici_meslek=:kullanici_meslek,
    kullanici_lookAgeOne=:kullanici_lookAgeOne,
    kullanici_lookAgeTwo=:kullanici_lookAgeTwo,
    kullanici_lookGen=:kullanici_lookGen,
    kullanici_insta=:kullanici_insta,
    kullanici_snap=:kullanici_snap,
    kullanici_band=:kullanici_band,
    kullanici_iliski=:kullanici_iliski,
    kullanici_city=:kullanici_city


    WHERE kullanici_id={$_POST['kullanici_id']}");

  $update=$ayarkaydet->execute(array(
    'kullanici_country' => $_POST['kullanici_country'],
    'kullanici_Bcountry' => $_POST['kullanici_Bcountry'],
    'kullanici_dil' => $_POST['kullanici_dil'],
    'kullanici_special' => $_POST['kullanici_special'],
    'kullanici_meslek' => $_POST['kullanici_meslek'],
    'kullanici_lookAgeOne' => $_POST['kullanici_lookAgeOne'],
    'kullanici_lookAgeTwo' => $_POST['kullanici_lookAgeTwo'],
    'kullanici_lookGen' => $_POST['kullanici_lookGen'],
    'kullanici_insta' => $_POST['kullanici_insta'],
    'kullanici_snap' => $_POST['kullanici_snap'],
    'kullanici_band' => $_POST['kullanici_band'],
    'kullanici_iliski' => $_POST['kullanici_iliski'],    
    'kullanici_city' => $_POST['kullanici_city']

    ));


  if ($update) {

    Header("Location:../../edit.php?durum=ok");

  } else {

    Header("Location:../../edit.php?durum=no");
  }

}















if (isset($_POST['textupdate'])) {

  $kullanici_id=$_POST['kullanici_id'];


// bilgileri güncellerken burayı düzenlemeyi de unutma 
  $ayarkaydet=$db->prepare("UPDATE kullanici SET
    kullanici_text=:kullanici_text


    WHERE kullanici_id={$_POST['kullanici_id']}");

  $update=$ayarkaydet->execute(array(
    'kullanici_text' => $_POST['kullanici_text']

    ));


  if ($update) {

    Header("Location:../../text.php?durum=ok");

  } else {

    Header("Location:../../text.php?durum=no");
  }

}









if($_GET['kullanicisil']=="ok"){

     $sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");

     $kontrol=$sil->execute(array(
     'id'=>$_GET['kullanici_id']
    
     ));


if($kontrol){

header("location:../production/newuser.php?sil=ok");


}else{

header("location:../production/newuser.php?sil=no");



}



}













if (isset($_POST['menuduzenle'])) {

  $menu_id=$_POST['menu_id'];

  $menu_seourl=seo($_POST['menu_ad']);

  
  $ayarkaydet=$db->prepare("UPDATE menu SET
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_durum=:menu_durum
    WHERE menu_id={$_POST['menu_id']}");

  $update=$ayarkaydet->execute(array(
    'menu_ad' => $_POST['menu_ad'],
    'menu_detay' => $_POST['menu_detay'],
    'menu_url' => $_POST['menu_url'],
    'menu_sira' => $_POST['menu_sira'],
    'menu_seourl' => $menu_seourl,
    'menu_durum' => $_POST['menu_durum']
    ));


  if ($update) {

    Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

  } else {

    Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
  }

}

if($_GET['menusil']=="ok"){

     $sil=$db->prepare("DELETE from menu where menu_id=:id");

     $kontrol=$sil->execute(array(
     'id'=>$_GET['menu_id']
    
     ));


if($kontrol){

header("location:../production/menu.php?sil=ok");


}else{

header("location:../production/menu.php?sil=no");



}

}


if (isset($_POST['menuekle'])) {


      $menu_seourl=seo($_POST['menu_ad']);


      $ayarekle=$db->prepare("INSERT INTO menu SET
            menu_ad=:menu_ad,
            menu_detay=:menu_detay,
            menu_url=:menu_url,
            menu_sira=:menu_sira,
            menu_seourl=:menu_seourl,
            menu_durum=:menu_durum
            ");

      $insert=$ayarekle->execute(array(
            'menu_ad' => $_POST['menu_ad'],
            'menu_detay' => $_POST['menu_detay'],
            'menu_url' => $_POST['menu_url'],
            'menu_sira' => $_POST['menu_sira'],
            'menu_seourl' => $menu_seourl,
            'menu_durum' => $_POST['menu_durum']
            ));


      if ($insert) {

            Header("Location:../production/menu.php?durum=ok");

      } else {

            Header("Location:../production/menu.php?durum=no");
      }


}


if (isset($_POST['kategoriduzenle'])) {

  $kategori_id=$_POST['kategori_id'];
  $kategori_seourl=seo($_POST['kategori_ad']);

  
  $kaydet=$db->prepare("UPDATE kategori SET
    kategori_ad=:ad,
    kategori_durum=:kategori_durum, 
    kategori_seourl=:seourl,
    kategori_ust=:ust,
    kategori_sira=:sira

    WHERE kategori_id={$_POST['kategori_id']}");
  $update=$kaydet->execute(array(
    'ad' => $_POST['kategori_ad'],
    'ust' => $_POST['kategori_ust'],
    'kategori_durum' => $_POST['kategori_durum'],
    'seourl' => $kategori_seourl,
    'sira' => $_POST['kategori_sira']   
    ));

  if ($update) {

    Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

  } else {

    Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
  }

}


if (isset($_POST['kategoriekle'])) {

  $kategori_seourl=seo($_POST['kategori_ad']);

  $kaydet=$db->prepare("INSERT INTO kategori SET
    kategori_ad=:ad,
    kategori_durum=:kategori_durum,
        kategori_ust=:ust, 
    kategori_seourl=:seourl,
    kategori_sira=:sira
    ");
  $insert=$kaydet->execute(array(
    'ad' => $_POST['kategori_ad'],
    'ust' => $_POST['kategori_ust'],
    'kategori_durum' => $_POST['kategori_durum'],
    'seourl' => $kategori_seourl,
    'sira' => $_POST['kategori_sira']   
    ));

  if ($insert) {

    Header("Location:../production/kategori.php?durum=ok");

  } else {

    Header("Location:../production/kategori.php?durum=no");
  }

}



if ($_GET['kategorisil']=="ok") {
  
  $sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
  $kontrol=$sil->execute(array(
    'kategori_id' => $_GET['kategori_id']
    ));

  if ($kontrol) {

    Header("Location:../production/kategori.php?durum=ok");

  } else {

    Header("Location:../production/kategori.php?durum=no");
  }

}

if ($_GET['urunsil']=="ok") {
  
  $sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
  $kontrol=$sil->execute(array(
    'urun_id' => $_GET['urun_id']
    ));

  if ($kontrol) {

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }

}







if (isset($_POST['urunekle'])) {

  $urun_seourl=seo($_POST['urun_ad']);

  $kaydet=$db->prepare("INSERT INTO urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_video=:urun_video,
    urun_keyword=:urun_keyword,
    urun_durum=:urun_durum,
    urun_stok=:urun_stok, 
    urun_seourl=:seourl   
    ");
  $insert=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'urun_ad' => $_POST['urun_ad'],
    'urun_detay' => $_POST['urun_detay'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_video' => $_POST['urun_video'],
    'urun_keyword' => $_POST['urun_keyword'],
    'urun_durum' => $_POST['urun_durum'],
    'urun_stok' => $_POST['urun_stok'],
    'seourl' => $urun_seourl

    ));

  if ($insert) {

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }

}

if (isset($_POST['urunduzenle'])) {

  $urun_id=$_POST['urun_id'];
  $urun_seourl=seo($_POST['urun_ad']);

  $kaydet=$db->prepare("UPDATE urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_video=:urun_video,
    urun_onecikar=:urun_onecikar,
    urun_keyword=:urun_keyword,
    urun_durum=:urun_durum,
    urun_stok=:urun_stok, 
    urun_seourl=:seourl   
    WHERE urun_id={$_POST['urun_id']}");
  $update=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'urun_ad' => $_POST['urun_ad'],
    'urun_detay' => $_POST['urun_detay'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_video' => $_POST['urun_video'],
    'urun_onecikar' => $_POST['urun_onecikar'],
    'urun_keyword' => $_POST['urun_keyword'],
    'urun_durum' => $_POST['urun_durum'],
    'urun_stok' => $_POST['urun_stok'],
    'seourl' => $urun_seourl

    ));

  if ($update) {

    Header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");

  } else {

    Header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
  }

}


if (isset($_POST['kullaniciekle'])) {


  $kaydet=$db->prepare("INSERT INTO kullanici SET
  

    kullanici_unvan=:kullanici_unvan,
    kullanici_mail=:kullanici_mail,
    kullanici_password=:kullanici_password,
    kullanici_yetki=:kullanici_yetki,
    kullanici_meslek=:kullanici_meslek


    ");
  $insert=$kaydet->execute(array(
  

    'kullanici_unvan' => $_POST['kullanici_unvan'],
    'kullanici_mail' => $_POST['kullanici_mail'],
    'kullanici_password' => $_POST['kullanici_password'],
    'kullanici_yetki' => $_POST['kullanici_yetki'],
    'kullanici_meslek' => $_POST['kullanici_meslek']

    ));

  if ($insert) {

    Header("Location:../production/kullanici.php?durum=ok");

  } else {

    Header("Location:../production/kullanici.php?durum=no");
  }

}














//entry ekle sil






if (isset($_POST['entryekle'])) {

  $entry_seourl=seo($_POST['entry_ad']);

  $kaydet=$db->prepare("INSERT INTO entry SET
    kategori_id=:kategori_id,
    kullanici_id=:kullanici_id,
    entry_ad=:entry_ad,
    entry_detay=:entry_detay,
    entry_dipnot=:entry_dipnot,
    entry_seourl=:seourl   
    ");
  $insert=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'kullanici_id' => $_POST['kullanici_id'],
    'entry_ad' => $_POST['entry_ad'],
    'entry_detay' => $_POST['entry_detay'],
    'entry_dipnot' => $_POST['entry_dipnot'],
    'seourl' => $entry_seourl

    ));

  if ($insert) {

    Header("Location:../../entryadded.php?durum=ok");

  } else {

    Header("Location:../../entrynotadded.php?durum=no");
  }

}




if (isset($_POST['duyuruduzenle'])) {

  $kaydet=$db->prepare("UPDATE duyuru SET
    duy_1=:duy_1,
    duy_2=:duy_2,
    duy_3=:duy_3,
    duy_4=:duy_4");
  $update=$kaydet->execute(array(
    'duy_1' => $_POST['duy_1'],
    'duy_2' => $_POST['duy_2'],
    'duy_3' => $_POST['duy_3'],
    'duy_4' => $_POST['duy_4']

    ));

  if ($update) {

    Header("Location:../production/duyuru.php?durum=ok");

  } else {

    Header("Location:../production/duyuru.php?durum=no");
  }

}

















if (isset($_POST['entryduzenle'])) {

  $entry_id=$_POST['entry_id'];
  $entry_seourl=seo($_POST['entry_ad']);

  $kaydet=$db->prepare("UPDATE entry SET
    kategori_id=:kategori_id,
    kullanici_id=:kullanici_id,
    entry_ad=:entry_ad,
    entry_detay=:entry_detay,
    entry_dipnot=:entry_dipnot,
    entry_onecikar=:entry_onecikar,
    entry_durum=:entry_durum,
    entry_seourl=:seourl  
    WHERE entry_id={$_POST['entry_id']}");
  $update=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'kullanici_id' => $_POST['kullanici_id'],
    'entry_ad' => $_POST['entry_ad'],
    'entry_detay' => $_POST['entry_detay'],
    'entry_dipnot' => $_POST['entry_dipnot'],

    'entry_onecikar' => $_POST['entry_onecikar'],

    'entry_durum' => $_POST['entry_durum'],
    'seourl' => $entry_seourl

    ));

  if ($update) {

    Header("Location:../production/entry-duzenle.php?durum=ok&entry_id=$entry_id");

  } else {

    Header("Location:../production/entry-duzenle.php?durum=no&entry_id=$entry_id");
  }

}



if ($_GET['entrysil']=="ok") {
  
  $sil=$db->prepare("DELETE from entry where entry_id=:entry_id");
  $kontrol=$sil->execute(array(
    'entry_id' => $_GET['entry_id']
    ));

  if ($kontrol) {

    Header("Location:../production/entry.php?durum=ok");

  } else {

    Header("Location:../production/entry.php?durum=no");
  }

}


if ($_GET['foto_onay']=="ok") {

  

  
  $duzenle=$db->prepare("UPDATE kullanici SET
    
    kullanici_fotonay=:kullanici_fotonay
    
    WHERE kullanici_id={$_GET['kullanici_id']}");
  
  $update=$duzenle->execute(array(


    'kullanici_fotonay' => $_GET['kullanici_fotonay']
    ));



  if ($update) {

    

    Header("Location:../production/newuser.php?durum=ok");

  } else {

    Header("Location:../production/newuser.php?durum=no");
  }

}






if ($_GET['foto_onay2']=="ok") {

  

  
  $duzenle=$db->prepare("UPDATE kullanici SET
    
    kullanici_fotonay=:kullanici_fotonay
    
    WHERE kullanici_id={$_GET['kullanici_id']}");
  
  $update=$duzenle->execute(array(


    'kullanici_fotonay' => $_GET['kullanici_fotonay']
    ));



  if ($update) {

    

    Header("Location:../production/approve.php?durum=ok");

  } else {

    Header("Location:../production/approve.php?durum=no");
  }

}











if ($_GET['entry_onecikar']=="ok") {

  

  
  $duzenle=$db->prepare("UPDATE entry SET
    
    entry_onecikar=:entry_onecikar
    
    WHERE entry_id={$_GET['entry_id']}");
  
  $update=$duzenle->execute(array(


    'entry_onecikar' => $_GET['entry_one']
    ));



  if ($update) {

    

    Header("Location:../production/entry.php?durum=ok");

  } else {

    Header("Location:../production/entry.php?durum=no");
  }

}



if ($_GET['entry_durum']=="ok") {

  

  
  $duzenle=$db->prepare("UPDATE entry SET
    
    entry_durum=:entry_durum
    
    WHERE entry_id={$_GET['entry_id']}");
  
  $update=$duzenle->execute(array(


    'entry_durum' => $_GET['entry_dur']
    ));



  if ($update) {

    

    Header("Location:../production/entry.php?durum=ok");

  } else {

    Header("Location:../production/entry.php?durum=no");
  }

}










if (isset($_POST['wordekle'])) {

  $word_seourl=seo($_POST['word_ad']);

  $kaydet=$db->prepare("INSERT INTO word SET
    kategori_id=:kategori_id,
    kullanici_id=:kullanici_id,
    word_ad=:word_ad,
    word_detay=:word_detay,
    word_dipnot=:word_dipnot,
    word_seourl=:seourl   
    ");
  $insert=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'kullanici_id' => $_POST['kullanici_id'],
    'word_ad' => $_POST['word_ad'],
    'word_detay' => $_POST['word_detay'],
    'word_dipnot' => $_POST['word_dipnot'],
    'seourl' => $word_seourl

    ));

  if ($insert) {

    Header("Location:../../wordadded.php?durum=ok");

  } else {

    Header("Location:../../wordnotadded.php?durum=no");
  }

}





















if (isset($_POST['wordduzenle'])) {

  $word_id=$_POST['word_id'];
  $word_seourl=seo($_POST['word_ad']);

  $kaydet=$db->prepare("UPDATE word SET
    kategori_id=:kategori_id,
    kullanici_id=:kullanici_id,
    word_ad=:word_ad,
    word_detay=:word_detay,
    word_dipnot=:word_dipnot,
    word_onecikar=:word_onecikar,
    word_durum=:word_durum,
    word_seourl=:seourl  
    WHERE word_id={$_POST['word_id']}");
  $update=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'kullanici_id' => $_POST['kullanici_id'],
    'word_ad' => $_POST['word_ad'],
    'word_detay' => $_POST['word_detay'],
    'word_dipnot' => $_POST['word_dipnot'],

    'word_onecikar' => $_POST['word_onecikar'],

    'word_durum' => $_POST['word_durum'],
    'seourl' => $word_seourl

    ));

  if ($update) {

    Header("Location:../production/word-duzenle.php?durum=ok&word_id=$word_id");

  } else {

    Header("Location:../production/word-duzenle.php?durum=no&word_id=$word_id");
  }

}



if ($_GET['wordsil']=="ok") {
  
  $sil=$db->prepare("DELETE from word where word_id=:word_id");
  $kontrol=$sil->execute(array(
    'word_id' => $_GET['word_id']
    ));

  if ($kontrol) {

    Header("Location:../production/word.php?durum=ok");

  } else {

    Header("Location:../production/word.php?durum=no");
  }

}




if ($_GET['word_onecikar']=="ok") {

  

  
  $duzenle=$db->prepare("UPDATE word SET
    
    word_onecikar=:word_onecikar
    
    WHERE word_id={$_GET['word_id']}");
  
  $update=$duzenle->execute(array(


    'word_onecikar' => $_GET['word_one']
    ));



  if ($update) {

    

    Header("Location:../production/word.php?durum=ok");

  } else {

    Header("Location:../production/word.php?durum=no");
  }

}



if ($_GET['word_durum']=="ok") {

  

  
  $duzenle=$db->prepare("UPDATE word SET
    
    word_durum=:word_durum
    
    WHERE word_id={$_GET['word_id']}");
  
  $update=$duzenle->execute(array(


    'word_durum' => $_GET['word_dur']
    ));



  if ($update) {

    

    Header("Location:../production/word.php?durum=ok");

  } else {

    Header("Location:../production/word.php?durum=no");
  }

}






if (isset($_POST['yorumkaydet1'])) {


  $gelen_url=$_POST['gelen_url'];

  $ayarekle=$db->prepare("INSERT INTO comment SET
    com_detay=:com_detay,
    kullanici_id=:kullanici_id,
    entry_id=:entry_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'com_detay' => $_POST['com_detay'],
    'kullanici_id' => $_POST['kullanici_id'],
    'entry_id' => $_POST['entry_id']
    
    ));


  if ($insert) {

    Header("Location:../../comadded.php?durum=ok");

  } else {

    Header("Location:../../comnotdded.php?durum=no");
  }

}







if (isset($_POST['commentwall'])) {


  $gelen_url=$_POST['gelen_url'];
  $idw=$_POST['wall_id'];

  $ayarekle=$db->prepare("INSERT INTO wallcomment SET
    com_detay=:com_detay,
    kullanici_id=:kullanici_id,
    wall_id=:wall_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'com_detay' => $_POST['com_detay'],
    'kullanici_id' => $_POST['kullanici_id'],
    'wall_id' => $_POST['wall_id']
    
    ));


  if ($insert) {

    Header("Location:../../profileShow.php?kullanici_id=$idw&durum=comok");

  } else {

    Header("Location:../../profileShow.php?kullanici_id=$idw&durum=no");
  }

}
















if (isset($_POST['yorumkaydet2'])) {


  $gelen_url=$_POST['gelen_url'];

  $ayarekle=$db->prepare("INSERT INTO comment2 SET
    com2_detay=:com2_detay,
    com2_cumle=:com2_cumle,
    kullanici_id=:kullanici_id,
    word_id=:word_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'com2_detay' => $_POST['com2_detay'],
    'com2_cumle' => $_POST['com2_cumle'],
    'kullanici_id' => $_POST['kullanici_id'],
    'word_id' => $_POST['word_id']
    
    ));


  if ($insert) {

    Header("Location:../../comadded.php?durum=ok");

  } else {

    Header("Location:../../comnotdded.php?durum=no");
  }

}












if (isset($_POST['yorumkaydet'])) {


  $gelen_url=$_POST['gelen_url'];

  $ayarekle=$db->prepare("INSERT INTO yorumlar SET
    yorum_detay=:yorum_detay,
    kullanici_id=:kullanici_id,
    urun_id=:urun_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'yorum_detay' => $_POST['yorum_detay'],
    'kullanici_id' => $_POST['kullanici_id'],
    'urun_id' => $_POST['urun_id']
    
    ));


  if ($insert) {

    Header("Location:$gelen_url?durum=ok");

  } else {

    Header("Location:$gelen_url?durum=no");
  }

}




if (isset($_POST['faventryekle'])) {


  $ayarekle=$db->prepare("INSERT INTO faventry SET
    kullanici_mail=:kullanici_mail,
    entry_id=:entry_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'kullanici_mail' => $_POST['kullanici_mail'],
    'entry_id' => $_POST['entry_id']
    
    ));


  if ($insert) {

    Header("Location:../../fav?durum=ok");

  } else {

    Header("Location:../../fav?durum=no");
  }

}

if ($_GET['faventrysil']=="ok") {
  
  $sil=$db->prepare("DELETE from faventry where faventry_id=:faventry_id");
  $kontrol=$sil->execute(array(
    'faventry_id' => $_GET['faventry_id']
    ));

  if ($kontrol) {

    
    Header("Location:../../fav?durum=ok");

  } else {

    Header("Location:../../fav?durum=no");
  }

}

if ($_GET['profilentrysil']=="ok") {
  
  $sil=$db->prepare("DELETE from entry where entry_id=:entry_id");
  $kontrol=$sil->execute(array(
    'entry_id' => $_GET['entry_id']
    ));

  if ($kontrol) {

    
    Header("Location:../../profil?durum=ok");

  } else {

    Header("Location:../../profil?durum=no");
  }

}










if (isset($_POST['favwordekle'])) {


  $ayarekle=$db->prepare("INSERT INTO favword SET
    kullanici_mail=:kullanici_mail,
    word_id=:word_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'kullanici_mail' => $_POST['kullanici_mail'],
    'word_id' => $_POST['word_id']
    
    ));


  if ($insert) {

    Header("Location:../../fav?durum=ok");

  } else {

    Header("Location:../../fav?durum=no");
  }

}

if ($_GET['favwordsil']=="ok") {
  
  $sil=$db->prepare("DELETE from favword where favword_id=:favword_id");
  $kontrol=$sil->execute(array(
    'favword_id' => $_GET['favword_id']
    ));

  if ($kontrol) {

    
    Header("Location:../../fav?durum=ok");

  } else {

    Header("Location:../../fav?durum=no");
  }

}


if ($_GET['profilwordsil']=="ok") {
  
  $sil=$db->prepare("DELETE from word where word_id=:word_id");
  $kontrol=$sil->execute(array(
    'word_id' => $_GET['word_id']
    ));

  if ($kontrol) {

    
    Header("Location:../../profil?durum=ok");

  } else {

    Header("Location:../../profil?durum=no");
  }

}










if (isset($_POST['contactal'])) {


  $ayarekle=$db->prepare("INSERT INTO contact SET
    kullanici_id=:kullanici_id,
    cont_baslik=:cont_baslik,
    cont_detay=:cont_detay  
    
    ");

  $insert=$ayarekle->execute(array(
    'kullanici_id' => $_POST['kullanici_id'],
    'cont_baslik' => $_POST['cont_baslik'],
    'cont_detay' => $_POST['cont_detay']
    
    ));


  if ($insert) {

    Header("Location:../../contact?durum=ok");

  } else {

    Header("Location:../../contact?durum=no");
  }

}
































if (isset($_POST['sepetekle'])) {


  $ayarekle=$db->prepare("INSERT INTO sepet SET
    urun_adet=:urun_adet,
    kullanici_id=:kullanici_id,
    urun_id=:urun_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'urun_adet' => $_POST['urun_adet'],
    'kullanici_id' => $_POST['kullanici_id'],
    'urun_id' => $_POST['urun_id']
    
    ));


  if ($insert) {

    Header("Location:../../sepet?durum=ok");

  } else {

    Header("Location:../../sepet?durum=no");
  }

}





if ($_GET['entrylikeart']=="ok") {
 
  $sil=$db->prepare("UPDATE entry SET entry_iyi=(entry_iyi+1)   where entry_id=:entry_id");
  $kontrol=$sil->execute(array(
    'entry_id' => $_GET['entry_id']

    ));

  if ($kontrol) {

   
    Header("Location:../../index?durum=ok");

  } else {

    Header("Location:../../index?durum=no");
  }

}



if ($_GET['entrydislikeart']=="ok") {
 
  $sil=$db->prepare("UPDATE entry SET entry_kotu=(entry_kotu+1)   where entry_id=:entry_id");
  $kontrol=$sil->execute(array(
    'entry_id' => $_GET['entry_id']

    ));

  if ($kontrol) {

   
    Header("Location:../../index?durum=ok");

  } else {

    Header("Location:../../index?durum=no");
  }

}







if ($_GET['urun_onecikar']=="ok") {

  

  
  $duzenle=$db->prepare("UPDATE urun SET
    
    urun_onecikar=:urun_onecikar
    
    WHERE urun_id={$_GET['urun_id']}");
  
  $update=$duzenle->execute(array(


    'urun_onecikar' => $_GET['urun_one']
    ));



  if ($update) {

    

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }

}




if ($_GET['stokazalt']=="ok") {
  
  $sil=$db->prepare("UPDATE urun SET urun_stok=(urun_stok-urun_adet)   where urun_id=:urun_id");
  $kontrol=$sil->execute(array(
    'urun_id' => $_GET['urun_id']

    ));

  if ($kontrol) {

    
    Header("Location:../../siparislerim?durum=ok");

  } else {

    Header("Location:../../siparislerim?durum=no");
  }

}





if ($_GET['com_onay']=="ok") {

  
  $duzenle=$db->prepare("UPDATE comment SET
    
    com_onay=:com_onay
    
    WHERE com_id={$_GET['com_id']}");
  
  $update=$duzenle->execute(array(

    'com_onay' => $_GET['com_onay']
    ));



  if ($update) {

    

    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }

}


if ($_GET['yorum_onay1']=="ok") {

  
  $duzenle=$db->prepare("UPDATE comment SET
    
    com_onay=:com_onay
    
    WHERE com_id={$_GET['com_id']}");
  
  $update=$duzenle->execute(array(

    'com_onay' => $_GET['yorum_one']
    ));



  if ($update) {

    

    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }

}










if ($_GET['yorum_onay']=="ok") {

  
  $duzenle=$db->prepare("UPDATE yorumlar SET
    
    yorum_onay=:yorum_onay
    
    WHERE yorum_id={$_GET['yorum_id']}");
  
  $update=$duzenle->execute(array(

    'yorum_onay' => $_GET['yorum_one']
    ));



  if ($update) {

    

    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }

}











if ($_GET['sepetsil']=="ok") {
  
  $sil=$db->prepare("DELETE from sepet where sepet_id=:sepet_id");
  $kontrol=$sil->execute(array(
    'sepet_id' => $_GET['sepet_id']
    ));

  if ($kontrol) {

    
    Header("Location:../../sepet?durum=ok");

  } else {

    Header("Location:../../sepet?durum=no");
  }

}


if ($_GET['sepetazalt']=="ok") {
  
  $sil=$db->prepare("UPDATE sepet SET urun_adet=(urun_adet-1)   where sepet_id=:sepet_id");
  $kontrol=$sil->execute(array(
    'sepet_id' => $_GET['sepet_id']

    ));

  if ($kontrol) {

    
    Header("Location:../../sepet?durum=ok");

  } else {

    Header("Location:../../sepet?durum=no");
  }

}


if ($_GET['sepetart']=="ok") {
  
  $sil=$db->prepare("UPDATE sepet SET urun_adet=(urun_adet+1)   where sepet_id=:sepet_id");
  $kontrol=$sil->execute(array(
    'sepet_id' => $_GET['sepet_id']

    ));

  if ($kontrol) {

    
    Header("Location:../../sepet?durum=ok");

  } else {

    Header("Location:../../sepet?durum=no");
  }

}





if ($_GET['yorumsil']=="ok") {
  
  $sil=$db->prepare("DELETE from yorumlar where yorum_id=:yorum_id");
  $kontrol=$sil->execute(array(
    'yorum_id' => $_GET['yorum_id']
    ));

  if ($kontrol) {

    
    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }

}

if ($_GET['com1sil']=="ok") {
  
  $sil=$db->prepare("DELETE from comment where com_id=:com_id");
  $kontrol=$sil->execute(array(
    'com_id' => $_GET['com_id']
    ));

  if ($kontrol) {

    
    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }

}

if ($_GET['com2sil']=="ok") {
  
  $sil=$db->prepare("DELETE from comment2 where com2_id=:com2_id");
  $kontrol=$sil->execute(array(
    'com2_id' => $_GET['com2_id']
    ));

  if ($kontrol) {

    
    Header("Location:../production/yorum2.php?durum=ok");

  } else {

    Header("Location:../production/yorum2.php?durum=no");
  }

}










if (isset($_POST['bankaekle'])) {

  $kaydet=$db->prepare("INSERT INTO banka SET
    banka_ad=:ad,
    banka_durum=:banka_durum, 
    banka_hesapadsoyad=:banka_hesapadsoyad,
    banka_iban=:banka_iban
    ");
  $insert=$kaydet->execute(array(
    'ad' => $_POST['banka_ad'],
    'banka_durum' => $_POST['banka_durum'],
    'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
    'banka_iban' => $_POST['banka_iban']    
    ));

  if ($insert) {

    Header("Location:../production/banka.php?durum=ok");

  } else {

    Header("Location:../production/banka.php?durum=no");
  }

}


if (isset($_POST['bankaduzenle'])) {

  $banka_id=$_POST['banka_id'];

  $kaydet=$db->prepare("UPDATE banka SET

    banka_ad=:ad,
    banka_durum=:banka_durum, 
    banka_hesapadsoyad=:banka_hesapadsoyad,
    banka_iban=:banka_iban
    WHERE banka_id={$_POST['banka_id']}");
  $update=$kaydet->execute(array(
    'ad' => $_POST['banka_ad'],
    'banka_durum' => $_POST['banka_durum'],
    'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
    'banka_iban' => $_POST['banka_iban']    
    ));

  if ($update) {

    Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=ok");

  } else {

    Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
  }


  

}


if ($_GET['bankasil']=="ok") {
  
  $sil=$db->prepare("DELETE from banka where banka_id=:banka_id");
  $kontrol=$sil->execute(array(
    'banka_id' => $_GET['banka_id']
    ));

  if ($kontrol) {

    
    Header("Location:../production/banka.php?durum=ok");

  } else {

    Header("Location:../production/banka.php?durum=no");
  }

}







if (isset($_POST['dogrula'])) {

   $kullanici_mail=$_POST['kullanici_mail'];
   $kullanici_code=$_POST['kullanici_code'];

  $kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:kullanici_mail");
  $kullanicisor->execute(array(
    'kullanici_mail' => $kullanici_mail
    ));

      //dönen satır sayısını belirtir
  $say=$kullanicisor->rowCount();
  
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
  $id=$kullanicicek['kullanici_id'];

  if ($say==0) {
   header("Location:../../validate.php?durum=no");
  }else{

if ($kullanici_code==$id) {
    $kullanici_onay=1;

  $kaydet=$db->prepare("UPDATE kullanici SET
      kullanici_onay=:kullanici_onay
    WHERE kullanici_id=$id");
  $update=$kaydet->execute(array(
    'kullanici_onay' => $kullanici_onay   
    ));

}

  if ($update) {

    header("Location:../../validate.php?durum=validOk");

  } else {

     header("Location:../../validate.php?durum=no");
  }

}
  

}







if (isset($_POST['kullanicisifreguncelle'])) {

  echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
  echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
  echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

  $kullanici_password=md5($kullanici_eskipassword);


  $kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
  $kullanicisor->execute(array(
    'password' => $kullanici_password
    ));

      //dönen satır sayısını belirtir
  $say=$kullanicisor->rowCount();



  if ($say==0) {

    header("Location:../../editpass.php?durum=old");



  } else {



  //eski şifre doğruysa başla


    if ($kullanici_passwordone==$kullanici_passwordtwo) {


      if (strlen($kullanici_passwordone)>=8) {


        //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
        $password=md5($kullanici_passwordone);

        $kullanici_yetki=1;

        $kullanicikaydet=$db->prepare("UPDATE kullanici SET
          kullanici_password=:kullanici_password
          WHERE kullanici_id={$_POST['kullanici_id']}");

        
        $insert=$kullanicikaydet->execute(array(
          'kullanici_password' => $password
          ));

        if ($insert) {


          header("Location:../../editpass.php?durum=ok");


        //Header("Location:../production/genel-ayarlar.php?durum=ok");

        } else {


          header("Location:../../editpass.php?durum=no");
        }





    // Bitiş



      } else {


        header("Location:../../editpass.php?durum=dif");


      }



    } else {

      header("Location:../../editpass.php?durum=dif");

      exit;


    }


  }

  exit;

  if ($update) {

    header("Location:../../editpass.php?durum=ok");

  } else {

    header("Location:../../editpass.php?durum=no");
  }

}


//Sipariş İşlemleri

if (isset($_POST['bankasiparisekle'])) {


  $siparis_tip="Banka Havalesi";


  $kaydet=$db->prepare("INSERT INTO siparis SET
    kullanici_id=:kullanici_id,
    siparis_tip=:siparis_tip, 
    siparis_banka=:siparis_banka,

    siparis_toplam=:siparis_toplam
    ");
  $insert=$kaydet->execute(array(
    'kullanici_id' => $_POST['kullanici_id'],
    'siparis_tip' => $siparis_tip,
    'siparis_banka' => $_POST['siparis_banka'],
    'siparis_toplam' => $_POST['siparis_toplam']    
    ));

  if ($insert) {

    //Sipariş başarılı kaydedilirse...

    echo $siparis_id = $db->lastInsertId();

    echo "<hr>";


    $kullanici_id=$_POST['kullanici_id'];
    $sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
    $sepetsor->execute(array(
      'id' => $kullanici_id
      ));

    while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

      $urun_id=$sepetcek['urun_id']; 
      $urun_adet=$sepetcek['urun_adet'];


//tanımlamaları burada yaptım unutma kullanıcı adresi sipariş detaya aktardım müşteri siparişini admin paneline aktardığım yer için database e kaydediyor

      $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
      $kullanicisor->execute(array(
        'id' => $kullanici_id
        ));

// burada fetch tanımladıktan sonra mutlaka aşağıda insert edeceğimiz şeyleri burada tanımlamam gerekiyor yoksa sipariş verdiğimde sadece ürün fiyatı gösterip db e düşüyor

      $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
            $kullanici_adsoyad=$kullanicicek['kullanici_adsoyad'];
            $kullanici_adres=$kullanicicek['kullanici_adres'];
                        $kullanici_gsm=$kullanicicek['kullanici_gsm'];
                        $kullanici_il=$kullanicicek['kullanici_il'];
                        $kullanici_ilce=$kullanicicek['kullanici_ilce'];



//toplam fiyatı db e kaydetsin diye db e bağlanıp sipariş toplamı tanımladım değişken olarak


  /*             $kullanici_id=$kullanicicek['kullanici_id'];

              $siparissor=$db->prepare("SELECT * FROM siparis where kullanici_id=:id");
              $siparissor->execute(array(
                'id' => $kullanici_id
                ));

            $sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);
                        $siparis_toplam=$sipariscek['siparis_toplam'];


toplam fiyat sürekli 3500 gösteriyor çıkardım



*/



      $urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
      $urunsor->execute(array(
        'id' => $urun_id
        ));

      $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
            $urun_ad=$uruncek['urun_ad'];

      echo $urun_fiyat=$uruncek['urun_fiyat'];


      
      $kaydet=$db->prepare("INSERT INTO siparis_detay SET
        
        siparis_id=:siparis_id,
                siparis_tip=:siparis_tip,
              

        urun_id=:urun_id, 
        urun_fiyat=:urun_fiyat,
        urun_adet=:urun_adet,
        urun_ad=:urun_ad,
        kullanici_adsoyad=:kullanici_adsoyad,
        kullanici_adres=:kullanici_adres,
                kullanici_gsm=:kullanici_gsm,
                                kullanici_il=:kullanici_il,
                                  kullanici_ilce=:kullanici_ilce






        ");
      $insert=$kaydet->execute(array(
        'siparis_id' => $siparis_id,
                'siparis_tip' => $siparis_tip,
               

        'urun_id' => $urun_id,
        'urun_fiyat' => $urun_fiyat,
        'urun_adet' => $urun_adet,
        'urun_ad' => $urun_ad,
        'kullanici_adsoyad' => $kullanici_adsoyad,
         'kullanici_adres' => $kullanici_adres,
             'kullanici_gsm' => $kullanici_gsm,
               'kullanici_il' => $kullanici_il,
                 'kullanici_ilce' => $kullanici_ilce







        ));


    }

    if ($insert) {

      

      //Sipariş detay kayıtta başarıysa sepeti boşalt

      $sil=$db->prepare("DELETE from sepet where kullanici_id=:kullanici_id");
      $kontrol=$sil->execute(array(
        'kullanici_id' => $kullanici_id
        ));

      
      Header("Location:../../siparislerim?durum=ok");
      exit;


    }

    




  } else {

    echo "başarısız";

    //Header("Location:../production/siparis.php?durum=no");
  }



}


if(isset($_POST['urunfotosil'])) {

  $urun_id=$_POST['urun_id'];


  echo $checklist = $_POST['urunfotosec'];

  
  foreach($checklist as $list) {

    $sil=$db->prepare("DELETE from urunfoto where urunfoto_id=:urunfoto_id");
    $kontrol=$sil->execute(array(
      'urunfoto_id' => $list
      ));
  }

  if ($kontrol) {

    Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=ok");

  } else {

    Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=no");
  }


} 


if (isset($_POST['mailayarkaydet'])) {
  
  $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_smtphost=:smtphost,
    ayar_smtpuser=:smtpuser,
    ayar_smtppassword=:smtppassword,
    ayar_smtpport=:smtpport
    WHERE ayar_id=0");
  $update=$ayarkaydet->execute(array(
    'smtphost' => $_POST['ayar_smtphost'],
    'smtpuser' => $_POST['ayar_smtpuser'],
    'smtppassword' => $_POST['ayar_smtppassword'],
    'smtpport' => $_POST['ayar_smtpport']
    ));

  if ($update) {

    Header("Location:../production/mail-ayar.php?durum=ok");

  } else {

    Header("Location:../production/mail-ayar.php?durum=no");
  }

}









?>
