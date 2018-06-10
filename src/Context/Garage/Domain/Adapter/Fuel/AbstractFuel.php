<?php

namespace App\Garage\Domain\Adapter\Fuel;

/**
 * Class AbstractFuel
 * @package App\Garage\Domain\Adapter\Fuel
 */
abstract class AbstractFuel implements FuelInterface
{
    /** @var  string */
    protected $name;

    /**
     * AbstractFuel constructor.
     */
    function __construct()
    {
    }

    /**
     * @param string $name
     * @return FuelInterface
     */
    public function setName(string $name): FuelInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}