<?php

use classes\EconomyTaxi;
use classes\LuxuryTaxi;
use classes\StandardTaxi;

require_once 'autoload.php';

function ClientCode($typeOfDeliver)
{
    echo "You have choose $typeOfDeliver ride. </br>";
    switch ($typeOfDeliver) {
        case "economy":
            $taxi = new EconomyTaxi();
            break;
        case "standard":
            $taxi = new StandardTaxi();
            break;
        case "luxury":
            $taxi = new LuxuryTaxi();
            break;
        default:
            die("Wrong delivery");
            break;
    }

    $taxi->getOrder();

}

ClientCode("economy");

