<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規ユーザー登録</title>
</head>
<body>
    <h1>新規ユーザー登録</h1>
    <form action="" method="POST">
    <p>お名前:<input type="text" name="name"><?php echo $errs['name'];?></p>
    <p>パスワード:<input type="password" name="password"><?php echo $errs['password'];?></p>
    <p><input type="submit" value="登録する"></p>
    
    <a href="login.php">ログインページへ</a>
    
    </form>
</body>
</html>