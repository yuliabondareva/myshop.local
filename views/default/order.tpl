<h2>Данные заказа</h2>
<form id="formOrder" action="/myshop.local/www/?controller=cart&id=saveorder" method="POST">
<table>
	<tr>
		<td>№</td>
		<td>Наименование</td>
		<td>Количество, шт.</td>
		<td>Цена за единицу, грн.</td>
		<td>Стоимость, грн.</td>
	</tr>
	{foreach $rsProducts as $item name=products}
	<tr>
		<td>{$smarty.foreach.products.iteration}</td>
		<td>
			<a href="/myshop.local/www/?controller=product&id={$item['id']}">{$item['name']}</a>
		</td>
		<td>
			<span id="itemCnt_{$item['id']}">
				<input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}">{$item['cnt']}
			</span>
		</td>
		<td>
			<span id="itemPrice_{$item['id']}">
				<input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}">{$item['price']}
			</span>
		</td>
		<td>
			<span id="itemRealPrice_{$item['id']}">
				<input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}">
				{$item['realPrice']}
			</span>
		</td>
	</tr>
	{/foreach}
</table>

{if isset($arUser)}
	{$buttonClass = ""}
	<h2>Данные заказчика</h2>
	<div id="orderUserInfoBox" {$buttonClass}>
		{$name = $arUser['name']}
		{$phone = $arUser['phone']}
		{$adress = $arUser['adress']}
		<table>
			<tr>
				<td>Имя</td>
				<td><input type="text" id="name" name="name" value="{$name}"></td>
			</tr>
			<tr>
				<td>Телефон</td>
				<td><input type="phone" id="phone" name="phone" value="{$phone}"></td>
			</tr>
			<tr>
				<td>Адрес</td>
				<td><textarea id="adress" name="adress">{$adress}</textarea></td>
			</tr>
		</table>
	</div>
{else}
	<div id="loginBox">
		<div class="menuCaption">Авторизация</div>
			<table>
				<tr>
					<td>Логин</td>
					<td><input type="text" id="loginEmail" name="loginEmail" value=""></td>
				</tr>	
				<tr>
					<td>Пароль</td>
					<td><input type="password" id="loginPwd" name="loginPwd" value=""></td>
				</tr>	
				<tr>
					<td></td>
					<td><input type="button" onclick="login();" value="Войти"></td>
				</tr>
			</table>
	</div>

	<div id="registerBox">или <br>
			<div class="menuCaption">Регистрация нового пользователя</div>
				email:<br>
				<input type="email" id="email" name="email" value=""><br>
				пароль:<br>
				<input type="password" id="pwd1" name="pwd1" value=""><br>
				повторить пароль:<br>
				<input type="password" id="pwd2" name="pwd2" value=""><br>
				Имя:
				<input type="text" id="name" name="name" value=""><br>
				Телефон:
				<input type="phone" id="phone" name="phone" value=""><br>
				Адрес:
				<textarea id="adress" name="adress"></textarea><br>

				<input type="button" onclick="registerNewUser();" value="Зарегистрироваться">
	</div>
	{$buttonClass = "class='hideme'"}
{/if}

<input {$buttonClass} id="btnSaveOrder" type="button" value="Оформить заказ" onclick="saveOrder();">
</form>