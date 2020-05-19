{* левый столбец *}
{*CTRL+F5!!! CTRL+R НЕ ДОСТАТОЧНО!!! ХВАТИТ ЭТО ЗАБЫВАТЬ!*}

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

    <hr>

    {if isset($arUser)}
        <div id="userBox">
            <a href="../www/?controller=user" id="userLink">{$arUser['displayName']}</a> <br>
            <a href="../www/?controller=user&action=logout" onclick="logout();">Выход</a>
        </div>
        <hr>
    {else}
        <div id="userBox" class="hideme">
            Пользователь <a href="#" id="userLink"></a> <br>      {*ссылка имени пользователя*}
            <a href="../www/?controller=user&action=logout" onclick="logout();">Выйти из аккаунта</a>     {*/user/logout/*}
        </div>

        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>
            email или логин: <br>
            <input type="text" id="loginEmail" name="email" value=""> <br>
            пароль: <br>
            <input type="password" id="loginPwd" name="pwd" value=""> <br>
            <br>
            <input type="button" onclick="login();" value="Войти">

        </div>
        <hr>
        <div id="registerBox">
            <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
            <div id="registerBoxHidden">
                email: <br>
                <input type="text" id="email" name="email" value=""> <br>
                пароль: <br>
                <input type="password" id="pwd1" name="pwd1" value=""> <br>
                повторить пароль: <br>
                <input type="password" id="pwd2" name="pwd2" value=""> <br> <br>
                <input type="button" onclick="registerNewUser();" value="Зарегистрироваться">
            </div>
        </div>
    {/if}

    <div class="menuCaption">Корзина</div>
    <a href="../www/?controller=cart" title="Перейти в корзину">В корзине</a>              {*адрес корзины /cart/*}
    <span id="cartCntItems">
        {if $cartCntItems > 0}{$cartCntItems}{else}пусто{/if}
    </span>
    <br>
    <br>
</div>


