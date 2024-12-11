<?php 
    // ポスト以外は想定していないため
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }

    // DB接続

    // ユーザーが存在するかチェック
    if ($_POST['LoginID']) {
        echo json_encode(['status' => 'success', 'url' => 'http://localhost/Page/home.php']);
    } else {
        // レスポンスを返す
        echo json_encode(['status' => 'error', 'message' => 'IDかパスワードが間違っています']);
    }
    

?>