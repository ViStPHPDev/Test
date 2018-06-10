<?php

namespace App\Garage\Domain\Model\Vehicle\Land\Car;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Vehicle\Land\AbstractLandVehicleManager;

/**
 * Class AbstractCarManager
 * @package App\Garage\Domain\Model\Vehicle\Land\Car
 */
abstract class AbstractCarManager extends AbstractLandVehicleManager implements CarManagerInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function musicOn(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof CarInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} music switched on";
    }
}