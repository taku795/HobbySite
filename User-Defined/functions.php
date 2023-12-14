<?php
	function db_connect() {
		try {
			$pdo = new PDO("mysql:host=localhost;dbname=hosttaku;charset=UTF8", "hosttaku", "cpH[wk)Zd7Ya)IlV");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
?>