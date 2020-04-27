<?php

/**
 *
 * Основные функции
 *
 */

/**
 * Формирование запрашиваемой страницы
 *
 * @param string $controllerName название контроллера
 * @param string $actionName название кфункции обработки страницы
 */
function loadPage ($smarty, $controllerName, $actionName = 'index') {

    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action'; //определяем имя функции
    $function($smarty); //и вызываем
}

/**
 * Загрузка шаблона
 *
 * @param object $smarty объект шаблонизатора
 * @param string $templateName название файла шаблона
 */
function loadTemplate($smarty, $templateName)
{
    @$smarty->display($templateName . TemplatePostfix); //мы тут формируем имя шаблона
}

/**
 * Функция отладки. Останавливает работу программы выводя значение переменной $value
 *
 * @param variant $value переменная для вывода ее на страницу
 * @param int $die
 */
function d($value = null, $die = 1)  //d($actionName, 0);  //0 = идти дальше
{
    echo 'Debug: <br/><pre>';
    print_r($value);
    echo '</pre>';

    if($die) die;
}

function createSmartyRsArray($rs)
{
    if (! $rs) return false;

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $smartyRs[] = $row;
    }
    return $smartyRs;
}