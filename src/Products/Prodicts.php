<?php

namespace App\Products;

use App\Entity\Product;
use PDO;
use PDOException;
use iterable;

final class Products
{
    private PDO $dbh;

    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * @return iterable|ProductDto[]
     */
    public function list(): iterable
    {
        $query = $this->dbh->prepare("
            SELECT * FROM products 
            LEFT JOIN instock ON products.product_id=instock.product_id
        ");
        $query->setFetchMode(PDO::FETCH_CLASS, ProductDto::class);
        $result = $query->execute();
        if (!$result) {
            throw new PDOException($this->dbh->errorInfo());
        }
        foreach ($query->fetch() as $productDto) {
            yield $productDto;
        }
    }

    public function save(Product $product): void
    {
    }

    public function get(Product $product): Product
    {
    }
}
