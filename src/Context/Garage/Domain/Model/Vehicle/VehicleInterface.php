<?php

namespace App\Garage\Domain\Model\Vehicle;

/**
 * Interface VehicleInterface
 * @package App\Garage\Domain\Model\Vehicle
 */
interface VehicleInterface
{
    /**
     * @param string $name
     * @return VehicleInterface
     */
    public function setName(string $name): VehicleInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return VehicleManagerInterface
     */
    public function getManager(): VehicleManagerInterface;
}