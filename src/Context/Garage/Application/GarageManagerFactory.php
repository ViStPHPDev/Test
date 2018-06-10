<?php

namespace App\Garage\Application;

/**
 * Class GarageManagerFactory
 * @package App\Garage\Application
 */
class GarageManagerFactory
{
    /**
     * @param iterable $elements
     * @return GarageManager
     */
    public static function create(iterable $elements = [])
    {
        return new GarageManager($elements);
    }
}