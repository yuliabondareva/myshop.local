<?php
/* Smarty version 3.1.31, created on 2018-12-04 21:35:55
  from "C:\OSPanel\domains\localhost\myshop.local\views\default\category.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5c06c90b9e5576_58202176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8b53058093afe016261bd3b5cf6aa7090777d52' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\myshop.local\\views\\default\\category.tpl',
      1 => 1507194780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c06c90b9e5576_58202176 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Товары категории <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h1>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
	<div style="float: left; padding: 0px 30px 40px 0px">
		<a href="/myshop.local/www/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
			<img src="<?php echo TemplateWebPath;?>
images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100"></a>
		<br>	
		<a href="/myshop.local/www/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
	</div>
<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
	<div style="clear: both;"></div>
<?php }?>	

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item', false, NULL, 'childCats', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
	<h2><a href="/myshop.local/www/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
