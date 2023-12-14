<section class="follow-user">
  <h2>フォローユーザー</h2>
  <div class="user">
  <?php
  // //followテーブルからログインしているユーザーが誰をフォローしているか検索
  // $sql=$pdo->prepare("SELECT * FROM follow WHERE Follow_ID=?");
  // $sql->execute([$_SESSION['login_id']]);
  // $result = $sql->fetchAll(PDO::FETCH_BOTH);
  
  
  // //その結果をアカウントページのaタグで表示
  // for ($number=0;$result[$number]['Follower_ID']!=NULL;$number++) {
  //   $sql=$pdo->prepare("SELECT * FROM users WHERE Login_ID=?");
  //   $sql->execute([$result[$number]['Follower_ID']]);
  //   $buf = $sql->fetchAll(PDO::FETCH_BOTH);
  //   $name = $buf[0]['User_Name'];
  //   $Login_ID=$buf[0]['Login_ID'];
  //   echo 
  //   " 
  //   <form name='form$number' target='_brank' action='account/account_page.php' method='post'>
  //   <input type='hidden' name='Login_ID' value=$Login_ID>
  //   <input type='hidden' name='name' value=$name>
  //   <a href='javascript:form$number.submit()'>
  //   <p>$name</p>
  //   </a>
  //   </form>
  //   ";
  // }
  ?>
  </div>
</section>
