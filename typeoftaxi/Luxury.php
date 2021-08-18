<?php
namespace typeoftaxi;

use interfaces\ITaxi;

class Luxury implements ITaxi
{

    protected $car = 'Mercedes-Benz S-class';
    protected $price = 1500;

    public function getModel():string
    {
        return "You will get to the goal by luxury car: $this->car </br>";
    }

    public function getPrice():string
    {
        return "Price of the ride for the best our costumer: $this->price </br>";
    }
}