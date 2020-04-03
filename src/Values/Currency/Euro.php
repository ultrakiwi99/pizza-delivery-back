<?php


namespace App\Values\Currency;

class Euro extends Currency
{
    public function __construct(float $price)
    {
        parent::__construct($price, 1);
    }
}