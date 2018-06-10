<?php

namespace App\Garage\Domain\Model\Vehicle\Land\Truck;

use App\Garage\Domain\Adapter\Cargo\CargoInterface;
use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Vehicle\Land\AbstractLandVehicleManager;

/**
 * Class AbstractTruckManager
 * @package App\Garage\Domain\Model\Vehicle\Land\Truck
 */
abstract class AbstractTruckManager extends AbstractLandVehicleManager implements TruckManagerInterface
{
    /**
     * @param CargoInterface $cargo
     * @return string
     * @throws VehicleNotSetException
     */
    public function emptyLoads(CargoInterface $cargo): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof TruckInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} unloaded {$cargo->getName()}";
    }
}