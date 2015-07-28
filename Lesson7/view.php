<?php
require_once 'twig.php';
require_once 'Blog.php';

$blog = new Blog();
$data = $blog->getArticle($_GET['id']);

// Twigにはめこむ
// templatesディレクトリにある *output.tpl* の {{article}}と{{name}}と{{create_date}}に受け取ったデータを嵌め込んで表示する
print($twig->render('output.tpl',
  array('article'=>$data->article,'name'=> $data->author,'create_date' => $data->create_date)));
