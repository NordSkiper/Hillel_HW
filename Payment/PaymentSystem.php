<?php
namespace Payment;

use inter\IPaymentSystem;

abstract class PaymentSystem
{

    abstract public function getPaymentSystem(): IPaymentSystem;

    public function pay()
    {
        $system = $this->getPaymentSystem();
        $system->connect();
        $system->getPayment();
        echo 'Product has been ordered and paid';
    }

}