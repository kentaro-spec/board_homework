<?php
    // 関数ファイル読み込み
    require_once('helpers/db_helper.php');
    require_once('helpers/extra_helper.php');

    // データベースへの接続
    $dbh = get_db_connect();
    
    // 表示用の配列とエラー用の配列
    $data = [];
    $errs = [];
    
    // POST送信されたデータをゲット、バリデートして問題なければデータベースにデータを挿入。エラーは$errsに入る。
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = get_post('name');
        $title = get_post('title');
        $comment = get_post('comment');

        $delete = $_POST['delete'];

        //データベースを削除する
        if(!empty($delete)){
            delete_post($dbh);
            echo '投稿を削除しました。';
        }
        
        //データが送られているか確認用
        // var_dump($name);
        // var_dump($title);
        // var_dump($comment);
        
        //ここに名前が空白だったときの関数
        if (!check_words($name)){
            $errs[] = '名前をかいてください。';
        }
        //ここにタイトルが空白だったときの関数
        if (!check_words($title)){
            $errs[] = 'タイトルをかいてください。';
        }
        //ここにコメントが空白だったときの関数
        if (!check_words($comment)){
            $errs[] = 'コメントをかいてください。';
        }
        //エラーが無ければデータを挿入
                    
        if (empty($errs)) {
                insert_user_data($dbh, $name, $title, $comment);
            }

    }
    // データベースから取り出す

    $data = select_user($dbh);
    
    //データを逆順にする
    // $reverse = array_reverse($data);


    // 表示ページ
    include_once('view/board_view.php');
