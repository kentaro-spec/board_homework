<?php
//出力前に特殊文字を変換する
function html_escape($word){
	return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}


//POSTデータを取得して空白確認
function get_post($key){
    if (isset($_POST[$key])){
        $var = trim($_POST[$key]);
        return $var;
    }
}

//0文字はアウト
function check_words($word){
    if (mb_strlen($word) === 0){
        return FALSE;
    }else{
        return TRUE;
    }
}
