<?php 
// DB接続

// ユーザーが存在するかチェック

// レスポンスを返す
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo json_encode(['status' => 'error', 'message' => 'IDかパスワードが間違っています']);
} else {
  
}


?>