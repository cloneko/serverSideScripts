<?php
require '../lib/twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register(); // Twigを使う時のおまじない
$loader = new Twig_Loader_Filesystem('./templates'); // Twigで使用するテンプレートファイルを格納する場所

// Twigの設定
$twig = new Twig_Environment($loader, array(
    'cache' => 'cache'
));

// データベースの設定
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

// ここからがadd.phpと違うところ。データ呼び出してみるよ!
$query = 'SELECT id,article,author,create_date,update_date FROM articles WHERE id = :id';
$stmt = $dbh->prepare($query);
$stmt->bindValue(":id",1,PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_OBJ);


var_dump($data);
// Twigにはめこむ
// templatesディレクトリにある *output.tpl* の {{article}}と{{name}}に受け取ったデータを嵌め込んで表示する
//print($twig->render('output.tpl',
//  array('article'=>$data->article,'name'=> $data->author,'create_date' => $data->create_date)));
