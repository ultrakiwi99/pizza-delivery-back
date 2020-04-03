<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Some ordered product
 *
 * @ORM\Entity()
 * @ORM\Table(name="order_products")
 * @package App\Entity
 */
class OrderProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="order", inversedBy="orderProducts")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * @var Order
     */
    private $order;
    /**
     * @ORM\OneToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * @var Product
     */
    private $product;
    /**
     * @ORM\Column(type="float")
     */
    private $qty;
}