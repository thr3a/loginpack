<?php
session_start();
// 工程① セッション変数の破棄
$_SESSION = array();

// 工程② セッションIDの破棄（クライアント側）
if(isset($_COOKIE[session_name()])){
	setcookie(session_name(), '', time()-42000, '/');
}

// 工程③ セッションIDの破棄（サーバ側）
session_destroy();

header("Location: ./index.php");
?>
