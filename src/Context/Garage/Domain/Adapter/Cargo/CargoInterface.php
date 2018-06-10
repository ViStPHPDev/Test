<?php

namespace App\Garage\Domain\Adapter\Cargo;

/**
 * Interface CargoInterface
 * @package App\Garage\Domain\Adapter\Cargo
 */
interface CargoInterface
{
    /**
     * @param string $name
     * @return CargoInterface
     */
    public function setName(string $name): CargoInterface;

    /**
     * @return string
     */
    public function getName(): string;
}