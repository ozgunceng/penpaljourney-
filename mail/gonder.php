<title>Penpal Journey User Validation</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Sanal Değişkenler

$from="info@fuzzifier.com";
$Sender="info@fuzzifier.com";
$gonderici="Penpal Journey User Validation";
$host="mail.info@fuzzifier.com";
$pass="Og.6221635.";
$konu="Penpal Journey User Validation";


require("class.phpmailer.php"); // PHPMailer dosyamizi çagiriyoruz
$mail = new PHPMailer(); // Sinifimizi $mail degiskenine atadik
$mail->IsSMTP(true);  // Mailimizin SMTP ile gönderilecegini belirtiyoruz

$mail->From     = $from;//"admin@localhost"; //Gönderen kisminda yer alacak e-mail adresi
$mail->Sender   = $sender;//"admin@localhost";//Gönderen Mail adresi
//$mail->ReplyTo  = ($_POST["mailiniz"]);//"admin@localhost";//Tekrar gönderimdeki mail adersi

$mail->AddReplyTo=($from);//"admin@localhost";//Tekrar gönderimdeki mail adersi
$mail->AddAddress("carpathiarms@gmail.com"); // Mail gönderilecek adresleri ekliyoruz.
$mail->AddAttachment('fuzzifierlogo.png');
$mail->FromName = $gonderici;//"PHP Mailer";//gönderenin ismi
$mail->isSMTP();
$mail->Host = 'localhost';
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
$mail->Body = "<h1> Welcome To Penpal Journey!</h1><br> To validate your account you can just simply write your Key:<b> E5954</b> while you login.<br>
<p>Or you can validate your profile with that link https://fuzzifier.com/index.php <br></p>
<p>Looking forward to see you there.</p>
<p>Do not forget: <br><i> We are one loss without you! </i> <br> Kind Regards<br> <b>PENPAL JOURNEY TEAM</p>";
//$mail->AltBody = $text_body; //"Deneme Maili"; // Mailin Konusu Konu

if ($mail->Send()) {
	
   header("Location:../../index.php?durum=mailok");
	echo "Mail Gönderildi";

}

else {

  header("Location:../../validate.php?durum=no");
        
        exit;


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
?>