<?php

namespace App\Garage\Domain\Adapter\Fuel;

/**
 * Interface FuelInterface
 * @package App\Garage\Domain\Adapter\Fuel
 */
interface FuelInterface
{
    /**
     * @param string $name
     * @return FuelInterface
     */
    public function setName(string $name): FuelInterface;

    /**
     * @return string
     */
    public function getName(): string;
}