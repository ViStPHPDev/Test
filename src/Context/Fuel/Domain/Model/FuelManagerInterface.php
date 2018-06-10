<?php

namespace App\Fuel\Domain\Model;

/**
 * Interface FuelManagerInterface
 * @package App\Fuel\Domain\Model
 */
interface FuelManagerInterface
{
    /**
     * @param FuelInterface $fuel
     * @return mixed
     */
    public static function for(FuelInterface $fuel);

    /**
     * @param FuelInterface $fuel
     * @return FuelManagerInterface
     */
    public function setFuel(FuelInterface $fuel): FuelManagerInterface;

    /**
     * @return FuelInterface
     */
    public function getFuel(): FuelInterface;
}