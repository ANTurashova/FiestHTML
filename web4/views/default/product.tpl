{* страница продукта *}
<h3>{$rsProduct.name}</h3>

<img src="../www/images/products/{$rsProduct.image}" alt="{$rsProduct.image}">
<br>
Стоимость: {$rsProduct.price}
<br>

<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart}class="hideme"{/if} href="#" onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из карзины">Удалить из карзины</a>
<a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if} href="#" onClick="addToCart({$rsProduct['id']}); return false;" alt="Добавить в корзину">Добавить в корзину</a>
<p>Описание <br>{$rsProduct.description}</p>