<?php
// ルート
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'/');

// ルートからのパス
define('PATH_HOME_PAGE', 'Page/home.php');
define('PATH_LOGIN_PAGE', 'Page/Login/login.php');
define('PATH_LOGIN_LOGIC', 'Logic/Login/login.php');
define('PATH_URL', 'Common/URL.php');

// Include絶対パス
define('INCLUDE_URL', BASE_PATH . PATH_URL);
?>