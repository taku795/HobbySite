<?php 
    include INCLUDE_URL;

    // ポスト以外は想定していないため
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }

    // DB接続

    // ユーザーが存在するかチェック
    if ($_POST['LoginID']) {
        $url = new URL();
        echo json_encode(['status' => 'success', 'url' => $url->getUrl('home')]);
    } else {
        // レスポンスを返す
        echo json_encode(['status' => 'error', 'message' => 'IDかパスワードが間違っています']);
    }
    

?>