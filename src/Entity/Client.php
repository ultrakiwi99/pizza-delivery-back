<?php


namespace App\Entity;

use App\Values\Id;
use Assert\Assertion;
use Assert\AssertionFailedException;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Entity()
 * @ORM\Table(name="clients")
 */
class Client
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $phone;
    /**
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $email;
    /**
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $address;

    /**
     * @param int|null $id
     */
    public function __construct(int $id = null)
    {
        $this->id = $id ?? Id::next()->value();
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
     * @return string
     */
    public function phone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @throws AssertionFailedException
     */
    public function setPhone(string $phone): void
    {
        Assertion::digit($phone);
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function email(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @throws AssertionFailedException
     */
    public function setEmail(string $email): void
    {
        Assertion::email($email);
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function address(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function __toString()
    {
        return $this->name();
    }
}