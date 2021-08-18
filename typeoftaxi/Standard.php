<?php
namespace typeoftaxi;

use interfaces\ITaxi;

class Standard implements ITaxi
{

    protected $car = 'Volkswagen Golf';
    protected $price = 1000;

    public function getModel(): string
    {
        return "You will get to the goal by standard car: $this->car </br>";
    }

    public function getPrice(): string
    {
        return "Price of the ride equals: $this->price </br>";
    }
}