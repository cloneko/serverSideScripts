<?php
require_once 'twig.php';
// セッションはじまり
session_start();

$now = date('Y-m-d H:i:s'); // 投稿時間を取得している。

// 一旦セッションに投稿された情報を入れておく
$_SESSION['article'] = $_POST['article'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['create_date'] = $now;

// あとはTwig使って表示するだけ。
// templatesディレクトリにある *preview.tpl* の {{article}}と{{name}}に受け取ったデータを嵌め込んで表示する
print($twig->render('preview.tpl',
  array('article'=>$_SESSION['article'],'name'=> $_SESSION['name'])));
