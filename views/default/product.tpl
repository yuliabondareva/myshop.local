<h3>{$rsProduct['name']}</h3>

<img width="200" src="{TemplateWebPath}images/products/{$rsProduct['image']}">
<br>
Стоимость: {$rsProduct['price']} грн.

<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart}class="hideme"{/if} href="#" onclick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины"> Удалить из корзины </a>
<a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if} href="#" onclick="addToCart({$rsProduct['id']}); return false;" alt="Добавить в корзину"> Добавить в корзину </a>
<p> Описание <br>{$rsProduct['description']}</p>