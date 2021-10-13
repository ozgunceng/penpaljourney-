
<?php
function SMSgonderHttpGET(){

  //include 'info.php';

  $username = "5366437052"; //
  $password = urlencode("6221635"); //

  $url= "https://api.netgsm.com.tr/sms/send/get/?usercode=5366437052&password=6221635&gsmno=5366437052&message=MesajGeldiMi?&msgheader=5366437052";

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $http_response = curl_exec($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  if($http_code != 200){
    echo "$http_code $http_response\n";
    return false;
  }
  $balanceInfo = $http_response;
  echo "MesajID : $balanceInfo";
  return $balanceInfo;
}

SMSgonderHttpGET();

?>