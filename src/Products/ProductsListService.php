<?php

namespace App\Products;

class ProuctsListService
{
    private Products $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function flat(): array
    {
        $result = [];
        foreach ($this->products->list() as $product) {
            $result[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $product->qty
            ];
        }

        return $result;
    }
}
