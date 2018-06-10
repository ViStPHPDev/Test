<?php

namespace App\Garage\Domain\Adapter\Cargo;

/**
 * Class AbstractCargo
 * @package App\Garage\Domain\Adapter\Cargo
 */
abstract class AbstractCargo implements CargoInterface
{
    /** @var  string */
    protected $name;

    /**
     * AbstractCargo constructor.
     */
    function __construct()
    {
    }

    /**
     * @param string $name
     * @return CargoInterface
     */
    public function setName(string $name): CargoInterface
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