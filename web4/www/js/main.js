/**
 * Функция добавления товара в корзину
 *
 * @param integer itemId - ID продукта
 * @return в случае успеха обновляем данные корзины на странице
 */
function addToCart(itemId)
{
console.log("js - addToCart()"); //отладочная                                                                           // ---
    $.ajax({ //функция из библиотеки jquery, предназначена для создании ajax-запросов
        type: 'POST', //тип запроса - метод post
        async: false, //асинхронность выключена
        url: "../www/?controller=cart&action=addtocart&id=" + itemId + '/', //куда мы будем обращаться                  // "/cart/addtocart/"
        dataType: 'json', //тип данных - json
        success: function (data) {
            if(data['success']) {
                $('#cartCntItems').html (data['cntItems']);

                $('#addCart_'+ itemId).hide(); //прячет
                $('#removeCart_'+ itemId).show(); //показывает
            }
        }
    });
}

/**
 * Удаление продукта из корзины
 *
 * @param integer itemId - ID продукта
 * @return в случае успеха обновляем данные корзины на странице
 */
function removeFromCart(itemId)
{
console.log("js - removeFromCart("+itemId+")"); //отладочная                                                            // ---
    $.ajax({ //функция из библиотеки jquery, предназначена для создании ajax-запросов
        type: 'POST', //тип запроса - метод post
        async: false, //асинхронность выключена
        url: "../www/?controller=cart&action=removefromcart&id=" + itemId + '/', //куда мы будем обращаться             // "/cart/removefromcart/"
        dataType: 'json', //тип данных - json
        success: function (data) {
            if(data['success']) {
                $('#cartCntItems').html (data['cntItems']);

                $('#addCart_'+ itemId).show();
                $('#removeCart_'+ itemId).hide();
            }
        }
    });
}


/**
 * Подсчёт стоимости купленного товара
 *
 * @param integer itemId - ID продукта
 */
function conversionPrice(itemId) {
    var newCnt = $('#itemCnt_' + itemId).val();
    var itemPrice = $('#itemPrice_' + itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice); //заменить в с тегом itemRealPrice_itemIds
}


/**
 * Получение данных с формы
 *
 */
function getData(obj_form) {
    var hData = {};
    $('input, textarea, select', obj_form).each(function () {
        if(this.name) {
            hData[this.name] = this.value;
console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
}


/**
 * Регистрация нового пользователя
 *
 */
function registerNewUser() {
    var postData = getData('#registerBox'); //gatData будет собирать в json массив все нужные значния, которые содержатся в id #registerBox

    $.ajax({
        type: 'POST',
        async: false,
        url: "../www/?controller=user&action=register",                                                             // "/user/register/"
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']) {
              //  console.log("Прибыли данные: " + data);
                alert('Регистрация прошла успешно');

                //> блок в левом столбце
                $('#registerBox').hide();

                $('#userLink').attr('href', '../www/?controller=user');                                                 //"/user/"
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                //<

                //> страница заказа
//                $('#loginBox').hide();
//                $('#btnSaveOrder').show();
                //<
            } else {
             //   console.log("Прибыли данные: " + data);
                alert(data['message']);
            }
        }
    });
}

/**
 * Авторизация пользователя
 *
 */
function login() {
    var email = $('#loginEmail').val();
    var pwd = $('#loginPwd').val();

    var postData = getData('#loginBox');

    $.ajax({
        type: 'POST',
        async: false,
        url: "../www/?controller=user&action=login",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']) {

                //> блок в левом столбце
                $('#registerBox').hide();
                $('#loginBox').hide();

                $('#userLink').attr('href', '../www/?controller=user');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
            } else {
                alert(data['message']);
            }
        }
    });
}
