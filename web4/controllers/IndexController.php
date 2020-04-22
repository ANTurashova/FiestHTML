<?php
/**
 * Контроллер главной страницы
 *
 */

// Подключаем модели
include_once '../models/CategoriesModel.php';

function testAction(){
    echo 'InC -> tA';
}

/**
 *  Формирование главной страницы сайта
 *
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    $rsCategories = getAllMainCatsWithChildren(); //получить все главные категории с их дочерними


    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header'); //для передачи в шаблон
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
