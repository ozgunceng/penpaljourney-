<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');

require_once '../nedmin/netting/baglan.php';
require_once '../nedmin/production/fonksiyon.php';






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
      $kullanicisor=$db->prepare("SELECT * from kullanici WHERE kullanici_mail=:kullanici_mail");
      $kullanicisor->execute(array(
        'kullanici_mail' => $kullanici_mail
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

      $kullanicisor2=$db->prepare("SELECT * from kullanici WHERE kullanici_mail=:kullanici_mail");
      $kullanicisor2->execute(array(
        'kullanici_mail' => $kullanici_mail
        ));


      


          $kullanicicek2=$kullanicisor2->fetch(PDO::FETCH_ASSOC);
          $uretilensifre=$kullanicicek2['kullanici_id'];
          
          



  //Mail Gönderim Başlat

$from="info@fuzzifier.com";
$gonderici="Penpal Journey User Validation";
$host="mail.info@fuzzifier.com";
$pass="Og.6221635.";
$konu="Penpal Journey User Validation";

$yenisifre=" Validation Code : ".$uretilensifre;



require("class.phpmailer.php"); // PHPMailer dosyamizi çagiriyoruz
$mail = new PHPMailer(); // Sinifimizi $mail degiskenine atadik
$mail->IsSMTP(true);  // Mailimizin SMTP ile gönderilecegini belirtiyoruz


$mail->From     = $from;//"admin@localhost"; //Gönderen kisminda yer alacak e-mail adresi
$mail->Sender   = $from;//"admin@localhost";//Gönderen Mail adresi
//$mail->ReplyTo  = ($_POST["mailiniz"]);//"admin@localhost";//Tekrar gönderimdeki mail adersi

$mail->AddReplyTo=($from);//"admin@localhost";//Tekrar gönderimdeki mail adersi
$mail->AddAddress($kullanici_mail); // Mail gönderilecek adresleri ekliyoruz.
//$mail->AddAttachment('naci.jpg');
$mail->FromName = $gonderici;//"PHP Mailer";//gönderenin ismi
$mail->Host     = 'localhost';//"localhost"; //SMTP server adresi
$mail->isSMTP();
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = true; 
$mail->Port = 25; 
$mail->CharSet = 'UTF-8'; //Türkçe yazı karakterleri için CharSet  ayarını bu şekilde yapıyoruz.
$mail->Username = $from;//"admin@localhost"; //SMTP kullanici adi
$mail->Password = $pass;//""; //SMTP mailinizin sifresi
//$mail->WordWrap = 50;
$mail->IsHTML(true); //Mailimizin HTML formatinda hazirlanacagini bildiriyoruz.
$mail->Subject  = $konu;//"Deneme Maili"; // Mailin Konusu Konu
//Mailimizin gövdesi: (HTML ile)


$mail->Body = "<h1>Welcome</h1> <b> <h1> $yenisifre  </h1></> <h1>Hello There! You can validate your profile with the [$yenisifre] on the validation page('http://penpaljourney.com/validate.php') "."<p>Or you can click this link: 'http://penpaljourney.com/validate.php' </p> </h1>"." <h1>Looking forward
to see you there.<br>  Do not forget : <i> We are loss without you!<i> <br> Kind Regards <br> Penpal Journey CEO </h1>" ;





if ($mail->Send()) {
  
   header("Location:../../validate.php?durum=kayitbasarili");
  exit;

}




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






?>