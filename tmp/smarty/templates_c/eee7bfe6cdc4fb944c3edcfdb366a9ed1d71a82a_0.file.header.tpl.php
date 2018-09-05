<?php
/* Smarty version 3.1.31, created on 2017-10-05 11:39:06
  from "C:\OpenServer\domains\localhost\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d5efaa825bd0_82474738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eee7bfe6cdc4fb944c3edcfdb366a9ed1d71a82a' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\views\\default\\header.tpl',
      1 => 1506196274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_59d5efaa825bd0_82474738 (Smarty_Internal_Template $_smarty_tpl) {
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
