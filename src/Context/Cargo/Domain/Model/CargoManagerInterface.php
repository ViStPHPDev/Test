<?php

namespace App\Cargo\Domain\Model;

/**
 * Interface CargoManagerInterface
 * @package App\Cargo\Domain\Model
 */
interface CargoManagerInterface
{
    /**
     * @param CargoInterface $cargo
     * @return mixed
     */
    public static function for(CargoInterface $cargo);

    /**
     * @param CargoInterface $cargo
     * @return CargoManagerInterface
     */
    public function setCargo(CargoInterface $cargo): CargoManagerInterface;

    /**
     * @return CargoInterface
     */
    public function getCargo(): CargoInterface;
}