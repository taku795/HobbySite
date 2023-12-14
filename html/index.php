<?php
	// ユーザー定義関数
    require('../User-Defined/functions.php');

	$id_erro = $pw_erro = $sql_error = '';
	// もし値がポストされていたら処理
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// POSTから取り出す
		$name = $_POST['set_name'];

		// パスワードバリデーション
		if (empty($_POST['set_pw'])) {
			$pw_erro = 'パスワードを入力してください';
		} else if (preg_match('/^[a-zA-Z0-9]{8,24}+$/',$_POST['set_pw'])!=1) {
			$pw_erro = 'パスワードは８～２４文字の大文字の英語もしくは数字で入力してください';
		} else {
			$pw = $_POST['set_pw'];
		}

		// IDのバリデーション
		if (empty($_POST['set_id'])) {
			$id_erro = 'パスワードを入力してください';
		} else if (preg_match('/^[a-zA-Z0-9@?!]{8,24}+$/',$_POST['set_id'])!=1) {
			$id_erro = "ログインIDは８～２４文字の大文字の英語もしくは数字で入力してください<br/>含んでよい特殊文字は「@,?,!」です";
		} else {
			$id = $_POST['set_id'];
		}

		// 値が挿入されていたら
		if (isset($pw,$id)) {
			// DB接続
			$pdo = db_connect();

			// SQLを実行し結果を取得
			$sql = "select * from users where id = '{$id}';";
			$result = $pdo -> query($sql);
			
			// ID登録されているか確認
			if (($result -> rowCount()) == 0) {
				// IDが登録されていない場合
				$sql = "INSERT INTO `users`(`ID`, `Password`) VALUES ('{$id}','{$pw}')";
				$result = $pdo -> query($sql);
				if (($result -> errorCode()) == '0000') {
					header('location:login.php');
				} else {
					$sql_error = '登録できませんでした';
				}
			} else {
				// 指定のユーザーIDが登録されている場合
				$id_erro = 'すでに登録されているユーザーIDです';
			}
		}
	}
?>

<!-- HTML記述開始 -->
<!DOCTYPE html>
<html lang='jp'>
<head>
    <!-- JQuery -->
    <script src="../jQuery-Validation-Engine-master/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <!-- 必須入力チェック正規リスト -->
    <script src="../jQuery-Validation-Engine-master/js/languages/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
    <!-- 必須入力チェックエンジン -->
    <script src="../jQuery-Validation-Engine-master/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <!-- 必須入力チェックスタイルシート -->
    <link rel="stylesheet" href="../jQuery-Validation-Engine-master/css/validationEngine.jquery.css" type="text/css"/>

    <title>ログインページ</title>
</head>
<body>

	<!-- ログインフォーム -->
	<section class='section_formWrapper'>
		<!-- 新規登録フォーム -->
		<span><?php echo $sql_error; ?></span>
		<form id='setUser_form' action='' method='post'>
		<p>ログインID：</p>
			<input class='validate[required]' type='text' name='set_id'>
			<span><?php echo $id_erro; ?></span>
			<p>パスワード：</p>
			<input class='validate[required]' type='text' name='set_pw' id='pw1'>
			<p>パスワード（確認用）：</p>
			<input class='validate[required,equals[pw1]' type='text' name='pw2'>
			<span><?php echo $pw_erro; ?></span>
			<p>名前：</p>
			<input class='validate[required]' type='text' name='set_name'>
			<input type="submit" value='新規登録'>
		</form>

		<!-- 新規登録切り替え -->
		<div class='new_wrapper'>
			<p>すでにアカウントをお持ちの方は</p>
			<a href="login.php">こちら</a>
		</div>
	</section>

  
</body>
</html>

<script>
	// 入力チェック用

	// サイトのドキュメントが準備できたらfunctionを実行
	$(document).ready(function(){
		$("#setUser_form").validationEngine('attach');
	});
</script>
