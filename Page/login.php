<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/login.css">
    <title>ログインページ</title>
</head>
<body>
<?php
include('../Common/DatabaseController.php');

session_start();
$_SESSION['user_mail']=null;
$_SESSION['user_name']=null;
$_SESSION['login_id']=null;

// DB接続
$dbController = new DatabaseController;
$dbController->ConnectionDatebase();

?>

<section class="LoginSection">
  <!-- 通常ログイン -->
  <form class="LoginForm" action='../Logic/login/login.php' method='post'>
    <p>ログインID：<input class="text" type='text' name='Login_ID'></p>
    <?php
    // 入力チェック
    ?>
    <p>パスワード：<input class="text" type='text' name='Login_Password'></p>
    <?php
    // 入力チェック
    ?>
    <input class="nomal_button" type='submit' value='ログイン'>
  </form>

  <div class="new_set">
    <a href="../Logic/login/new_page.php">新規登録</a>
  </div>


</section>

</body>
</html>
