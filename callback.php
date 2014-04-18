<?php
session_start();
require_once("./lib/setting.php");
require_once("./lib/tmhOAuth.php");

$tmh = new tmhOauth(array(
	'consumer_key' => API_KEY,
	'consumer_secret' => API_SEC,
	'user_token' => $_SESSION['temp_oauth_token'],
	'user_secret' => $_SESSION['temp_oauth_token_secret']
));

$tmh->user_request(array(
	'method' => 'POST',
	'url' => $tmh->url('oauth/access_token', ''),
	'params' => array(
		'oauth_verifier' => $_GET['oauth_verifier']
	)
));

$_SESSION['user'] = $tmh->extract_params($tmh->response['response']);

header("Location: ./index.php");
?>