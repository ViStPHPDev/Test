<?php

namespace App\Cargo\Application;

/**
 * Class CargoManagerFactory
 * @package App\Cargo\Application
 */
class CargoManagerFactory
{
    /**
     * @param iterable $elements
     * @return CargoManager
     */
    public static function create(iterable $elements = [])
    {
        return new CargoManager($elements);
    }
}