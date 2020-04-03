<?php


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $date;
    /**
     * @ORM\Column(type="string")
     */
    private $clientName;
    /**
     * @ORM\Column(type="string")
     */
    private $contactPhone;
    /**
     * @ORM\Column(type="string")
     */
    private $contactEmail;
    /**
     * @ORM\Column(type="string")
     */
    private $deliveryAddress;
    /**
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="product")
     */
    private $orderProducts;


}