<?php
/* Smarty version 3.1.31, created on 2017-10-08 09:37:08
  from "C:\OpenServer\domains\localhost\myshop.local\views\admin\adminLeftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d9c79493ecb0_99164078',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37ad81a5f5eedab28c0868302ad81220bfb0c361' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\myshop.local\\views\\admin\\adminLeftcolumn.tpl',
      1 => 1507439574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59d9c79493ecb0_99164078 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="leftColumn">
<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
	<div id="leftMenu">
		<div class="menuCaption">Меню:</div>
			<a href="/myshop.local/www/?controller=admin&action=category">Категории</a><br>
			<a href="/myshop.local/www/?controller=admin&action=products">Товар</a><br>
			<a href="/myshop.local/www/?controller=admin&action=orders">Заказы</a>
		</div>

			<div id="adminBox">
				<a href="/myshop.local/www/?controller=admin" id="adminLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br>
				<a href="/myshop.local/www/?controller=admin&action=logoutadmin" onclick="logoutadmin();">Выход</a>		
			</div>

<?php } else { ?>
	<div id="leftMenu" class="hideme">
		<div class="menuCaption">Меню:</div>
			<a href="/myshop.local/www/?controller=admin&action=category">Категории</a><br>
			<a href="/myshop.local/www/?controller=admin&action=products">Товар</a><br>
			<a href="/myshop.local/www/?controller=admin&action=orders">Заказы</a>
		</div>

		<div id="adminBox" class="hideme">
			<a href="#" id="adminLink"></a><br>
			<a href="/myshop.local/www/?controller=admin&action=logoutadmin" onclick="logoutadmin();">Выход</a>
		</div>

			<div id="loginBox">
				<div class="menuCaption">Авторизация</div>
				<input type="text" id="loginEmail" name="loginEmail" value=""><br>
				<input type="password" id="loginPwd" name="loginPwd" value=""><br>
				<input type="button" onclick="loginadmin();" value="Войти">
			</div>
<?php }?>
</div><?php }
}
