<?php
session_start();

// если в сессии нет массива корзины то создаём его
if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

include_once '../config/config.php';              // Инициализация настроек
include_once '../config/db.php';                  // Подключение базы данных
include_once  '../library/mainFunctions.php';     // Основные функции

// определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

// определяем с какой функцией будем рабоать
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// если в сессии есть данные об авторизированном пользователь, то передаем их в шаблон
if(isset($_SESSION['user'])){
    $smarty->assign('arUser', $_SESSION['user']);
}

// инициализируем переменную шаблонизатора количества элементов в корзиие
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName); //создаём страницу