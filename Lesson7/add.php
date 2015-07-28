<?php
require_once 'twig.php';
require_once 'Blog.php';
// セッションはじまり
session_start();

$blog = new Blog();
$blog->addArticle($_SESSION['article'],$_SESSION['article'],$_SESSION['create_date'],$_SESSION['create_date'])

// あとはTwig使って表示するだけ。
// templatesディレクトリにある *done.tpl* の {{article}}と{{name}}に受け取ったデータを嵌め込んで表示する
print($twig->render('done.tpl',
  array('article'=>$_SESSION['article'],'name'=> $_SESSION['name'])));

// もうセッションの中身は不要なので削除しておく
unset($_SESSION['article']);
unset($_SESSION['name']);
unset($_SESSION['create_date']);
