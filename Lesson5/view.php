<?php
require_once 'config.php';

// ここからがadd.phpと違うところ。データ呼び出してみるよ!
$query = 'SELECT id,article,author,create_date,update_date FROM articles WHERE id = :id';
$stmt = $dbh->prepare($query);
$stmt->bindValue(":id",$_GET['id'],PDO::PARAM_INT); // id(ページID)が1のものを表示してます。
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_OBJ);

// Twigにはめこむ
// templatesディレクトリにある *output.tpl* の {{article}}と{{name}}と{{create_date}}に受け取ったデータを嵌め込んで表示する
print($twig->render('output.tpl',
  array('article'=>$data->article,'name'=> $data->author,'create_date' => $data->create_date)));

// データベースの接続を終了する
unset($dbh);
