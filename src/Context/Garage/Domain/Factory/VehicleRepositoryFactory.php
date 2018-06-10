<?php

namespace App\Garage\Domain\Factory;

use App\Garage\Domain\Repository\VehicleRepository;
use App\Garage\Domain\Repository\VehicleRepositoryInterface;

/**
 * Class VehicleRepositoryFactory
 * @package App\Garage\Domain\Factory
 */
class VehicleRepositoryFactory
{
    /**
     * @param iterable $elements
     * @return VehicleRepositoryInterface
     */
    public static function create(iterable $elements = [])
    {
        return new VehicleRepository($elements);
    }
}