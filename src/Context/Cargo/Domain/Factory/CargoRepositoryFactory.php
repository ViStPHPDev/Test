<?php

namespace App\Cargo\Domain\Factory;

use App\Cargo\Domain\Repository\CargoRepository;

/**
 * Class CargoRepositoryFactory
 * @package App\Cargo\Domain\Factory
 */
class CargoRepositoryFactory
{
    /**
     * @param iterable $elements
     * @return CargoRepository
     */
    public static function create(iterable $elements = [])
    {
        return new CargoRepository($elements);
    }
}