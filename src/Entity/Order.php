<?php


namespace App\Entity;


use App\Values\Id;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Order
 *
 * @ORM\Entity()
 * @ORM\Table(name="orders")
 * @package App\Entity
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $date;
    /**
     * @ORM\OneToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * @var Client
     */
    private $client;
    /**
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="product")
     */
    private $orderProducts;

    /**
     * @param int $id
     * @param $
     * @param DateTime|null $date
     * @throws Exception
     */
    public function __construct(int $id = null, DateTime $date = null)
    {
        $this->id = $id ?? Id::next()->value();
        $this->date = $date ?? new DateTime('now');
        $this->orderProducts = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function date(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Client
     */
    public function client(): ?Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return array|OrderProduct[]
     */
    public function orderProducts()
    {
        return $this->orderProducts->toArray();
    }

    /**
     * @param OrderProduct $product
     */
    public function addProduct(OrderProduct $product): void
    {
        $product->setOrder($this);
        $this->orderProducts->add($product);
    }

    /**
     * @param OrderProduct $product
     */
    public function removeProduct(OrderProduct $product): void
    {
        $product->setOrder(null);
        $this->orderProducts->removeElement($product);
    }
}