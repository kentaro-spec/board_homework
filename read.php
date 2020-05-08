<?php 


// 関数ファイル読み込み
require_once('helpers/db_helper.php');
require_once('helpers/extra_helper.php');

// データベースへの接続
$dbh = get_db_connect();

$data =select_user($dbh);

// 確認
var_dump($data);
$reverse = array_reverse($data);

include_once('view/read_view.php');