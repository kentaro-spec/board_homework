<?php
//データベースに接続する
function get_db_connect() {
try{
    $dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';

    $dbh = new PDO($dsn, $user, $password);
    }catch (PDOException $e){
       echo($e->getMessage());
       die();
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

//データベースに挿入する
function insert_user_data($dbh, $name, $title, $comment){

    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO board_user (name, title, comment, created) VALUE (:name, :title, :comment, '{$date}')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    if(!$stmt->execute()){
        return データの書き込みに失敗しました。;
    }
}

//データベースから名前、タイトル、コメント、投稿時刻を取り出す
function select_user($dbh) {

    $data = [];

    $sql = "SELECT name, title, comment, created FROM board_user ORDER BY id DESC";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    return $data;
}


//データベースから投稿を削除する
function delete_post($dbh){
    $sql = "DELETE FROM board_user";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return データベースを削除しました。;
}


// 名前の重複_新規登録画面

function name_exists($dbh, $name) {
    $sql = "SELECT COUNT(id) FROM board_user_members where name = :name";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count['COUNT(id)'] > 0){
        return TRUE;
    }else{
        return FALSE;
    }
}

//membersにデータを挿入
function insert_member_data($dbh, $name, $password){

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO board_user_members (name, password) VALUE (:name, :password)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

//名前とパスワードが一致すれば配列を返す

function select_member($dbh, $name, $password) {

    $sql = 'SELECT * FROM board_user_members WHERE name = :name LIMIT 1 ';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $data['password'])){
            return $data;
        }else{
            return FALSE;
        }
        return FALSE;
    }
}

// 会員データを全部返す

function select_member_all($dbh) {
    $sql = 'SELECT * FROM board_user';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}