<?php


namespace classes;

use PDO;

class UserDB extends PDO
{
//    static private $instance;
//
//    static public function getInstance($dsn, $user, $pass, $opt)
//    {
//        if(static::$instance == null){
//            static::$instance = new self($dsn, $user, $pass, $opt);
//        }else{
//            return static::$instance;
//        }
//    }

    public function __construct($dsn, $username = null, $password = null, $options = null)
    {
        parent::__construct($dsn, $username, $password, $options);
    }

    public function create(User $user )
    {
        $query = "INSERT INTO `test` (`name`, `surname`, `age`, `email`, `phone`) VALUES ('{$user->getName()}', '{$user->getSurname()}', '{$user->getAge()}', '{$user->getEmail()}', '{$user->getPhone()}')";
        $query_insert = $this->prepare($query);
        $query_insert->execute();
    }

    public function createTable()
    {

        echo '111111111111111111111111111111111111';


    }

    public function select()
    {
        $query = $this->prepare('SELECT * FROM test');
        $query->execute();

        $users = $query->fetchAll();

        echo "<pre>" . var_dump($users) . "</pre>";
        //die('End');
    }

}