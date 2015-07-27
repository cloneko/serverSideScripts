<?php
require_once 'config.php';

// ここからがview.phpと違うところ。FROM articlesの後のwhereが消えてる
$query = 'SELECT id,article,author,create_date,update_date FROM articles';
$stmt = $dbh->prepare($query);
$stmt->execute();
// fetchAllを実行すると登録されているすべての情報を配列で返してくれるよ
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

// デバッグコード: var_dumpでどんなデータが取得できているか確認。

header('Content-type: text/plain'); // おまじない
var_dump($data); // 実際に表示している

// Twigにはめこむ
// templatesディレクトリにある *output.tpl* の {{article}}と{{name}}と{{create_date}}に受け取ったデータを嵌め込んで表示する

// print($twig->render('list.tpl',array('articles'=>$data)));

// データベースの接続を終了する
unset($dbh);
