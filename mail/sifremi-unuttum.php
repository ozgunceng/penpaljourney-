<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');

require_once '../nedmin/netting/baglan.php';
require_once '../nedmin/production/fonksiyon.php';

if (isset($_POST['sifremiunuttum'])) {
	
	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
	$kullanicisor->execute(array(
		'mail' => $_POST['kullanici_mail']
	));
	$say=$kullanicisor->rowCount();

	$kullanici_mail=$_POST['kullanici_mail'];


	if ($say==0) {
		
		Header("Location:../register.php");
		exit;

	} else {

		$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

		$uretilensifre=uniqid();
		$sifrekaydet=md5($uretilensifre);

		//Veritabanı kaydını yap

		$sifreguncelle=$db->prepare("UPDATE kullanici SET


			kullanici_password=:kullanici_password

			WHERE kullanici_mail='$kullanici_mail' ");


		$update=$sifreguncelle->execute(array(


			'kullanici_password' => $sifrekaydet

		));


		//Varitabanı kaydı bitir
		

	//Mail Gönderim Başlat

$from="info@fuzzifier.com";
$gonderici="Penpal Journey User Validation";
$host="mail.info@fuzzifier.com";
$pass="Og.6221635.";
$konu="Penpal Journey User Validation";

$yenisifre=" New Generated Password  : ".$uretilensifre;



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
$mail->Body = "<h1>New Password Arrived!</h1> <b> <h1> $yenisifre  </h1></> <h1>Hello There! You can login to your profile with the [$yenisifre] on the login page('https://penpaljourney.com/login.php') "." </p> </h1>"." <h1>Looking forward to see you there.<br>  Do not forget : <i> We are loss without you!<i> <br> Kind Regards <br> Penpal Journey CEO </h1>" ;



if ($mail->Send()) {
	
	 header("Location:../../forgetpass.php?durum=ok");
	exit;

}

else {
    header("Location:../../forgetpass.php?durum=couldnot");
	exit;

	/*echo "Mail Gönderimi Başarısız"; echo "<br>";
	echo "Hata: ".$mail->ErrorInfo;
	*/


}



/*$mail->ClearAddresses();
$mail->ClearAttachments();
$mail->AddAttachment('images.png'); //mail içinde resim göndermek için
$mail->addCC('mailadi@alanadiniz.site');// cc email adresi
$mail->addBCC('mailadi@alanadiniz.site');// bcc email adresi
$mail->AddAddress("mailadi@alanadiniz.site"); // Mail gönderilecek adresleri ekliyoruz.
$mail->AddAddress("mailadi@alanadiniz.site"); // Mail gönderilecek adresleri ekliyoruz. Birden fazla ekleme yapılabilir.
$mail->Send();
$mail->ClearAddresses();
$mail->ClearAttachments();
*/

//Mail Gönderim Bitir





}



}




?>