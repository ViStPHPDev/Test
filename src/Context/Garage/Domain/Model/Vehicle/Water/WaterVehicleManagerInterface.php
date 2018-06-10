<?php

namespace App\Garage\Domain\Model\Vehicle\Water;

use App\Garage\Domain\Model\Vehicle\VehicleManagerInterface;

/**
 * Interface WaterVehicleManagerInterface
 * @package App\Garage\Domain\Model\Vehicle\Water
 */
interface WaterVehicleManagerInterface extends VehicleManagerInterface
{
    /**
     * @return string
     */
    public function swim(): string;
}