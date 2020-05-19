<?php

/**
 * Контроллер функций пользователя
 *
 */

// Подключаем модели
include_once '../models/CategoriesModel.php';
//include_once '../models/OrdersModel.php';
include_once '../models/UsersModel.php';


/**
 * AJAX регистрация пользователя
 * Инициализация сессионной переменной ($_SESSION['user'])
 *
 * @return json массив данных пользователя
 */
function registerAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null; //если пришла берём значение, в противном случаем берём null
    $email = trim($email);

    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);

    $resData = null; //для промежуточных данных об ошибках или успехах
    $resData = checkRegisterParams($email, $pwd1, $pwd2); //проверочка

    if(! $resData && checkUserEmail($email)){
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким email('{$email}') уже зарегистрирован";
    }

    if(! $resData){ //если ошибок нет
        $pwdMD5 = md5($pwd1); //создаём наш пароль, который отнесём в БД

        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $address);
        if($userData['success']){
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации';
        }
    }
    echo json_encode($resData);
}

/**
 *  Разлогинивание пользователя
 *
 */
function logoutAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    redirect('../www/');
}

/**
 * AJAX авторизацмя пользователя
 *
 * @return json массив данных залогиненого пользователя
 */
function loginAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email); /*удаляет пробелы с боков*/
    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);

    $userData = loginUser($email, $pwd);

    if($userData['success']){
        $userData = $userData[0];

        $_SESSION['user'] = $userData; /*$userData из модели пришло*/
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

        $resData = $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Неверный логин или пароль';
    }
    echo json_encode($resData);
}

/**
 * Формирование главной страницы пользователя
 *
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty) {
    // если пользователь не залогинен, то редирект на главную страницу
    if(! isset($_SESSION['user'])){
        redirect('../www/');
    }

    // получаем список категорий для меню
    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('pageTitle', 'Страница пользователя');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}