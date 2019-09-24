<?php
require_once __DIR__ . '/lineBot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$bot->reply('==>'.$text);

$url = 'https://testlab.firstohm.com.tw/index.phpp?app=users&format=raw&resource=userinfo&option=com_api&key=ef280bf8341539515115a5514249cba8&linemsg=$text';


  $opts = array('http' =>
    array(
      'method' => 'POST',
      'header' => 'Content-type: application/x-www-form-urlencoded'
    )
  );

  $context = stream_context_create($opts);

  $result = file_get_contents($url, false, $context);
?>
