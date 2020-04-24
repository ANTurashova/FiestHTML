<?php
/**
 * Контроллер страницы товара (/product/1)
 *
 */

// Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование страницы продукта
 *
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    $itemId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($itemId == null) exit();

    // Получить данные продукта
    $rsProduct = getProductById($itemId);

    // Получить все категории
    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('itemInCart', 0);
    if(in_array($itemId, $_SESSION['cart'])){ //если данный елемент есть в массиве (корзине)
        $smarty->assign('itemInCart', 1); //мы присваиваем ему 1   //itemInCart - флаг
    }

    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}