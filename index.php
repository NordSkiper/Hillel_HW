<?php

require_once 'autoload.php';

use Payment\PaymentSystem;

function clientCode(PaymentSystem $paymentSystem )
{
    $paymentSystem->pay();
}

clientCode(new \Payment\MasterCard('41424124', '111', 'Abdyla'));
