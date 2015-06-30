<?php
require '../lib/vendor/autoload.php';

Twig_Autoloader::register(); // Twigを使う時のおまじない
$loader = new Twig_Loader_Filesystem('./templates'); // Twigで使用するテンプレートファイルを格納する場所

// Twigの設定
$twig = new Twig_Environment($loader, array(
    'cache' => 'cache'
));


// データを追加してみる…前にデータベースの設定いろいろやる。こ
// この辺はおまじないだと思ってもらって大丈夫です。
// Ref: https://github.com/illuminate/database

use Illuminate¥Database¥Cupsule¥Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'blog',
    'username'  => 'root',
    'password'  => 'password',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);




// templatesディレクトリにある *output.tpl* の {{article}}と{{name}}に受け取ったデータを嵌め込んで表示する
print($twig->render('output.tpl',array('article'=>$_POST['article'],'name'=> $_POST['name'])));
