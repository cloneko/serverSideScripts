<?php
require_once 'twig.php';
require_once 'Blog.php';
// セッションはじまり
session_start();

// blogの機能を使えるようにする
$blog = new Blog();
// blogの記事を登録する関数を呼び出す
$blog->addArticle($_SESSION['article'],$_SESSION['name'],$_SESSION['create_date']);

// あとはTwig使って表示するだけ。
// templatesディレクトリにある *done.tpl* の {{article}}と{{name}}に受け取ったデータを嵌め込んで表示する
print($twig->render('done.tpl',
  array('article'=>$_SESSION['article'],'name'=> $_SESSION['name'])));

// もうセッションの中身は不要なので削除しておく
unset($_SESSION['article']);
unset($_SESSION['name']);
unset($_SESSION['create_date']);
