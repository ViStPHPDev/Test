<?php

namespace App\Fuel\Domain\Factory;

use App\Fuel\Domain\Repository\FuelRepository;

/**
 * Class FuelRepositoryFactory
 * @package App\Fuel\Domain\Factory
 */
class FuelRepositoryFactory
{
    /**
     * @param iterable $elements
     * @return FuelRepository
     */
    public static function create(iterable $elements = [])
    {
        return new FuelRepository($elements);
    }
}