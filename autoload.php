<?php

function autoloader($class)
{
    $class = __DIR__ . '/' . $class . '.php';
    if (file_exists($class)) {
        require_once $class;
    } else {
        die('Unexpected class');
    }
}

spl_autoload_register('autoloader');