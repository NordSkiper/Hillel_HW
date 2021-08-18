<?php
namespace classes;

use interfaces\ITaxi;
use typeoftaxi\Luxury;

class LuxuryTaxi extends Taxi
{
    public function getCar(): ITaxi
    {
        return new Luxury();
    }
}