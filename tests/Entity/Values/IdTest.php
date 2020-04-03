<?php

namespace App\Tests\Entity\Values;

use App\Entity\Values\Id;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;

class IdTest extends TestCase
{
    /**
     * @throws AssertionFailedException
     */
    public function testValue()
    {
        $id = new Id($idValue = 12345);
        self::assertEquals($idValue, $id->value());

        $random = Id::next();
        self::assertIsInt($random->value());
    }
}
