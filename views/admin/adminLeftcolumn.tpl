<div id="leftColumn">
{if isset($arUser)}
	<div id="leftMenu">
		<div class="menuCaption">Меню:</div>
			<a href="/myshop.local/www/?controller=admin&action=category">Категории</a><br>
			<a href="/myshop.local/www/?controller=admin&action=products">Товар</a><br>
			<a href="/myshop.local/www/?controller=admin&action=orders">Заказы</a>
		</div>

			<div id="adminBox">
				<a href="/myshop.local/www/?controller=admin" id="adminLink">{$arUser['displayName']}</a><br>
				<a href="/myshop.local/www/?controller=admin&action=logoutadmin" onclick="logoutadmin();">Выход</a>		
			</div>

{else}
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
{/if}
</div>