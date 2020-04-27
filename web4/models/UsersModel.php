<?php

/**
 * Модель для таблицы пользователей (users)
 *
 */

/**
 *  Регистрация нового пользователя
 *
 * @param string $email
 * @param string $pwdMD5
 * @param string $name
 * @param string $phone
 * @param string $address
 * @return array массив данных нового пользователя
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $address)
{
    global $db;
    $sql = "INSERT INTO users (`email`, `pwd`, `name`, `phone`, `address`) VALUES ('$email', '$pwdMD5', '$name', '$phone', '$address')"; //вставка в таблицу
    $rs = mysqli_query($db,$sql);

    if($rs) {
        $sql = "SELECT * FROM users WHERE (`email` = '$email' and `pwd` = '$pwdMD5') LIMIT 1"; //выбираем 1 учётную запись
        $rs = mysqli_query($db,$sql);
        $rs = createSmartyRsArray($rs);

        if(isset($rs[0])){
            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }
    } else { //если неуспешно
        $rs['success'] = 0;
    }
    return $rs;
}


/**
 * Проверка параметров для регистрации пользователя
 *
 * @param $email
 * @param $pwd1
 * @param $pwd2
 * @return array результат
 */
function checkRegisterParams($email, $pwd1, $pwd2)
{
    $res = null; //иниц массив

    if(! $email) {
        $res['success'] = false;
        $res['message'] = 'Введите email';
    }

    if(! $pwd1){
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
    }

    if(! $pwd2){
        $res['success'] = false;
        $res['message'] = 'Введите повтор пароля';
    }

    if($pwd1 != $pwd2){
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают';
    }

    return $res;
}


/**
 * Проверка почты (если есть email адрес в БД)
 *
 * @param $email
 * @return array массив - строка из таблицы users, либо пустой массив
 */
function checkUserEmail($email)
{
    global $db;
    $sql = "SELECT id FROM users WHERE email = '{$email}'";

    $rs = mysqli_query($db,$sql);
    $rs = createSmartyRsArray($rs);

    return $rs;
}