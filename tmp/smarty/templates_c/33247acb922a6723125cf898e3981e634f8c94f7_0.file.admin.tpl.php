<?php
/* Smarty version 3.1.31, created on 2017-08-27 19:26:14
  from "C:\OpenServer\domains\localhost\myshop.local\views\default\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59a2f2a6ae30f8_52640766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33247acb922a6723125cf898e3981e634f8c94f7' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\myshop.local\\views\\default\\admin.tpl',
      1 => 1503851140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a2f2a6ae30f8_52640766 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="blockNewCategory">
	Новая категория:
	<input type="text" name="newCategoryName" id="newCategoryName" value="">
	<br>

	Является подкатегорией для 
	<select name="generalCatId">
		<option value="0">Главная категория  
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</select>
	<br>
	<input type="button" onclick="newCategory();" value="Добавить категорию">

</div><?php }
}
