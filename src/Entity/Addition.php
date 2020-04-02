<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Addition to product
 *
 * @package App\Entity
 * @ORM\Table(name="additions")
 */
class Addition
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
}