<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="" method="POST">
    <p>名前<input type="text" name="name"><?php echo html_escape($errs['name']);?></p>
    <p>パスワード<input type="password" name="password"><?php echo html_escape($errs['password']);?></p>
    <p><input type="submit" value="ログイン"></p>
    <p><a href="sign.php">新規登録</a></p>
    
    </form>
</body>
</html>