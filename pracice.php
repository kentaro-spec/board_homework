<!-- 関数とデーターベースにうまく接続できてるかテスト
<?php
    require_once('helpers/db_helper.php');
    require_once('helpers/extra_helper.php');

    $dbh = get_db_connect();
    $data = select_user($dbh);

    var_dump($data); 