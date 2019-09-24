<?php

class Setting {
	public static function getChannelAccessToken(){
		$channelAccessToken = "3pjYn+6gs3G1dISd6w8Xb8vCOIWiz5ojncvzdVB1jV24nSASa/walrkRhrFMU4kqaRBTZQOZ7S3SplRGUMVfk7sdkYHb1bfgpRuGSoRciWKbGNqhnKDddNPD4pn2ARd8rFG92itQIY+mqjGuLOGmO1GUYhWQfeY8sLGRXgo3xvw=";
		return $channelAccessToken;
	}
	public static function getChannelSecret(){
		$channelSecret = "1b8749dd96ed6430bd43c094692ecd8d";
		return $channelSecret;
	}
	public static function getApiReply(){
		$api = "https://api.line.me/v2/bot/message/reply";
		return $api;
	}
	public static function getApiPush(){
		$api = "https://api.line.me/v2/bot/message/push";
		return $api;
	}
}
