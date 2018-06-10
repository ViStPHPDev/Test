<?php

namespace App\Garage\Domain\Model\Vehicle\Water;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Vehicle\AbstractVehicleManager;

/**
 * Class AbstractWaterVehicleManager
 * @package App\Garage\Domain\Model\Vehicle\Water
 */
abstract class AbstractWaterVehicleManager extends AbstractVehicleManager implements WaterVehicleManagerInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function swim(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof WaterVehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} swimming";
    }
}