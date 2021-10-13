<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');

require_once '../nedmin/netting/baglan.php';
require_once '../nedmin/production/fonksiyon.php';




if (isset($_POST['commentwall'])) {

 $gelen_url=$_POST['gelen_url'];
  $idw=$_POST['wall_id'];

$kullaniciadsor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
  $kullaniciadsor->execute(array(
    'kullanici_id' => $idw
  ));
$say=$kullaniciadsor->rowCount();


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


$kullaniciadcek=$kullaniciadsor->fetch(PDO::FETCH_ASSOC);

$kullanici_mail=$kullaniciadcek['kullanici_mail'];
$ad=$kullaniciadcek['kullanici_ad'];





$from="info@fuzzifier.com";
$gonderici="Penpal Journey New Message";
$host="mail.info@fuzzifier.com";
$pass="Og.6221635.";
$konu="You Have New Comment on Penpal Journey";
$kulname=$ad;

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
$mail->Body = $kulname;
    


$mail->Body = "<h1> Dear $kulname, </h1> <b>  <h1>You have a new comment on your Penpal Journey wall! You can use that quick link to login .('http://penpaljourney.com/login.php') "." <h1>Looking forward
to see you there.<br>  Do not forget : <i> We are loss without you!<i> <br> Best Wishes <br> Penpal Journey CEO </h1>" ;


if ($mail->Send()) {
  
   Header("Location:../../profileShow.php?kullanici_id=$idw&durum=comok");
  exit;
}




else {

  Header("Location:../../profileShow.php?kullanici_id=$idw&durum=no");
        exit;
} 





}
}


?>