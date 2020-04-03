<?php


namespace App\Values;


use Ramsey\Uuid\Uuid;

class Id
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function next(): Id
    {
        return new self((int)Uuid::uuid4()->toString());
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}