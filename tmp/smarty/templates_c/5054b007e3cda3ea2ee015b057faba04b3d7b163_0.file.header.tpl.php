<?php
/* Smarty version 3.1.31, created on 2018-12-04 20:11:36
  from "C:\OSPanel\domains\localhost\myshop.local\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5c06b54871ac67_42310962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5054b007e3cda3ea2ee015b057faba04b3d7b163' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\myshop.local\\views\\default\\header.tpl',
      1 => 1543943466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5c06b54871ac67_42310962 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
		<link rel="stylesheet" type="text/css" href="<?php echo TemplateWebPath;?>
css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TemplateWebPath;?>
js/jquery-3.2.1.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TemplateWebPath;?>
js/main.js"><?php echo '</script'; ?>
>
	</head>
<body>
	<div id="header">
		<h1>my shop - интернет магазин</h1>
	</div>
	
	<?php $_smarty_tpl->_subTemplateRender('file:leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div id="centerColumn"><?php }
}
