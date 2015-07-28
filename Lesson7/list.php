<?php
require_once 'twig.php';
require_once 'Blog.php';

$blog = new Blog();
$data = $blog->getArticles();

print($twig->render('list.tpl',array('articles'=>$data)));
