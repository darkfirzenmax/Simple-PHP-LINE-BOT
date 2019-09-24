<?php
require_once __DIR__ . '/lineBot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$bot->reply('==>'.$text);
$url = 'https://testlab.firstohm.com.tw/index.php';

    $fields = array(
       'app'=>'users',
'format'=>'raw',
'resource'=>'userinfo',
'option'=>'com_api',
'key'=>'ef280bf8341539515115a5514249cba8',
'linemsg'=>'$text'
    );

    // build the urlencoded data
    $postvars = http_build_query($fields);

    // open connection
    $ch = curl_init();

    // set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

    // execute post
    $result = curl_exec($ch);

    // close connection
    curl_close($ch);
?>
