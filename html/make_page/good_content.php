<h2>いいねした記事一覧</h2>
<section class="articles">
<?php

  // // お気に入り登録している記事のidを検索
  // $sql=$pdo->prepare("SELECT * FROM good WHERE Login_ID=?");
  // $sql->execute([$_SESSION['login_id']]);
  // $result = $sql->fetchAll(PDO::FETCH_BOTH);

  // // 検索結果から記事の情報を獲得し表示
  // for ($number=0;$result[$number]['Content_ID']!=NULL;$number++) {
  //   $sql=$pdo->prepare('select * from content where id=?');
  //   $sql->execute([$result[$number]['Content_ID']]);
  //   $content = $sql->fetchAll(PDO::FETCH_BOTH);
  //   $id=$content[0]['id'];
  //   $title=$content[0]['Title'];
  //   $buf=$content[0]['Content'];
  //   echo 
  //   "
  //   <article>
  //     <form name='form_good_$id' target='_brank' action='content/content_page.php?content_id=$id' method='post'>
  //       <a href='javascript:form_good_$id.submit()'>
  //         <div class='content'>
  //           <p>タイトル：$title</p>
  //           <div class='content-body'>
  //             <p>$buf</p>
  //           </div>
  //         </div>
  //       </a>
  //     </form>
  //   </article>
  //   ";
  // }
?>
</section>
