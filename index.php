<?php

error_reporting(-1);

require_once 'autoload.php';

$contact = new classes\Contact();

$newContact = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    ->build();

var_dump($newContact);
echo '<hr>';

$oldContact =$contact->phone('000')
    ->name("John")
    ->surname("Sur")
    ->build();

var_dump($oldContact);
