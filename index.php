<?php
require_once __DIR__ . '/lineBot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
//$bot->reply('==>'.$text);
$url = 'https://testlab.firstohm.com.tw/index.php';

    $data = array(
       'app'=>'users',
'format'=>'raw',
'resource'=>'userinfo',
'option'=>'com_api',
'key'=>'ef280bf8341539515115a5514249cba8',
'linemsg'=>'text'
    );
	
$ch = curl_init($url);
# Form data string
$postString = http_build_query($data, '', '&');
# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$response = curl_exec($ch);
curl_close($ch);
