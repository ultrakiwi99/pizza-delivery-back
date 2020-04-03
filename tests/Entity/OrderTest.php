<?php

namespace App\Tests\Entity;

use App\Entity\Order;
use App\Entity\OrderProduct;
use App\Entity\Product;
use App\Values\Id;
use DateTime;
use Exception;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{

    /**
     * @throws Exception
     */
    public function testOrder()
    {
        $order = new Order($id = Id::next()->value(), $date = new DateTime('now'));
        self::assertEquals($id, $order->id());
        self::assertEquals($date, $order->date());

        $orderProduct = OrderProduct::fromDetails(Product::fromDetails('Test product', 100), 2);

        $order->addProduct($orderProduct);
        $addedProduct = $order->orderProducts()[0];

        self::assertEquals($addedProduct->product()->id(), $orderProduct->product()->id());
        self::assertEquals($addedProduct->qty(), $orderProduct->qty());
    }
}
