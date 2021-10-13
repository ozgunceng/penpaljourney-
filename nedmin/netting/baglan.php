<?php try{

	$db=new PDO("mysql:host=localhost;dbname=penpal;charset=utf8",'root','17431743');
	//echo "veritabanı bağlantısı başarılı";
}
catch (PDOExpception $e){

echo $e->getMessage();

}

?>