<?php

namespace App\Garage\Domain\Model\Vehicle\Land\Car;

use App\Garage\Domain\Model\Vehicle\Land\LandVehicleManagerInterface;

/**
 * Interface CarManagerInterface
 * @package App\Garage\Domain\Model\Vehicle\Land\Car
 */
interface CarManagerInterface extends LandVehicleManagerInterface
{
    /**
     * @return string
     */
    public function musicOn(): string;
}