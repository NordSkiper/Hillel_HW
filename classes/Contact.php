<?php
namespace classes;

class Contact implements IBuilder
{
    protected $contact;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->contact = new ContactInfo();
    }

    public function name($name)
    {
        $this->contact->name = $name;
        return $this;
    }

    public function surname($surname)
    {
        $this->contact->surname = $surname;
        return $this;
    }

    public function email($email)
    {
        $this->contact->email = $email;
        return $this;
    }

    public function address($address)
    {
        $this->contact->address = $address;
        return $this;
    }

    public function phone($phone)
    {
        $this->contact->phone = $phone;
        return $this;
    }

    public function build()
    {
        $result = $this->contact;
        $this->reset();

        return $result;
    }
}