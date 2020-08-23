<?php

// 接続に必要な情報を定義。SQL文で設定したこと。
define('DSN', 'mysql:host=db;dbname=matching_app;charset=utf8;');
define('USER', 'owner');
define('PASSWORD', '9999');

// DBに接続
try {
    $dbh = new PDO(DSN, USER, PASSWORD);
} catch (PDOException $e) {
    // 接続がうまくいかない場合こちらの処理がなされる
    echo $e->getMessage();
    exit;
}

// SQL文の組み立て
$sql = 'SELECT * FROM women';

// プリペアドステートメントの準備
$stmt = $dbh->prepare($sql);

// プリペアドステートメントの実行
$stmt->execute();

// 結果の受け取り
$women = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($women as $woman) {
    echo $woman['type'] . '<br>' . $woman['introduction'] . '<br>' . $woman['birthday'] . '生まれ' . '<br>' . '出身地' . $woman['birthplace'] . '<hr>';
}
