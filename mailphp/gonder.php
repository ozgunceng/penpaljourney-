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
$mail->AddAttachment('naci.jpg');
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
$mail->Body = "Hello There! <h1>Welcome</h1> <b>Key: E5954</> You can validate your profile with that Code: ES68D5 or you can simply click that link 'https://fuzzifier.com/index.php' Looking forward
to see you there. Do not forget: We are loss without you! Kind Regards"."<br><p>Or you can click this link:</p>";
//$mail->AltBody = $text_body; //"Deneme Maili"; // Mailin Konusu Konu

if ($mail->Send()) {
	
          header("Location:../../index.php?durum=mailok");
	echo "Mail Gönderildi";

}

else {

echo "Mail Gönderimi Başarısız"; echo "<br>";
echo "Hata: ".$mail->ErrorInfo;


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