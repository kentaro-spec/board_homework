<?php
    // 関数ファイル読み込み
    require_once('helpers/db_helper.php');
    require_once('helpers/extra_helper.php');

    // データベースへの接続
    $dbh = get_db_connect();
    
    // 表示用の配列とエラー用の配列
    $data = [];
    $errs = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = get_post('name');
        $password = get_post('password');
    
        if (!check_words($name)) {
            $errs['name'] = 'お名前が未入力です。';
        }elseif (!name_exists($dbh, $name)){
            $errs['name'] = '名前が登録されていません';
        }
        // パスワードに関するバリデーション
        if (!check_words($password)) {
            $errs['password'] = 'パスワードが未入力です。';
        }elseif (!select_member($dbh, $name, $password)){
            $errs['password'] ='名前とパスワードが違います。';
        }
        if(empty($errs)) {
        header('Location: http://localhost/CF_board/board.php');
        exit;
    }

    }
    

    include_once('view/login_view.php');

