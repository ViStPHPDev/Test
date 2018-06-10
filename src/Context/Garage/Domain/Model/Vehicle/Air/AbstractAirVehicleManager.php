<?php

namespace App\Garage\Domain\Model\Vehicle\Air;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Vehicle\AbstractVehicleManager;

/**
 * Class AbstractAirVehicleManager
 * @package App\Garage\Domain\Model\Vehicle\Air
 */
abstract class AbstractAirVehicleManager extends AbstractVehicleManager implements AirVehicleManagerInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function takeOff(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof AirVehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} took of";
    }

    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function landing(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof AirVehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} landing";
    }

    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function fly(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof AirVehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} flying";
    }
}