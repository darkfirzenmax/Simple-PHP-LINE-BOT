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


