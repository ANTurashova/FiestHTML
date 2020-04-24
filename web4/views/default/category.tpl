{* Страница категории *}
<h1>Товары категории {$rsCategory.name}</h1>

{foreach $rsProducts as $item name = products}
    <div style="float:left; padding: 0px 30px 40px 0px">
        <a href="../www/?controller=product&id={$item.id}">
            <img src="../www/images/products/{$item.image}" alt="{$item.image}" >
        </a>
        <br>
        <a href="../www/?controller=product&id={$item.id}">{$item.name}</a>
    </div>

    {if $smarty.foreach.products.iteration mod 3 == 0}
        <div style="clear: both;"></div>
    {/if}
{/foreach}

{foreach $rsChildCats as $item name = childCats}
    <h2><a href="../www/?controller=category&id={$item.id}">{$item.name}</a></h2>
{/foreach}