<h2>趣味に関することを自由に書いてみよう</h2>
<section class="form_group">
    <form class="post_form" action='post/post.php' method='post'>
        <div class="title_form">
            <p>タイトル</p>
            <input type='text' name='title' id='title' placeholder="タイトルを入力">
        </div>
        <div class="content_form">

            <p>投稿内容</p>
            <textarea name="content" cols="30" rows="10" placeholder = "自分の趣味について記述してください"></textarea>

            <!-- タグ選択 -->
            <div class="tag">
                タグをつける：
                <select name="tag" id="tag">
                <option value="">-</option>
                <?php
                //tag_masterからタグIDとnameを順番に
                // foreach($sql=$pdo->query('select * from tag_master') as $row ) {
                //     echo "<option value=$row[Tag_ID]>$row[Tag_Name]</option>";
                // }
                ?>
                </select>
            </div>
            
            <!-- 編集処理 -->
            <?php
            // if (isset($_REQUEST['edit_content_id'])) {
            //     $edit_content_id = $_REQUEST['edit_content_id'];
            //     //編集の時はrequestに入れる
            //     echo "<input type='hidden' name='edit_content_id' value='$edit_content_id'>";
            // }
            ?>
    
            <input type='submit' value='投稿する' formaction="post/register.php">
        </div>     
    </form>
</section>


