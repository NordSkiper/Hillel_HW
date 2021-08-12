<?php

namespace classes;

class User
{

    protected $id;
    protected $name;
    protected $surname;
    protected $age;
    protected $email;
    protected $phone;

    public function jsonRequest(array $json_request)
    {
        switch ($json_request['id']) {
            case null:
                $this->name = $json_request["name"];
                $this->surname = $json_request["surname"];
                $this->age = $json_request["age"];
                $this->email = $json_request["email"];
                $this->phone = $json_request["phone"];
                break;
            default:
                $this->id = $json_request['id'];
                break;
        }
    }

    public function getData()
    {
        echo <<<HEREDOC
<br>Name: {$this->name} 
<br>Surname: {$this->surname}
<br>Age: {$this->age}
<br>Email: {$this->email}
<br>Phone: {$this->phone}
HEREDOC;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getId()
    {
        return $this->id;
    }

}