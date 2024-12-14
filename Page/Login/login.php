<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../Css/login.css">
    <title>ログインページ</title>
</head>
<body>
<section class="LoginSection">
  <!-- 通常ログイン -->
  <form id="LoginForm" class = "LoginForm">
    <p>ログインID：<input class="text" type='text' name='LoginID' id='LoginID'></p>
    <p>パスワード：<input class="text" type='text' name='LoginPassword' id='LoginPassword'></p>
    <input class="nomal_button" type='submit' value='ログイン'>
    <div id = "resultMessage"></div>
  </form>

  <div class="new_set">
    <a href="../../Logic/login/new_page.php">新規登録</a>
  </div>
</section>

</body>
</html>


<script>
  document.getElementById('LoginForm').addEventListener('submit', function (event) {
    // デフォルトのフォーム送信を防止
    event.preventDefault();

    // フォームデータを取得
    const formData = new FormData(this);
    const resultMessage = document.getElementById('resultMessage');

    // バリデーションチェック
    if (document.getElementById('LoginID').value && document.getElementById('LoginPassword').value) {
      // OK
    } else {
      resultMessage.textContent = "IDとパスワードを入力してください";
      return;
    }
    

    // Fetch APIで非同期POSTリクエストを送信
    fetch('../../Logic/login/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // JSON形式でレスポンスを処理
    .then(data => {
        if (data.status === 'success') {
          window.location.href = data.url;
        } else {
            resultMessage.style.color = 'red';
            resultMessage.textContent = data.message;
        }
    })
    .catch(error => {
        console.error('通信エラー:', error);
        document.getElementById('resultMessage').style.color = 'red';
        document.getElementById('resultMessage').textContent = '通信エラーが発生しました';
    });
  });

</script>