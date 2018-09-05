<?php
/* Smarty version 3.1.31, created on 2017-09-24 21:42:07
  from "C:\OpenServer\domains\localhost\myshop.local\views\admin\adminHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59c7fc7fdb2602_75488500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ea4d20a3e9759cfb481ad4133ceb2bd4347c643' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\myshop.local\\views\\admin\\adminHeader.tpl',
      1 => 1506278455,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftcolumn.tpl' => 1,
  ),
),false)) {
function content_59c7fc7fdb2602_75488500 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
		<link rel="stylesheet" type="text/css" href="<?php echo TemplateAdminWebPath;?>
css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TemplateWebPath;?>
js/jquery-3.2.1.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TemplateAdminWebPath;?>
js/admin.js"><?php echo '</script'; ?>
>
	</head>
<body>
	<div id="header">
		<h1>Управление сайтом</h1>
	</div>
	
	<?php $_smarty_tpl->_subTemplateRender('file:adminLeftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div id="centerColumn"><?php }
}
