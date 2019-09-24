<?php
require_once __DIR__ . '/lineBot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$bot->reply("000000000");

