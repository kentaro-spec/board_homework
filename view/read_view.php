
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>読み取り専用</title>
</head>
<body>
<h1>掲示板一覧</h1>
<p>こちらからは書き込みできません。書き込む場合はログインしてください。</p>
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
    <a href="login.php">ログイン画面へ</a>
</body>
</html>