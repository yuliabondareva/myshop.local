<?php
/* Smarty version 3.1.31, created on 2018-12-04 20:11:36
  from "C:\OSPanel\domains\localhost\myshop.local\views\default\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5c06b548d27946_62453113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5953adee9c94baf445de2cb9106b34f58ec3680' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\myshop.local\\views\\default\\index.tpl',
      1 => 1543943466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c06b548d27946_62453113 (Smarty_Internal_Template $_smarty_tpl) {
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
" width="100">
		</a><br>	
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
}
}
