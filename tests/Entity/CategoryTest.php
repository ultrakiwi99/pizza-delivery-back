<?php

namespace App\Tests\Entity;

use App\Entity\Category;
use App\Entity\Product;
use App\Values\Id;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{

    public function testCategory()
    {
        $category = new Category($id = Id::next()->value());
        $category->setName($categoryName = 'Test category');

        self::assertEquals($id, $category->id());
        self::assertEquals($categoryName, $category->name());

        $testProduct = new Product($productId = Id::next()->value());
        $testProduct->setName('Test Product');

        $category->addProduct($testProduct);

        $categoryProduct = $category->products()[0];

        self::assertEquals($testProduct->id(), $categoryProduct->id());
        self::assertEquals($testProduct->name(), $categoryProduct->name());
    }
}
