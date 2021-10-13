<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');

require_once '../nedmin/netting/baglan.php';
require_once '../nedmin/production/fonksiyon.php';


if (isset($_POST['resend'])) {

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
	$kullanicisor->execute(array(
		'mail' => $_POST['kullanici_mail']
	));
	$say=$kullanicisor->rowCount();

	$kullanici_mail=$_POST['kullanici_mail'];


	if ($say==0) {
		
		Header("Location:../validate.php?durum=no");
		exit;

	} else {

        	$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
        	$uretilensifre=$kullanicicek['kullanici_id'];



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
$mail->Body = $yenisifre;



$mail->Body = "<h1>Welcome</h1> <b> <h1> $yenisifre  </h1></> <h1>Hello There! You can validate your profile with the [$yenisifre] on the validation page('http://penpaljourney.com/validate.php') "."<p>Or you can click this link: 'http://penpaljourney.com/validate.php' </p> </h1>"." <h1>Looking forward
to see you there.<br>  Do not forget : <i> We are loss without you!<i> <br> Kind Regards <br> Penpal Journey CEO </h1>" ;






if ($mail->Send()) {
  
   header("Location:../../validate.php?durum=sent");
  exit;

}

 


else {

  header("Location:../../validate.php?durum=no");
        
        exit;


} 





}
}


?>