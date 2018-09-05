<?php
/* Smarty version 3.1.31, created on 2017-10-05 11:40:14
  from "C:\OpenServer\domains\localhost\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d5efee22f882_91525580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12bf94027a5539365f78af624700c4876cb3662c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\views\\default\\leftcolumn.tpl',
      1 => 1507192809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59d5efee22f882_91525580 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="leftColumn">
		<div id="leftMenu">
			<div class="menuCaption">Меню:</div>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                	<a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br>
					
					<?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
							--<a href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

					<?php }?>
					
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		</div>

		<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>

			<div id="userBox">
				<a href="/myshop.local/www/?controller=user" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br>
				<a href="/myshop.local/www/?controller=user&action=logout" onclick="logout();">Выход</a>		
			</div>

		<?php } else { ?>

		<div id="userBox" class="hideme">
			<a href="#" id="userLink"></a><br>
			<a href="/myshop.local/www/?controller=user&action=logout" onclick="logout();">Выход</a>
		</div>

		 	<?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>
			<div id="loginBox">
				<div class="menuCaption">Авторизация</div>
				<input type="text" id="loginEmail" name="loginEmail" value=""><br>
				<input type="password" id="loginPwd" name="loginPwd" value=""><br>
				<input type="button" onclick="login();" value="Войти">
			</div>

			<div id="registerBox">
				<div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
				<div id="registerBoxHidden" class="hideme">
					email:<br>
					<input type="email" id="email" name="email" value=""><br>
					пароль:<br>
					<input type="password" id="pwd1" name="pwd1" value=""><br>
					повторить пароль:<br>
					<input type="password" id="pwd2" name="pwd2" value=""><br>
					<input type="button" onclick="registerNewUser();" value="Зарегистрироваться">
				</div>
			</div>
			<?php }?>
		<?php }?>


		<div class="menuCaption">Корзина</div>	
		<a href="/myshop.local/www/?controller=cart" title="Перейти в корзину">В корине</a>
			<span id="cartCntItems">
				 <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>пусто<?php }?>
			</span>
	</div><?php }
}
