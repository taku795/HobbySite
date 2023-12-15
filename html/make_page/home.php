<?php
	// 変数初期化
	$title = $content = $day = array();
	$error = $list = '';

	// ユーザー定義関数
    require('../../User-Defined/functions.php');

	// 記事を取得
	// DB接続
	$pdo = db_connect();	
	// SQLを実行し結果を取得
	$sql = "select * from articles where id < 6;";
	$result = $pdo -> query($sql);

	// エラー確認
	if (($result -> errorCode()) == '0000') {
		$list = $result -> fetchAll();
		// 記事情報取得
		foreach($list as $e) {
			$title[] = $e['Title'];
			$content[] = $e['Content'];
		}
	} else {
		$error = '記事が取得できませんでした';
	}
	
?>

<section class='articles'>
	<span><?php echo $error; ?></span>
	<h2>人気記事</h2>
	<?php   
		// 記事出力
		if ($error == '') {
			for ($i = 0; $i<count($title); $i++) {
				makeArticles($title[$i],$content[$i]);
			}
		}

	?>
	
	<h2>最新記事</h2>
	<?php   
		// 記事出力
		if ($error == '') {
			for ($i = 0; $i<count($title); $i++) {
				makeArticles($title[$i],$content[$i]);
			}
		}

	?>
	
</section>