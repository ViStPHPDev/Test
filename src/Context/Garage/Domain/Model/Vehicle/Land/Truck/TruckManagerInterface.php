<?php

namespace App\Garage\Domain\Model\Vehicle\Land\Truck;

use App\Garage\Domain\Adapter\Cargo\CargoInterface;
use App\Garage\Domain\Model\Vehicle\Land\LandVehicleManagerInterface;

/**
 * Interface TruckManagerInterface
 * @package App\Garage\Domain\Model\Vehicle\Land\Truck
 */
interface TruckManagerInterface extends LandVehicleManagerInterface
{
    /**
     * @param CargoInterface $cargo
     * @return string
     */
    public function emptyLoads(CargoInterface $cargo): string;
}