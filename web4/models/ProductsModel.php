<?php
/**
 * Модель для таблицы продукции (products)
 *
 */

/**
 * Получаем последние добавленные товары
 *
 * @param integer $limit Лимит товаров
 * @return array Массив товаров
 */
function getLastProducts($limit = null)
{
    //В IndexController.php прописать include_once '../models/ProductsModel.php';
    global $db;
    $sql = 'SELECT * FROM products ORDER BY id DESC'; //ORDER BY = сортировать данные по полю id //DESC = в обратном порядке
    if($limit){
        $sql .= " LIMIT {$limit}";
    }
    $rs = mysqli_query($db,$sql);
    return createSmartyRsArray($rs);
}



/**
 * Получить продукты для категории $itemId
 *
 * @param integer $itemId ID категории
 * @return array массив продуктов
 */
function getProductsByCat($itemId)
{
    global $db;
    $itemId = intval($itemId); //преобразование в тип integer //для защиты от SQL-инъекций
    $sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";
    $rs = mysqli_query($db,$sql);
    return createSmartyRsArray($rs);
}

/**
 * Получить данные продукта по ID
 *
 * @param integer $itemId ID продукта
 * @return array массив данных продукта
 */
function getProductById($itemId)
{
    global $db;
    $itemId = intval($itemId); //преобразование в тип integer //для защиты от SQL-инъекций
    $sql = "SELECT * FROM products WHERE id = '{$itemId}'";
    $rs = mysqli_query($db,$sql);
    return mysqli_fetch_assoc($rs); //асоц массив
}


/**
 * Получить список продуктов из массива идентификаторов (ID's)
 *
 * @param type $itemsIds массив идентификаторов продуктов
 * @return array массив данных продуктов
 */
function getProductsFromArray($itemsIds)
{
    global $db;
    $strIds = implode($itemsIds, ', '); //создаёт строку
    $sql = "SELECT * FROM products WHERE id in ({$strIds})";
    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}