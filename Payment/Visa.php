<?php
namespace Payment;

use inter\IPaymentSystem;
use paymentSystems\VisaSystem;

class Visa extends PaymentSystem
{
    protected $card;
    protected $cvv;


    public function __construct($card, $cvv)
    {
        $this->card = $card;
        $this->cvv = $cvv;
    }

    public function getPaymentSystem(): IPaymentSystem
    {
//        return new VIsaSystem();
        return new VisaSystem($this->card, $this->cvv);
    }

}