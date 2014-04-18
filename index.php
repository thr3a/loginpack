<?php
session_start();
require_once("./lib/setting.php");
require_once("./lib/tmhOAuth.php");
	$tmh = new tmhOauth(array(
		'consumer_key' => API_KEY,
		'consumer_secret' => API_SEC,
		"token" => $_SESSION['user']['oauth_token'],
		"secret" => $_SESSION['user']['oauth_token_secret']
	));

if( $tmh->request('GET', $tmh->url('1.1/account/verify_credentials')) !== 200 ){
	//非ログイン状態
	$tmh->request( 'POST' , $tmh->url( 'oauth/request_token', ''), array( 'oauth_callback' => $callBackUrl ) );
	$response = $tmh->extract_params( $tmh->response['response'] );
	$_SESSION['temp_oauth_token'] = $response['oauth_token'];
	$_SESSION['temp_oauth_token_secret'] = $response['oauth_token_secret'];
	
	$url = $tmh->url( 'oauth/authorize', '' ) . "?oauth_token=" . $_SESSION['temp_oauth_token'];
	echo '<a href="' . $url . '">ログイン</a>';
}else{
	//ログイン状態
	echo 'ユーザー名：' . $_SESSION['user']['screen_name'] . '<br>';
	echo 'ユーザーID：' . $_SESSION['user']['user_id'] . '<br>';
	echo '<a href="./logout.php">ログアウト</a>';
	//$tmh->request("POST", $tmh->url("1.1/statuses/update") , array( "status" => "hello!" ) );
	$res1 = $tmh->request('GET', $tmh->url('1.1/account/verify_credentials'));
	if($res1 === 200){
		$res2 = json_decode($tmh->response['response']);
		echo "<pre>";
		var_dump($res2);
		echo "</pre>";
	}
}
?>
