<?php

namespace App\Tests\Entity\Values;

use App\Entity\Values\Currency;
use App\Values\Currency\Euro;
use App\Values\Currency\Usd;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testValue()
    {
        $priceEuro = new Euro(100);
        self::assertEquals(100, $priceEuro->value());

        $priceUsd = new Usd(100);
        self::assertEquals(80, $priceUsd->value());
    }
}
