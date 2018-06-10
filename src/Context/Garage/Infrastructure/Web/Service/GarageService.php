<?php

namespace App\Garage\Infrastructure\Web\Service;

use App\Garage\Application\GarageManagerFactory;
use App\Garage\Domain\Adapter\Cargo\CargoAdapter;
use App\Garage\Domain\Adapter\Cargo\CargoInterface;
use App\Garage\Domain\Adapter\Fuel\FuelAdapter;
use App\Garage\Domain\Adapter\Fuel\FuelInterface;
use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Vehicle\Air\Helicopter\HelicopterManagerInterface;
use App\Garage\Domain\Model\Vehicle\Land\Car\CarManagerInterface;
use App\Garage\Domain\Model\Vehicle\Land\Truck\TruckManagerInterface;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use App\Garage\Domain\Model\Vehicle\Water\Boat\BoatManagerInterface;

/**
 * Class GarageService
 * @package App\Garage\Infrastructure\Web\Service
 */
class GarageService
{
    /**
     * @param FuelInterface $fuel
     * @param CargoInterface $cargo
     * @return array
     */
    public function garageTest(FuelInterface $fuel, CargoInterface $cargo)
    {
        $garage = GarageManagerFactory::create([
            VehicleFactory::create(VehicleFactory::LAND_CAR, 'BMW'),
            VehicleFactory::create(VehicleFactory::WATER_BOAT, 'Boat'),
            VehicleFactory::create(VehicleFactory::AIR_HELICOPTER, 'Helicopter'),
            VehicleFactory::create(VehicleFactory::LAND_TRUCK, 'Kamaz'),
        ]);
        $result = [];
        $garage->getVehicles()->forAll(
            function (int $index, VehicleInterface $vehicle) use ($garage, $fuel, $cargo, &$result) {
                $manager = $vehicle->getManager();
                $row = &$result[$vehicle->getName()];
                if ($garage->isCar($vehicle)) {
                    /** @var CarManagerInterface $manager */
                    $row[] = $manager->move();
                    $row[] = $manager->musicOn();
                }
                if ($garage->isBoat($vehicle)) {
                    /** @var BoatManagerInterface $manager */
                    $row[] = $manager->move();
                    $row[] = $manager->swim();
                }
                if ($garage->isHelicopter($vehicle)) {
                    /** @var HelicopterManagerInterface $manager */
                    $row[] = $manager->takeOff();
                    $row[] = $manager->fly();
                    $row[] = $manager->landing();
                }
                if ($garage->isTruck($vehicle)) {
                    /** @var TruckManagerInterface $manager */
                    $row[] = $manager->move();
                    $row[] = $manager->stop();
                    $row[] = $manager->emptyLoads($cargo);
                }
                $row[] = $manager->stop();
                $row[] = $manager->refuel($fuel);
                return true;
            }
        );
        return $result;
    }

    public function mergeFuel($fuel)
    {
        return FuelAdapter::from($fuel);
    }

    public function mergeCargo($cargo)
    {
        return CargoAdapter::from($cargo);
    }
}