<?php

//メッセージを保存するファイルパス設定
define( 'FILENAME', './message.txt');

//タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

if( !empty($_POST['btn_submit']) ) {
　　　var_dump($_POST);

     if ( $file_handle = fopen( FILENAME, "a") ) {

        // 書き込み日時を取得
        $current_date = date("Y-m-d H:i:s");

        //書き込み
        fwrite( $file_handle, $data);

        //ファイルを閉じる
        fclose( $file_handle);
     }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link href="index.keiziban.css" rel="stylesheet" type="text/css" media="all">
<title>掲示板</title>
</head>
<body>
<h1>掲示板</h1>
<section>
    <h2>新規投稿</h2>
    <form action="" method="post">
        <div class="name"><span class="label">名前: <input type="text" name="name" value=""><br>
        <div class="honbun"><span class="label">本文: <textarea name="comment" cols="30" rows="3" maxlength="80" wrap="hard"
        placeholder="100字以内で入力してください。"></textarea>
       <br> <button type="submit">投稿</button>
    </form>
</section>
<section class=""toukou>
    <hr width="60%">
    <h2>投稿一覧</h2>
    <p>投稿はまだありません</p>
</section>
</body>
</html>
