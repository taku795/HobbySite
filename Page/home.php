<!DOCTYPE html>
<html lang="jp">
  <head>
      <meta charset="UTF-8">
      <title>趣味旅行サイト</title>
      <link rel="stylesheet" href="css/home.css">
  </head>

  <body>


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

    
    <div id="main" class="main"></div>

    <footer>
      <h1>あなたの人生が<br>より楽しいものになりますように</h1>
    </footer>
    
    <script>
      $(function() {
        //通常読み込み時
        $('#main').load('all_content_page.php');
        
        //クリック時
        $('#home').click(function() {
          $('#main').load('all_content_page.php');
        })
        $('#room').click(function() {
          $('#main').load('all_board.php');
        })
        $('#search').click(function() {
          $('#main').load('search_form.php');
        })
        $('#write').click(function() {
          $('#main').load('post_page.php');
        })
        $('#menyu').click(function() {
          $('#main').load('menyu_page.php');
        })
        $('#good').click(function() {
          $('#main').load('good_content_page.php');
        })
        $('#follow').click(function() {
          $('#main').load('follow_user.php');
        })
        
      })
    </script>
  
  </body>
</html>