<?php

namespace App\Tests\Entity;

use App\Entity\Client;
use App\Values\Id;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @throws AssertionFailedException
     */
    public function testClient()
    {
        $client = new Client($id = Id::next()->value());
        $client->setName($clientName = 'Test client');

        self::assertEquals($id, $client->id());
        self::assertEquals($clientName, $client->name());

        $client->setAddress($address = 'Test address');
        $client->setEmail($email = 'test@email.com');
        $client->setPhone($phone = '89992345678');

        self::assertEquals($address, $client->address());
        self::assertEquals($email, $client->email());
        self::assertEquals($phone, $client->phone());
    }
}
