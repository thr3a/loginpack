<?php

//$consumer_key = 'xGjOJMIfLVbmousshzYwpTflN';
//$consumer_secret = 'RjdINTarHTfA9TglIcVTJCmyBhYV4garhaTiExTRGyf3N08zu1';
define('API_KEY', 'xGjOJMIfLVbmousshzYwpTflN');/*Your Consumer key*/
define('API_SEC','RjdINTarHTfA9TglIcVTJCmyBhYV4garhaTiExTRGyf3N08zu1');/*Your Consumer secret*/
$callBackUrl = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/callback.php";

?>