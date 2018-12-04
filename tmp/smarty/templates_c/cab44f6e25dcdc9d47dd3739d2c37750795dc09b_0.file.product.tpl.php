<?php
/* Smarty version 3.1.31, created on 2018-12-04 21:35:40
  from "C:\OSPanel\domains\localhost\myshop.local\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5c06c8fc7b1c14_09046171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cab44f6e25dcdc9d47dd3739d2c37750795dc09b' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\myshop.local\\views\\default\\product.tpl',
      1 => 1506199916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c06c8fc7b1c14_09046171 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img width="200" src="<?php echo TemplateWebPath;?>
images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
<br>
Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
 грн.

<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?>class="hideme"<?php }?> href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Удалить из корзины"> Удалить из корзины </a>
<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?>class="hideme"<?php }?> href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить в корзину"> Добавить в корзину </a>
<p> Описание <br><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }
}
