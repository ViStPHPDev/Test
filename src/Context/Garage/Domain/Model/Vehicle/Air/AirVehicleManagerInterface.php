<?php

namespace App\Garage\Domain\Model\Vehicle\Air;

use App\Garage\Domain\Model\Vehicle\VehicleManagerInterface;

/**
 * Interface AirVehicleManagerInterface
 * @package App\Garage\Domain\Model\Vehicle\Air
 */
interface AirVehicleManagerInterface extends VehicleManagerInterface
{
    /**
     * @return string
     */
    public  function takeOff(): string;

    /**
     * @return string
     */
    public function landing(): string;

    /**
     * @return string
     */
    public function fly(): string;
}