<h1>Корзина</h1>

{if ! $rsProducts}
В корзине пусто.

{else}
	<form action="/myshop.local/www/?controller=cart&action=order" method="POST">
	<h2>Данные заказа</h2>
<table>
	<tr>
		<td>№</td>
		<td>Наименование</td>
		<td>Количество, шт.</td>
		<td>Цена за единицу, грн.</td>
		<td>Цена, грн.</td>
		<td>Действие</td>
	</tr>
	{foreach $rsProducts as $item name=products}
	<tr>
		<td>
			{$smarty.foreach.products.iteration}
		</td>
		<td>
			<a href="/myshop.local/www/?controller=product&id={$item['id']}">{$item['name']}</a>
		</td>
		<td>
			<input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});">
		</td>
		<td>
			<span id="itemPrice_{$item['id']}" value="{$item['price']}">
				{$item['price']} 
			</span>
		</td>
		<td>
			<span id="itemRealPrice_{$item['id']}">
				{$item['price']}
			</span>
		</td>
		<td>
			<a id="removeCart_{$item['id']}" href="#" onclick="removeFromCart({$item['id']}); return false;" title="Удалить из корзины">Удалить</a>
			<a id="addCart_{$item['id']}" class="hideme" href="#" onclick="addToCart({$item['id']}); return false;" title="Восстановить элемент">Восстановить</a>
		</td>
	</tr>
	{/foreach}
</table>
<input type="submit" value="Оформить заказ">
</form>
{/if}