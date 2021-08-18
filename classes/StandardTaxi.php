<?php
namespace classes;

use interfaces\ITaxi;
use typeoftaxi\Standard;

class StandardTaxi extends Taxi
{
    public function getCar(): ITaxi
    {
        return new Standard();
    }
}