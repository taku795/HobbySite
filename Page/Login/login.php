<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../Css/login.css">
    <title>ログインページ</title>
    <script src="../../Common/Const.js.php"></script>
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
	// 処理結果表示領域
	const _resultMessage = document.getElementById('resultMessage');
	// ログインイベント追加
	document.getElementById('LoginForm').addEventListener('submit', login);

	function login(event) {
		// デフォルトのフォーム送信を防止
		event.preventDefault();

		const formData = new FormData(this);
		const requireError = "IDとパスワードを入力してください";
		const commuError = "通信エラーです";
		const resultAreaUndifine = "システムエラー：メッセージの表示ができません";


		if (_resultMessage == null) {
			alert(resultAreaUndifine);
			return;
		}

		// バリデーションチェック
		if (document.getElementById('LoginID').value && document.getElementById('LoginPassword').value) {
			// OK
		} else {
			_resultMessage.style.color = 'black';
			_resultMessage.textContent = requireError;
			return;
		}

		// Fetch APIで非同期POSTリクエストを送信
		fetch(LOGIN_URL, {
			method: 'POST',
			body: formData
		})
		.then(convertToJson)
		.then(redirectToResonseURL)
		.catch(errorLog);
	}


	// JSON形式でレスポンスを処理
	function convertToJson(response) {
		return response.json();
	}

	// レスポンスURLに遷移させる
	// 失敗した場合はresultMessageオブジェクトが必要
	function redirectToResonseURL(response) {
		// ログイン可ユーザー
		if (response.status ==  'true') {
			window.location.href = response.url;
			return;
		}

		// ログイン不可ユーザー
		if (response.message == null) {
			alert(commuError);
			return;
		}

		_resultMessage.style.color = 'red';
		_resultMessage.textContent = response.message;
	}

	//通信エラー表示
	function errorLog(error) {
		console.error(commuError, error);

		_resultMessage.style.color = 'red';
		_resultMessage.textContent = commuError;
	}
</script>