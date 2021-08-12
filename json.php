<?php

use classes\DataManage;
use classes\User;

require_once 'classes/DataManage.php';
require_once 'classes/User.php';
require 'db_connection.php';

$data = json_decode(file_get_contents("php://input"), true);

function clientCode(DataManage $dataManage)
{
    $dataManage->manage();
}

$user = new User();
if (isset($data)) {
    $dataManage = DataManage::getInstance();
    $dataManage->setData($user, $data, $dbh);
    clientCode($dataManage);
//    echo '<pre>'. $user->getId() .'</pre>';
}



























//if (isset($data['name'])) {
//    $user->jsonRequest($data);
//
//    try{
////        $dbh->select();
//        $dbh->create($user);
////        $user->getData();
//    }catch (PDOException $e){
//        $e->getMessage();
//    }
//
//    echo 'Data has been insert';
//
//}
//
//if (isset($data['tableCreation'])) {
//    $dbh->createTable();
//    echo 'Table created';
//}
//
//if (isset($data['id'])) {
//    $user->jsonRequest($data);
//    $dbh->select($user);
//}
//
//if (isset($data['table'])) {
//
//    if($dbh->tableVerification()) {
//        echo 'Table exist';
//    }else{
//        echo 'Table not exist';
//    }
//}


// отправляем в ответ строку с подтверждением
//echo "Сервер получил следующие данные: имя — $customerData[name], фамилия — $customerData[surname]";

