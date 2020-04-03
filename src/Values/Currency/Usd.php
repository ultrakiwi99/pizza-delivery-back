<?php


namespace App\Values\Currency;


class Usd extends Currency
{
    public function __construct(float $price)
    {
        parent::__construct($price, 0.8);
    }
}