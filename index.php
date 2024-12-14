<?php
	include_once 'Common/Const.php';
	include INCLUDE_URL;
	$url = new URL();
	header('Location:'.$url->getUrl('login'));
	exit;
?>