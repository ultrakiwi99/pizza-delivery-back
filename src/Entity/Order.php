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
     * @ORM\OneToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * @var Client
     */
    private $client;
    /**
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="product")
     */
    private $orderProducts;
}