<?php
require_once __DIR__ . '/lineBot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$bot->reply('==>'.$text);
//接收POST參數的URL
$url = 'https://testlab.firstohm.com.tw/index.php';
//POST參數,在這個陣列裡,索引是name,值是value,沒有限定組數
$postdata = array('app'=>'users','format'=>'raw','resource'=>'userinfo','option'=>'com_api','key'=>'ef280bf8341539515115a5514249cba8','linemsg'=>'$text');
//函式回覆的值就是取得的內容
$result = sendpost($url,$postdata);



function sendpost($url, $data){
//先解析url 取得的資訊可以看看http://www.php.net/parse_url
$url = parse_url($url);
$url_port = $url['port']==''?(($url['scheme']=='https')?443:80):$url['port'];
if(!$url) return "couldn't parse url";
//對要傳送的POST參數作處理
$encoded = "";
while(list($k,$v)=each($data)){
  $encoded .= ($encoded?'&':'');
  $encoded .= rawurlencode($k)."=".rawurlencode($v);
}
//開啟一個socket
$fp = fsockopen($url['host'],$url_port);
if(!$fp) return "Failed to open socket to ".$url['host'];
//header的資訊
fputs($fp,'POST '.$url['path'].($url['query']?'?'.$url['query']:'')." HTTP/1.0rn");
fputs($fp,"Host: ".$url['host']."n");
fputs($fp,"Content-type: application/x-www-form-urlencodedn");
fputs($fp,"Content-length: ".strlen($encoded)."n");
fputs($fp,"Connection: closenn");
fputs($fp,$encoded."n");
//取得回應的內容
$line = fgets($fp,1024);
if(!eregi("^HTTP/1.. 200", $line)) return;
$results = "";
$inheader = 1;
while(!feof($fp)){
  $line = fgets($fp,2048);
  if($inheader&&($line == "n" || $line == "rn")){
    $inheader = 0;
  }elseif(!$inheader){
    $results .= $line;
  }
}
fclose($fp);
return $results;
}
