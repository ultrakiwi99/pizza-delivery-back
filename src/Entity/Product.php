<?php


namespace App\Entity;

use App\Values\Id;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Entity()
 * @ORM\Table(name="products")
 * @package App\Entity
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(type="float")
     * @var float
     */
    private $price;
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     */
    private $category;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $imageFileName;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $description;

    public function __construct(int $id = null)
    {
        $this->id = $id ?? Id::next()->value();
    }

    public static function fromDetails(string $name, float $price): Product
    {
        $product = new self();
        $product->setName($name);
        $product->setPrice($price);
        return $product;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function price(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = round($price, 2);
    }

    /**
     * @return Category|null
     */
    public function category(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $category->addProduct($this);
        $this->category = $category;
    }

    public function removeCategory(Category $category): void
    {
        $category->removeProduct($this);
        $this->category = null;
    }

    public function __toString()
    {
        return $this->name();
    }

    /**
     * @return string
     */
    public function imageFileName(): ?string
    {
        return $this->imageFileName;
    }

    /**
     * @param string $imageFileName
     */
    public function setImageFileName(string $imageFileName): void
    {
        $this->imageFileName = $imageFileName;
    }

    /**
     * @return string
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}