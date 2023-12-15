<?php
    // ユーザー定義関数
    require('../User-Defined/functions.php');

    $id_erro = $pw_erro = '';
    // もし値がポストされていたら処理
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // パスワードバリデーション
        if (empty($_POST['login_pw'])) {
            $pw_erro = 'パスワードを入力してください';
        } else {
            $pw = $_POST['login_pw'];
        }

        // IDバリデーション
        if (empty($_POST['login_id'])) {
            $id_erro = 'ログインIDを入力してください';
        } else {
            $id = $_POST['login_id'];
        }
        // 値が挿入されていたら
        if (isset($pw,$id)) {
            // DB接続
            $pdo = db_connect();
			
			// SQLを実行し結果を取得
			$sql = "select * from users where id = '{$id}';";
			$result = $pdo -> query($sql);
			
            // ID登録されているか確認
			if (($result -> rowCount()) == 1) {
				// 一件だけ該当がある
				$array = $result -> fetch();

				// IDとパスワードの判定
				if ($array['ID'] == $id && $array['Password'] == $pw) {
					// セッションにユーザーIDを登録
					session_start();
					$_SESSION['id'] = $id;

					// ホームに飛ばす
					header('location:home.php');
				}
			} else if (($result -> rowCount()) == 0) {
				// 登録されていない場合
				$id_erro = 'IDが登録されていません';
			} else if (($result -> rowCount()) >= 2) {
				// 複数の該当がある場合
				$id_erro = '管理者に問い合わせてください';
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
    <!-- ログインフォーム -->
    <form id='login_form' action='' method='post'>
      <p>ログインID：</p>
      <input class='validate[required]' type='text' name='login_id'>
      <span><?php echo $id_erro; ?></span>
      <p>パスワード：</p>
      <input class='validate[required]' type='text' name='login_pw'>
      <span><?php echo $pw_erro; ?></span>
      <input class='login_button' type='submit' value='ログイン'>
    </form>
 
    <!-- 新規登録切り替え -->
    <div class='new_wrapper'>
      <p>アカウントをお持ちでない方は</p>
      <a href="index.php">こちら</a>
    </div>
    
  </section>

  
</body>
</html>

<script>
  // 入力チェック用

  // サイトのドキュメントが準備できたらfunctionを実行
  $(document).ready(function(){
    $("#login_form").validationEngine('attach');
  });
</script>
