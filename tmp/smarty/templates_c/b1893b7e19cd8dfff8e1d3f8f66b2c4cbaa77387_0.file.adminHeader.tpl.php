<?php
/* Smarty version 3.1.31, created on 2017-08-27 20:57:57
  from "C:\OpenServer\domains\localhost\myshop.local\views\default\admin\adminHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59a30825c716a9_91714558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1893b7e19cd8dfff8e1d3f8f66b2c4cbaa77387' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\myshop.local\\views\\default\\admin\\adminHeader.tpl',
      1 => 1503823615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftcolumn.tpl' => 1,
  ),
),false)) {
function content_59a30825c716a9_91714558 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
		<link rel="stylesheet" type="text/css" href="<?php echo TemplateWebPath;?>
css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="../www/js/jquery-3.2.1.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../www/js/admin.js"><?php echo '</script'; ?>
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
