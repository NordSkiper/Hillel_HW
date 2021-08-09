<?php

require_once 'classes/User.php';
require 'db_connection.php';

// на какие данные рассчитан этот скрипт
//header("Content-Type: application/json");
// разбираем JSON-строку на составляющие встроенной командой
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data)) {
    $user = new \classes\User();
    $user->jsonRequest($data);

    try{
        $dbh->select();
        $dbh->create($user);
        $user->getData();
    }catch (PDOException $e){
        $e->getMessage();
    }

    //echo "Сервер получил следующие данные: имя — {$user->getName()}, фамилия — {$user->getSurname()}";
    echo 'Данные внесены в таблицу';
}
// отправляем в ответ строку с подтверждением
//echo "Сервер получил следующие данные: имя — $customerData[name], фамилия — $customerData[surname]";

