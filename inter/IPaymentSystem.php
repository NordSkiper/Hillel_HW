<?php
namespace inter;

interface IPaymentSystem
{
    public function connect();

    public function getPayment();

}