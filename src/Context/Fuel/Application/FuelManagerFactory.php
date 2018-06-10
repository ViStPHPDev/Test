<?php

namespace App\Fuel\Application;

/**
 * Class FuelManagerFactory
 * @package App\Fuel\Application
 */
class FuelManagerFactory
{
    /**
     * @param iterable $elements
     * @return FuelManager
     */
    public static function create(iterable $elements = [])
    {
        return new FuelManager($elements);
    }
}