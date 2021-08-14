<?php
namespace classes;

use PDO;

class UserDB extends PDO
{

    protected $table = 'users';

    public function __construct($dsn, $username = null, $password = null, $options = null)
    {
        parent::__construct($dsn, $username, $password, $options);
    }

    public function create(User $user)
    {
        $query = <<<HEREDOC
INSERT INTO `{$this->table}` 
    (`name`, `surname`, `age`, `email`, `phone`) 
    VALUES 
    ('{$user->getName()}', '{$user->getSurname()}', '{$user->getAge()}', '{$user->getEmail()}', '{$user->getPhone()}')
HEREDOC;

        $query_insert = $this->prepare($query);
        $query_insert->execute();
    }

    public function tableVerification()
    {
        $query = "SELECT 1 FROM `{$this->table}` LIMIT 1";
        $query_check = $this->prepare($query);
        $query_check->execute();

        //if table doesn't exist $query_check->execute() returns null
        $table_exist = $query_check->fetchAll();
        if ($table_exist == null) {
            return false;
        } else {
            return true;
        }

    }

    public function createTable()
    {
        $query = <<<HEREDOC
CREATE TABLE IF NOT EXISTS `{$this->table}` ( 
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(15) NOT NULL , 
    `surname` VARCHAR(15) NOT NULL , 
    `age` INT(4) NOT NULL , 
    `email` VARCHAR(40) NOT NULL , 
    `phone` INT(15) NULL , 
    PRIMARY KEY (`id`));
HEREDOC;
        $query_create = $this->prepare($query);
        $query_create->execute();
    }

    public function select(User $user): array
    {

        $query = $this->prepare("SELECT * FROM {$this->table} WHERE `id` = " . $user->getId());
        $query->execute();
        $users = $query->fetchAll();

        return $users;
    }

    public function selectAllId()
    {
        $query = $this->prepare("SELECT id FROM {$this->table}");
        $query->execute();
        $usersId = $query->fetchAll();

        return $usersId;

    }

    public function delete(array $id)
    {

        $userID = $id['id-delete'];
        foreach ($userID as $key){

            $query = "DELETE FROM `{$this->table}` WHERE `id` = " . $key;
            $query_delete = $this->prepare($query);
            $query_delete->execute();
        }
//        $condition = preg_replace('/(AND\W)$/', '', $condition);
//        $query = 'DELETE FROM `test` ' . $condition;
//        $query_delete = $this->prepare($query);
//        $query_delete->execute();
    }

}
