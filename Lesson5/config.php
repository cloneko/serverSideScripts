<?php
require '../lib/twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register(); // Twigを使う時のおまじない
$loader = new Twig_Loader_Filesystem('./templates'); // Twigで使用するテンプレートファイルを格納する場所

// Twigの設定
$twig = new Twig_Environment($loader, array(
    'cache' => 'cache'
));

// データを追加してみる…前にデータベースの設定いろいろやる。
// 教科書だと159ページ参照
$host = 'localhost';
$dbname = 'blog';
$charset = 'utf8';
$user = 'root';
$password = '';
$driver = 'mysql';
$connection = sprintf("%s:host=%s;dbname=%s;charset=%s",$driver,$host,$dbname,$charset);
$dbh = new PDO($connection,$user,$password);
// エラーが起きたら例外を投げる…
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
