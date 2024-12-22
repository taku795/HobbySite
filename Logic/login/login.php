<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/'.'Common/Const.php';
    require_once INCLUDE_URL;

    // ポスト以外は想定していないため
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['status' => 'error', 'message' => 'エラーです。']);
        return;
    }

    // DB接続

    // ユーザーが存在するかチェック
    if ($_POST['LoginID'] != $_POST['LoginPassword']) {
        $url = new URL();
        echo json_encode(['status' => 'true', 'url' => $url->getUrl('home'), 'message' => '成功です']);
    } else {
        // レスポンスを返す
        echo json_encode(['status' => 'false', 'message' => 'IDかパスワードが間違っています']);
    }
    

?>