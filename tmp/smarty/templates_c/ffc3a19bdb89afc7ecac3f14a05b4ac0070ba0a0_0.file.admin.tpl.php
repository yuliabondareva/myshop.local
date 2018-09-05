<?php
/* Smarty version 3.1.31, created on 2017-08-27 20:57:57
  from "C:\OpenServer\domains\localhost\myshop.local\views\default\admin\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59a30825e71975_94858373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffc3a19bdb89afc7ecac3f14a05b4ac0070ba0a0' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\myshop.local\\views\\default\\admin\\admin.tpl',
      1 => 1503851140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a30825e71975_94858373 (Smarty_Internal_Template $_smarty_tpl) {
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
