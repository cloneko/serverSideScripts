<?php /* Smarty version 3.1.25-dev/8, created on 2015-06-15 19:10:02
         compiled from "/home/yonashiro/work/ServerSideScript/Lesson3/output.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8647868557ea47a78d3f3_24599869%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9365dcf908511ac075846e6bf1b57755a46d86d9' => 
    array (
      0 => '/home/yonashiro/work/ServerSideScript/Lesson3/output.tpl',
      1 => 1434362449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8647868557ea47a78d3f3_24599869',
  'variables' => 
  array (
    'name' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.25-dev/8',
  'unifunc' => 'content_557ea47a7acf18_28632707',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_557ea47a7acf18_28632707')) {
function content_557ea47a7acf18_28632707 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8647868557ea47a78d3f3_24599869';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="charset" content="UTF-8">
    <title>ロバのみみblog 表示画面</title>
  </head>
  <body>
    <h1>ロバのみみblog 表示画面</h1>
    <h2>投稿者</h2>
    <p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p>
    <h2>本文</h2>
    <p>
      <?php echo $_smarty_tpl->tpl_vars['article']->value;?>

    </p>
  </body>
</html>
<?php }
}
?>