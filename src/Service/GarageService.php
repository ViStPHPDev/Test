<?php

namespace App\Service;

use App\Cargo\Infrastructure\Web\Service\CargoService as Cargo;
use App\Fuel\Infrastructure\Web\Service\FuelService as Fuel;
use App\Garage\Infrastructure\Web\Service\GarageService as Garage;
use App\Service\Traits\CargoTrait;
use App\Service\Traits\FuelTrait;
use App\Service\Traits\GarageTrait;

/**
 * Class GarageService
 * @package App\Service
 */
class GarageService
{
    use
        GarageTrait,
        FuelTrait,
        CargoTrait;

    /**
     * GarageService constructor.
     * @param Garage $garage
     * @param Fuel $fuel
     * @param Cargo $cargo
     */
    public function __construct(Garage $garage, Fuel $fuel, Cargo $cargo)
    {
        $this->setGarage($garage);
        $this->setFuel($fuel);
        $this->setCargo($cargo);
    }

    public function garageTest()
    {
        $gas = $this->getGarage()->mergeFuel($this->getFuel()->getGas());
        $cargo = $this->getGarage()->mergeCargo($this->getCargo()->getBulk());
        return $this->getGarage()->garageTest($gas, $cargo);
    }
}