<?php

namespace App\Garage\Domain\Model\Vehicle;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;
use App\Garage\Domain\Exception\VehicleNotSetException;

/**
 * Class AbstractVehicleManager
 * @package App\Garage\Domain\Model\Vehicle
 */
abstract class AbstractVehicleManager implements VehicleManagerInterface
{
    /** @var VehicleManagerInterface  */
    protected static $instance = null;

    /** @var  VehicleInterface */
    protected $vehicle;

    /**
     * AbstractVehicleManager constructor.
     * @param VehicleInterface $vehicle
     */
    private function __construct(VehicleInterface $vehicle)
    {
        $this->setVehicle($vehicle);
    }

    private function __clone()
    {
    }

    /**
     * @param VehicleInterface $vehicle
     * @return VehicleManagerInterface
     */
    public static function for(VehicleInterface $vehicle)
    {
        $class = static::class;
        if (!(static::$instance instanceof $class)) {
            static::$instance = new static($vehicle);
        } else {
            static::$instance->setVehicle($vehicle);
        }
        return static::$instance;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return VehicleManagerInterface
     */
    public function setVehicle(VehicleInterface $vehicle): VehicleManagerInterface
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    /**
     * @return VehicleInterface
     */
    public function getVehicle(): VehicleInterface
    {
        return $this->vehicle;
    }

    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function move(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} moving";
    }

    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function stop(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} stopped";
    }

    /**
     * @param FuelInterface $fuel
     * @return string
     */
    public function refuel(FuelInterface $fuel): string
    {
        return "{$this->getVehicle()->getName()} refuel {$fuel->getName()}";
    }
}