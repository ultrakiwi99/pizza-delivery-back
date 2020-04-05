<?php

namespace App\Tests\Entity;

use App\Entity\Category;
use App\Entity\Product;
use App\Values\Id;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    public function testProduct()
    {
        $product = new Product($productId = Id::next()->value());
        $product->setName($productName = 'Test Product');
        $product->setDescription($description = 'Test Description');
        $product->setImageFileName($file = 'image.jpg');

        self::assertEquals($productId, $product->id());
        self::assertEquals($productName, $product->name());
        self::assertEquals($description, $product->description());
        self::assertEquals($file, $product->imageFileName());

        $product->setPrice(2.33);
        self::assertEquals(2.33, $product->price());
        $product->setPrice(3.3345);
        self::assertEquals(3.33, $product->price());
        $product->setPrice(3.366);
        self::assertEquals(3.37, $product->price());

        $product->setCategory($category = new Category($categoryId = Id::next()->value()));
        self::assertEquals($category->id(), $product->category()->id());
        $product->removeCategory($category);
        self::assertNull($product->category());
    }
}
