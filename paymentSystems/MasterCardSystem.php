<?php
namespace paymentSystems;

use inter\IPaymentSystem;

class MasterCardSystem implements IPaymentSystem
{
    protected $card;
    protected $cvv;
    protected $name;

    public function __construct($card, $cvv, $name)
    {

    }

    public function connect()
    {
    }

    public function getPayment()
    {
    }
}