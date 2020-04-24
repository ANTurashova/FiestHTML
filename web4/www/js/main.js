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