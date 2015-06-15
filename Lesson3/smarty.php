<?php
require '../lib/vendor/autoload.php';

$smarty = new Smarty(); // Smartyを使うためのおまじない
$smarty->compile_dir = './template_c';  // Smartyでこれだけは設定しとかないといけない奴
$smarty->assign('name',$_POST['name']); // テンプレートの{$name}ってとこに$_POST['name']のデータを嵌め込む
$smarty->assign('article',$_POST['article']); // テンプレートの{$article}ってとこに$_POST['article']のデータを嵌め込む
$smarty->display('output.tpl'); // 表示する!!!
