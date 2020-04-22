<?php /* Smarty version Smarty-3.1.6, created on 2020-04-22 00:45:32
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18208642935e9f70a7a5ceb8-08709784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1587509131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18208642935e9f70a7a5ceb8-08709784',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5e9f70a7af62b',
  'variables' => 
  array (
    'TemplateWebPath' => 0,
    'pageTitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e9f70a7af62b')) {function content_5e9f70a7af62b($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['TemplateWebPath']->value;?>
css/main.css" type="text/css" />
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
</head>
<body>
<div id="header">
    <h1>MyShop - магазин</h1>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="centerColumn"><?php }} ?>