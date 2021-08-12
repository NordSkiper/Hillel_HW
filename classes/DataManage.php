<?php


namespace classes;


class DataManage
{

    private static $instance;

    protected $user;
    protected $userData;
    protected $db;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (isset(self::$instance)) {
            return self::$instance;
        } else {
            return self::$instance = new self;
        }
    }

    public function setData(User $user, array $userData, UserDB $db)
    {
        $this->user = $user;
        $this->userData = $userData;
        $this->db = $db;
    }

    public function manage()
    {

        switch (array_key_first($this->userData)) {
            case 'name':
                $this->user->jsonRequest($this->userData);
                try {
                    $this->db->create($this->user);
                } catch (PDOException $e) {
                    $e->getMessage();
                }
                echo 'Data has been insert';
                break;
            case 'tableCreation':
                $this->db->createTable();
                echo 'Table created';
                break;
            case 'id':

                $this->user->jsonRequest($this->userData);
                $userInformation = $this->db->select($this->user);
                $json_request = json_encode($userInformation);
                echo $json_request;
                //create json_encode and
                break;

            case 'all-id':

                $userInformation = $this->db->selectAllId();
                $userInformation['allId'] = '1';

                $json_request = json_encode($userInformation);
                echo $json_request;

                break;
            case 'table':
                if ($this->db->tableVerification()) {
                    echo 'Table exist';
                } else {
                    echo 'Table not exist';
                }
        }

    }

}