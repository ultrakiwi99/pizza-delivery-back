<?php


namespace App\Entity;

use App\Values\Id;
use DateTime;
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
     * @var float
     */
    private $qty;
    /**
     * @var DateTime
     */
    private $date;

    public function __construct(int $id = null)
    {
        $this->id = $id ?? Id::next()->value();
    }

    public static function fromDetails(Product $product, float $qty): OrderProduct
    {
        $orderProduct = new self();
        $orderProduct->setProduct($product);
        $orderProduct->setQty($qty);

        return $orderProduct;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return Order
     */
    public function order(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    /**
     * @return Product
     */
    public function product(): Product
    {
        return $this->product;
    }

    /**
     * @param $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return float
     */
    public function qty()
    {
        return $this->qty;
    }

    /**
     * @param float $qty
     */
    public function setQty(float $qty): void
    {
        $this->qty = $qty;
    }
}