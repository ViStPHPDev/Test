<?php

namespace App\Garage\Application;
use App\Garage\Domain\Factory\VehicleRepositoryFactory;
use App\Garage\Domain\Model\Vehicle\Air\AirVehicleInterface;
use App\Garage\Domain\Model\Vehicle\Air\Helicopter\HelicopterInterface;
use App\Garage\Domain\Model\Vehicle\Air\Plane\PlaneInterface;
use App\Garage\Domain\Model\Vehicle\Land\Car\CarInterface;
use App\Garage\Domain\Model\Vehicle\Land\LandVehicleInterface;
use App\Garage\Domain\Model\Vehicle\Land\Motorcycle\MotorcycleInterface;
use App\Garage\Domain\Model\Vehicle\Land\Truck\TruckInterface;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use App\Garage\Domain\Model\Vehicle\Water\Boat\BoatInterface;
use App\Garage\Domain\Model\Vehicle\Water\WaterVehicleInterface;
use App\Garage\Domain\Repository\VehicleRepositoryInterface;

/**
 * Class GarageManager
 * @package App\Garage\Application
 */
class GarageManager implements GarageManagerInterface
{
    /**
     * @var VehicleRepositoryInterface
     */
    protected $repository;

    /**
     * GarageManager constructor.
     * @param iterable $elements
     */
    function __construct(iterable $elements = [])
    {
        $this->setVehicles(VehicleRepositoryFactory::create($elements));
    }

    /**
     * @param VehicleRepositoryInterface $repository
     */
    public function setVehicles(VehicleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return VehicleRepositoryInterface
     */
    public function getVehicles(): VehicleRepositoryInterface
    {
        return $this->repository;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isLand(VehicleInterface $vehicle)
    {
        return $vehicle instanceof LandVehicleInterface;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isAir(VehicleInterface $vehicle)
    {
        return $vehicle instanceof AirVehicleInterface;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isWater(VehicleInterface $vehicle)
    {
        return $vehicle instanceof WaterVehicleInterface;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isCar(VehicleInterface $vehicle)
    {
        return $vehicle instanceof CarInterface;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isTruck(VehicleInterface $vehicle)
    {
        return $vehicle instanceof TruckInterface;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isMotorcycle(VehicleInterface $vehicle)
    {
        return $vehicle instanceof MotorcycleInterface;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isHelicopter(VehicleInterface $vehicle)
    {
        return $vehicle instanceof HelicopterInterface;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isPlane(VehicleInterface $vehicle)
    {
        return $vehicle instanceof PlaneInterface;
    }

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function isBoat(VehicleInterface $vehicle)
    {
        return $vehicle instanceof BoatInterface;
    }
}