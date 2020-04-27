<?php
/**
 * Контроллер главной страницы
 *
 */

// Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/UsersModel.php';

/**
 * Формирование главной страницы сайта
 *
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    $rsCategories = getAllMainCatsWithChildren(); //получить все главные категории с их дочерними
    $rsProducts = getLastProducts(16);


    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header'); //для передачи в шаблон
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}