<?php

use classes\UserDB;
require_once 'classes/UserDB.php';

try{
    $host = "localhost";
    $db_name = "hillel";
    $charset = "utf8";
    $user = "root";
    $pass = "";
    $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
    $opt = array ( PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC );

    $dbh = new UserDB ($dsn, $user, $pass, $opt);

//    $query = $dbh->prepare('SHOW TABLES like `test`');
//    $query->execute();
//
//    $users = $query->fetchAll();
//
//    echo "<pre>" . var_dump($users) . "</pre>";
//    die('End');

}catch (PDOException $e){
    die($e->getMessage());
}
