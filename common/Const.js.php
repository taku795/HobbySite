<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/'.'Common/Const.php';
    require_once INCLUDE_URL;

    header('Content-Type: application/javascript');
    $url = new URL();
    echo "const LOGIN_URL = '" . addslashes($url->getUrl('loginLogic')) . "';";
?>