<?php
    require('../../User-Defined/functions.php');
    session_start();
    $error = '';

    // 投稿でPOSTされたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // タイトル確認
        if (isset($_POST['title'])) {
            $title = $_POST['title'];            
        }

        // 内容確認
        if (isset($_POST['content'])) {
            $content = $_POST['content'];
        }

        if (isset($title,$content)) {
            // DB接続
            $pdo = db_connect();
            // SQLを実行し結果を取得
            $sql = "INSERT INTO `articles`(`id`, `WriteUser`, `Title`, `Content`, `PostTime`) VALUES ('','{$_SESSION['id']}','{$title}','{$content}',NOW())";
            $result = $pdo -> query($sql);

            if (($result -> errorCode()) == '0000') {
                // タブを閉じる
                echo "<script type='text/javascript'>alert('投稿できました');window.close();</script>";
            } else {
                $error = '登録できませんでした';
            }

            // 投稿完了後、現在のタブを閉める

        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JQuery -->
    <script src="../../jQuery-Validation-Engine-master/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <!-- 必須入力チェック正規リスト -->
    <script src="../../jQuery-Validation-Engine-master/js/languages/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
    <!-- 必須入力チェックエンジン -->
    <script src="../../jQuery-Validation-Engine-master/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <!-- 必須入力チェックスタイルシート -->
    <link rel="stylesheet" href="../../jQuery-Validation-Engine-master/css/validationEngine.jquery.css" type="text/css"/>

    <title>投稿画面</title>
</head>
<body>
        
    <h2>趣味に関することを自由に書いてみよう</h2>
    <section class="form_group">
        <form class="post_form" action='' method='post' id='post_form'>
            <p>タイトル</p>
            <input type='text' name='title' placeholder="タイトルを入力" class='validate[required]'>
            <p>投稿内容</p>
            <textarea name="content" class='validate[required]'></textarea>
            <input type='submit' value='投稿する'>  
        </form>
    </section>

</body>
</html>


<script>
	// 入力チェック用
	// サイトのドキュメントが準備できたらfunctionを実行
	$(document).ready(function(){
		$("#post_form").validationEngine('attach');
	});
</script>


