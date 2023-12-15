<!-- HTML記述開始 -->
<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<title>趣味旅行サイト</title>

	<!-- JQuery -->
	<script src="../jQuery-Validation-Engine-master/js/jquery-3.7.1.min.js" type="text/javascript"></script>
</head>

<body>
	<!-- ヘッダー部分 -->
	<section class="header">
		<div class="title">
			<h1><a href="">趣味旅行</a></h1>
			<p>人生を楽しくするための趣味探しをお手伝いするサイト</p>
		</div>
		<nav>
			<ul>
				<li id="home"><button>ホーム</button></li>
				<li id="room"><button>Gチャット</button></li>	
			</ul>
		</nav>
		
		<!-- ハンバーガーメニュー -->
		<button class='humberger_menyu'>
			<span></span>
			<span></span>
			<span></span>
		</button>
		<nav>
			<ul class="nav">
				<li id="menyu"><button>設定</button></li>
				<li id="write"><a href="make_page/post.php" target='_blank'>記事を書く</a></li>
				<li id="good"><button>いいね一覧</button></li>
				<li id="search"><button>検索</button></li>
				<li id="follow"><button>フォロー</button></li>
				<li id=""><button>ログアウト</button></li>
			</ul>
		</nav>
	</section>

	<!-- メイン -->
	<div id="main" class="main"></div>
</body>
</html>

<script>
	$(function() {
		//通常読み込み時
		$('#main').load('make_page/home.php');

		//クリック時
		$('#home').click(function() {
			$('#main').load('make_page/home.php');
		})
		// $('#write').click(function() {
		// 	$('#main').load('make_page/post.php');
		// })
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
	})
</script>