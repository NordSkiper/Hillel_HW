<?php
namespace classes;

use interfaces\ITaxi;

abstract class Taxi
{

    public function getOrder()
    {
        $taxi = $this->getCar();
        $result = "Info about delivery:</br>" . $taxi->getModel() . $taxi->getPrice();
        echo $result;

    }

    abstract public function getCar(): ITaxi;

}