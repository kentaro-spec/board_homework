<?php var_dump($data);?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板一覧</title>
</head>
<body>
    <h1>掲示板一覧</h1>
    <table>
    <tr>
        <td>名前</td>
        <td>タイトル</td>
        <td>コメント</td>
        <td>投稿時刻</td>
    </tr>
    <?php foreach($data as $row) :?>
        <tr>
            <td><?php echo html_escape($row['name']);?></td>
            <td><?php echo html_escape($row['title']);?></td>
            <td><?php echo nl2br (html_escape($row['comment']));?></td>
            <td><?php echo html_escape($row['created']);?></td>
        </tr>
    <?php endforeach;?>
    </table>

<!-- エラーがあったら表示させる -->
<?php if(count($errs)){
    foreach ($errs as $err){
        echo $err;
    }
}else{
    echo '投稿に成功しました！';
}
?>


<!-- 入力フォーム -->

<h1>掲示板投稿</h1>

<form action="" method ="POST">
<p>名前 <input type="text" name ="name"></p>
<p>タイトル <input type="text" name ="title"></p>
<p>コメント <textarea name="comment" id="" cols="30" rows="10"></textarea></p>
<input type="submit" value="投稿する">


<!-- 全ての投稿を削除する -->
</form>
    <form action="" method="POST">
    <input type="submit" name="delete" value="全ての投稿を削除する">
    </form>
</body>
</html>