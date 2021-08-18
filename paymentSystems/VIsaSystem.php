<?php
namespace paymentSystems;

use inter\IPaymentSystem;

class VisaSystem implements IPaymentSystem
{

    protected $card;
    protected $cvv;

    public function __construct($card, $cvv)
    {

    }

    public function connect()
    {
    }

    public function getPayment()
    {
    }
}