<?php
namespace typeoftaxi;

use interfaces\ITaxi;

class Economy implements ITaxi
{

    protected $car = 'Daewoo Lanos';
    protected $price = 500;

    public function getModel(): string
    {
        return "You will get to the goal by economy model: $this->car </br>";
    }

    public function getPrice(): string
    {
        return "Price of the ride is the lowest: $this->price </br>";
    }
}