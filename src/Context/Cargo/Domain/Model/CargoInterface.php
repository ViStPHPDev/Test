<?php

namespace App\Cargo\Domain\Model;

/**
 * Interface CargoInterface
 * @package App\Cargo\Domain\Model
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