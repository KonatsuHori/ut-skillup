<?php 

//メッセージを保存するファイルパス設定
define( 'FILENAME', './message.txt');

//タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

// 変数の初期化
$current_date = null;
$data = null;
$file_handle = null;
$split_data = null;
$message = array();
$message_array = array();

//var_dump($_POST);
//$file_handle = fopen( FILENAME, "a");
//fwrite($file_handle, "hoge");
//fclose( $file_handle);

///var_dump($_POST);
if( !empty($_POST['btn_submit']) ) {

     if ( $file_handle = fopen( FILENAME, "a") ) {

        // 書き込み日時を取得
        $current_date = date("Y-m-d H:i:s");

        // 書き込むデータを作成
        $data = "'".$_POST['name']."','".$_POST['comment']."','".$current_date."'\n";

        //書き込み
        fwrite( $file_handle, $data);

        //ファイルを閉じる
        fclose( $file_handle);
     }
}


if( $file_handle = fopen( FILENAME,'r') ) {
    while( $data = fgets($file_handle) ){
        
        $split_data = preg_split( '/\'/', $data);

        $message = array(
            'name' => $split_data[1],
            'message' => $split_data[3],
            'post_date' => $split_data[5]
        );
        array_unshift( $message_array, $message);
    }

    // ファイルを閉じる
    fclose( $file_handle);
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
       <br> <input type="submit" name="btn_submit" value="投稿">
    </form>
</section>
<section>
    <hr width="60%">
    <h2>投稿一覧</h2>

<?php if( !empty($message_array) ): ?>
<?php foreach( $message_array as $value ): ?>
<article>
    <div class="info">
        <p><?php echo $value['name']; ?></p>
        <time><?php echo date('Y年m月d日 H:i:s', strtotime($value['post_date'])); ?>
</time>
    </div>
    <p><?php echo $value['message']; ?></p>
</article>
<?php endforeach; ?>
<?php endif; ?>
</section>
</body>
</html>