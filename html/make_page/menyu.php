<section class="menyupage">
    <h2>設定</h2>
    <p>あなただけがみれる画面です</p>
    <div class="loginID">
        <p>ログインID</p>
    </div>
    
    <!-- 記事投稿には必須 -->
    <p>名前</p>
    <p>メールアドレス</p>

    <p>Googleのメールアドレスを設定するとログインがスムーズになります</p>
    <button id="content_delete">記事を編集する</button>
    <p><a href="menyu/finish.php?logout=1">ログアウトする</a></p>
</section>

<section class="account-page">
    <h2>アカウントページ画面</h2>
    <p class='sub'>　さんの記事一覧</p>
    <div class="articles">
        
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(function() {
    //クリック時
    $('#content_delete').click(function() {
        $('#main').load('menyu/content_delete.php');
    })
    })
</script>
