<?php
/* Smarty version 3.1.31, created on 2017-09-24 21:39:40
  from "C:\OpenServer\domains\localhost\myshop.local\views\admin\adminleftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59c7fbec94d0f4_39277747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '871e09b8aac7ddecbfbdb205bc107b2de23546b6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\myshop.local\\views\\admin\\adminleftcolumn.tpl',
      1 => 1506277089,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c7fbec94d0f4_39277747 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="leftColumn">

<div id="leftMenu">
	<div class="menuCaption">Меню:</div>
	<a href="/myshop.local/www/?controller=admin">Главная</a><br>
	<a href="/myshop.local/www/?controller=admin&action=category">Категории</a><br>
	<a href="/myshop.local/www/?controller=admin&action=products">Товар</a><br>
	<a href="/myshop.local/www/?controller=admin&action=orders">Заказы</a>
</div>
	

	<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>

			<div id="adminBox">
				<a href="/myshop.local/www/?controller=admin" id="adminLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br>
				<a href="/myshop.local/www/?controller=admin&action=logoutadmin" onclick="logoutadmin();">Выход</a>		
			</div>

		<?php } else { ?>

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
