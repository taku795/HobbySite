<!-- HTML記述開始 -->
<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <title>趣味旅行サイト</title>
  <link rel="stylesheet" href="css/home.css">
</head>

<body>
  <!-- ヘッダー部分 -->
  <section class="header">
    <div class="title">
      <h1>趣味旅行</h1>
      <p>人生を楽しくするための趣味探しをお手伝いするサイト</p>
    </div>
    <ul class="nav">
      <li id="home"><a href="home.php">ホーム</a></li>
      <li id="write"><a>記事を書く</a></li>
      <li id="room"><a>語り部屋</a></li>
      <li id="search"><a>検索</a></li>
      <li id="menyu"><a>メニュー</a></li>
      <li id="good"><a>いいね</a></li>
      <li id="follow"><a>フォロー</a></li>
    </ul>
  </section>

  <!-- メイン -->
  <div id="main" class="main"></div>

  <!-- フッター -->
  <footer>
    <h1>あなたの人生が<br>より楽しいものになりますように</h1>
  </footer>
</body>
</html>

<script src="jQuery-Validation-Engine-master/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<script>
  $(function() {
    //通常読み込み時
    $('#main').load('make_page/home.php');

    //クリック時
    $('#home').click(function() {
      $('#main').load('make_page/home.php');
    })
    $('#write').click(function() {
      $('#main').load('make_page/post.php');
    })
    $('#room').click(function() {
      $('#main').load('make_page/board.php');
    })
    $('#search').click(function() {
      $('#main').load('make_page/search.php');
    }) 
    $('#menyu').click(function() {
      $('#main').load('make_page/menyu.php');
    })
    $('#good').click(function() {
      $('#main').load('make_page/good_content.php');
    })
    $('#follow').click(function() {
      $('#main').load('make_page/follow.php');
    })
    
    //検索時
    
    
  })
</script>