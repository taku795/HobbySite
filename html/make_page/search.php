<form class="search" action="home.php">
  <div class="word">
    <input type="text" name='key_word' placeholder="キーワードを入力">
  </div>
  <div class="tag">
    <p>タグを選択：
    <select name="tag">
      <option value="">-</option>
      <?php
      //tag_masterからタグIDとnameを順番に
      // foreach($sql=$pdo->query('select * from tag_master') as $row ) {
      //   echo "<option value=$row[Tag_ID]>$row[Tag_Name]</option>";
      // }
      ?>
    </select></p>
  </div>
  <input class="submit" type="submit" value='検索'>
</form>
