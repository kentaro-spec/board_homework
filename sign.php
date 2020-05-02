<?php 


// 関数ファイル読み込み
require_once('helpers/db_helper.php');
require_once('helpers/extra_helper.php');

// データベースへの接続
$dbh = get_db_connect();
$errs = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = get_post('name');
    $password = get_post('password');

// var_dump($name);
// var_dump($password);

// 名前に関するバリデーション
if (!check_words($name)) {
    $errs['name'] = 'お名前が未入力です。';
}elseif (name_exists($dbh, $name)){
    $errs['name'] = 'すでにその名前は使われています。';
}
// パスワードに関するバリデーション
if (!check_words($password)) {
    $errs['password'] = 'パスワードが未入力です。';
}

// エラーがなかったら、データ挿入
if(empty($errs)) {
    if(insert_member_data($dbh, $name, $password)) {
        header('Location:http://localhost/CF_board/login.php');
        exit;
    }
    $errs['password'] = '登録に失敗しました。';
} 

}

include_once('view/signup_view.php');
