<?php
namespace classes;

use interfaces\ITaxi;
use typeoftaxi\Economy;

class EconomyTaxi extends Taxi
{
    public function getCar(): ITaxi
    {
        return new Economy();
    }
}