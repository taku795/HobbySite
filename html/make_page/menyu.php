<?php
	// 変数初期化
	$title = $content = $day = array();
	$error = $list = $name = '';

	// ユーザー定義関数
    require('../../User-Defined/functions.php');
    
    // ユーザー情報取得
    // DB接続
	$pdo = db_connect();	
    session_start();
    // SQLを実行し結果を取得
	$sql = "SELECT `Name` FROM `users` WHERE ID = '$_SESSION[id]';";
	$result = $pdo -> query($sql);

	// エラー確認
	if (($result -> errorCode()) == '0000' && ($result -> rowCount()) == 1) {
        // 名前取得
		$list = $result -> fetch(PDO::FETCH_ASSOC);
        $name = $list['Name'];
	} else {
		$error = 'ユーザー情報が正しく取得できませんでした';
        exit();
	}

	// 記事を取得
	// SQLを実行し結果を取得
	$sql = "select * from articles where WriteUser = '$_SESSION[id]';";
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


<section class="menyupage">
    <?php echo $error; ?>
    <h2>設定</h2>
    <p>あなただけがみれる画面です</p>
    <p>ログインID</p>
    <p><?php echo $_SESSION['id']; ?></p>
    <p>名前</p>
    <p><?php echo $name; ?></p>
    
    <!-- ログアウト -->
    <a href="logout.php">ログアウト</a>
</section>

<section class="account-page">
    <h2>アカウントページ画面</h2>
    <p class='sub'><?php echo $_SESSION['id']; ?>　さんの記事一覧</p>
    
    <?php   
		// 記事出力
		if ($error == '') {
			for ($i = 0; $i<count($title); $i++) {
				makeArticles($title[$i],$content[$i]);
			}
		}

	?>

</section>

