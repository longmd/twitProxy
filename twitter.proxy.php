<?php
require_once("TwitterOAuth/twitteroauth.php");
 
$user  			= $_GET['user'];
$count 			= $_GET['count'];

$consumerkey    = '3by9b3gqHUcvmDcAl5GLw';
$consumersecret = 'aGqj2x1k93HbQwRCeifl39AhklYsHWim80QiwRpCYw';
$accesstoken    = '50108831-WJD5s8ikOcC0TsGM2IhEl94RMc1Az2vZmE3EnHLsE';
$accesssecret   = 'pHHqzwyej1FzfTgkaYhnJZZiUeuEZ6yXHS5M2LjmQ';

function getConnection($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnection($consumerkey, $consumersecret, $accesstoken, $accesssecret);
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$user."&include_rts=1&include_entities=1&count=".$count);
$tweets = json_encode($tweets);
echo $_GET['callback'].'('.$tweets.');';
?>