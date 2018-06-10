<?php

namespace App\Garage\Domain\Model\Vehicle;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;

/**
 * Interface VehicleManagerInterface
 * @package App\Garage\Domain\Model\Vehicle
 */
interface VehicleManagerInterface
{
    /**
     * @param VehicleInterface $vehicle
     * @return VehicleManagerInterface
     */
    public function setVehicle(VehicleInterface $vehicle): VehicleManagerInterface;

    /**
     * @return VehicleInterface
     */
    public function getVehicle(): VehicleInterface;

    /**
     * @return string
     */
    public function move(): string;

    /**
     * @return string
     */
    public function stop(): string;

    /**
     * @param FuelInterface $fuel
     * @return string
     */
    public function refuel(FuelInterface $fuel): string;
}