<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/'.'Common/Const.php';
    require_once INCLUDE_URL;

	// Login画面に遷移
	$url = new URL();
	header('Location:'.$url->getUrl('login'));
	exit;
?>