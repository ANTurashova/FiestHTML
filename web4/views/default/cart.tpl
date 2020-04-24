{* шаблон корзины *}

<h1>Корзина</h1>

{if ! $rsProducts}
    В корзине пусто.
{else}
    <h2>Данные заказа</h2>
    <table>
        <tr>
            <td>№</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Цена</td>
            <td>Действие</td>
        </tr>

        {foreach $rsProducts as $item name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="../www/?controller=product&id={$item.id}" target="_blank">{$item.name}</a></td>
                <td><input name="itemCnt_{$item.id}" id="itemCnt_{$item.id}" type="text" value="1" onchange="conversionPrice({$item.id});"></td>
                <td><sran id="itemPrice_{$item.id}" value="{$item.price}">
                        {$item.price}
                    </sran></td>
                <td><span id="itemRealPrice_{$item.id}">
                        {$item.price}
                    </span></td>
                <td>
                    <a id="removeCart_{$item.id}" href="#" onClick="removeFromCart({$item.id}); return false;" alt="Удалить из корзины">Удалить</a>
                    <a id="addCart_{$item.id}" class="hideme" href="#" onClick="addToCart({$item.id}); return false;" alt="Восстановить элемент">Вернуть</a>
                </td>
            </tr>
        {/foreach}

    </table>
{/if}

<br>