<?php


namespace App\Values\Currency;


abstract class Currency
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $convRatio;
    /**
     * @var float
     */
    private $price;

    public function __construct(float $price, float $convRatio)
    {
        $this->convRatio = $convRatio;
        $this->price = $price;
    }

    public function value(): float
    {
        return round($this->price * $this->convRatio, 2);
    }
}