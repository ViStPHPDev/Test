<?php

namespace App\Garage\Domain\Factory;

use App\Garage\Domain\Exception\VehicleTypeIncorrectException;
use App\Garage\Domain\Model\Vehicle\Air\Helicopter\Helicopter;
use App\Garage\Domain\Model\Vehicle\Air\Plane\Plane;
use App\Garage\Domain\Model\Vehicle\Land\Car\Car;
use App\Garage\Domain\Model\Vehicle\Land\Motorcycle\Motorcycle;
use App\Garage\Domain\Model\Vehicle\Land\Truck\Truck;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use App\Garage\Domain\Model\Vehicle\Water\Boat\Boat;

/**
 * Class VehicleFactory
 * @package App\Garage\Domain\Factory
 */
class VehicleFactory
{
    const
        LAND_CAR = Car::class,
        LAND_TRUCK = Truck::class,
        LAND_MOTORCYCLE = Motorcycle::class,

        WATER_BOAT = Boat::class,

        AIR_HELICOPTER = Helicopter::class,
        AIR_PLANE = Plane::class;

    /**
     * @param string $type
     * @param string $name
     * @return VehicleInterface
     * @throws VehicleTypeIncorrectException
     */
    public static function create(string $type, string $name): VehicleInterface
    {
        $constants = array_flip((new \ReflectionClass(self::class))->getConstants());
        if (!isset($constants[$type])) {
            throw new VehicleTypeIncorrectException();
        }
        return new $type($name);
    }
}