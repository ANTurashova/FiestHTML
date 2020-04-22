<?php

/**
 * Подключение к БД
 *
 */
$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";

// Соединяемся с БД
$db = mysqli_connect($dblocation, $dbuser, $dbpasswd);

if(! $db) {
    echo "Ошибки доступа к MySql";
    exit();
}

// Устанавливает кодировку по умолчению для текущего соединения
mysqli_set_charset($db, 'utf8');

if(! mysqli_select_db($db, $dbname)){
    echo "Ошибка доступа к базе данных: ($dbname)";
    exit();
}