<?php
namespace Payment;

use inter\IPaymentSystem;
use paymentSystems\MasterCardSystem;

class MasterCard extends PaymentSystem
{
    protected $card;
    protected $cvv;
    protected $name;


    public function __construct($card, $cvv, $name)
    {
        $this->card = $card;
        $this->cvv = $cvv;
        $this->name = $name;
    }

    public function getPaymentSystem(): IPaymentSystem
    {
        return new MasterCardSystem($this->card, $this->cvv, $this->name);
    }
}