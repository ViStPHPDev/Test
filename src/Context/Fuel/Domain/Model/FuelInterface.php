<?php

namespace App\Fuel\Domain\Model;

/**
 * Interface FuelInterface
 * @package App\Fuel\Domain\Model
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