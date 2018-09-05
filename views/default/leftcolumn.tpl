<div id="leftColumn">
		<div id="leftMenu">
			<div class="menuCaption">Меню:</div>
				{foreach $rsCategories as $item}
                	<a href="/myshop.local/www/?controller=category&id={$item['id']}">{$item['name']}</a><br>
					
					{if isset($item['children'])}
						{foreach $item['children'] as $itemChild}
							--<a href="/myshop.local/www/?controller=category&id={$itemChild['id']}">{$itemChild['name']}</a><br>
						{/foreach}
					{/if}
					
                {/foreach}
		</div>

		{if isset($arUser)}

			<div id="userBox">
				<a href="/myshop.local/www/?controller=user" id="userLink">{$arUser['displayName']}</a><br>
				<a href="/myshop.local/www/?controller=user&action=logout" onclick="logout();">Выход</a>		
			</div>

		{else}

		<div id="userBox" class="hideme">
			<a href="#" id="userLink"></a><br>
			<a href="/myshop.local/www/?controller=user&action=logout" onclick="logout();">Выход</a>
		</div>

		 	{if ! isset($hideLoginBox)}
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
			{/if}
		{/if}


		<div class="menuCaption">Корзина</div>	
		<a href="/myshop.local/www/?controller=cart" title="Перейти в корзину">В корине</a>
			<span id="cartCntItems">
				 {if $cartCntItems > 0}{$cartCntItems}{else}пусто{/if}
			</span>
	</div>