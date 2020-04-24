{* левый столбец *}

<div id="leftColumn">


    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        {foreach from = $rsCategories item = item}
            <a href="../www/?controller=category&id={$item.id}">{$item.name}</a>
            <br>
            {if isset($item.children)}
                {foreach $item.children as $itemChild}
                    ►<a href="../www/?controller=category&id={$itemChild.id}">{$itemChild.name}</a>
                    <br>
                {/foreach}
             {/if}
        {/foreach}
    </div>

    <div class="menuCaption">Корзина</div>
    <a href="../www/?controller=cart" title="Перейти в корзину">В корзине</a>              {*!!!!!!!!!!!!!!адрес корзины /cart/*}
    <span id="cartCntItems">
        {if $cartCntItems > 0}{$cartCntItems}{else}пусто{/if}
    </span>
</div>