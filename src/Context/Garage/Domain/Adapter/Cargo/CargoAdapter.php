<?php

namespace App\Garage\Domain\Adapter\Cargo;

use App\Garage\Domain\Exception\CargoTypeNotSupportedException;

/**
 * Class FuelAdapter
 * @package App\Garage\Domain\Adapter\Fuel
 */
class CargoAdapter
{
    /**
     * @var array
     */
    protected static $fuels = [
        "Bulk" => Bulk::class
    ];

    /**
     * @param string|null $name
     * @return array|string
     * @throws CargoTypeNotSupportedException
     */
    protected static function getFuels(string $name = null)
    {
        if (!is_null($name)) {
            if (!isset(self::$fuels[$name])) {
                throw new CargoTypeNotSupportedException();
            }
            return self::$fuels[$name];
        }
        return self::$fuels;
    }

    /**
     * @param $fuel
     * @return mixed
     */
    public static function from($fuel)
    {
        $ref = new \ReflectionClass($fuel);
        $class = self::getFuels($ref->getShortName());
        $result = new $class();
        foreach ($ref->getProperties() as $property) {
            $getter = 'get' . ucwords(strtolower($property->getName()));
            $setter = 'set' . ucwords(strtolower($property->getName()));
            if (method_exists($fuel, $getter) && method_exists($result, $setter)) {
                $result->{$setter}($fuel->{$getter}());
            }
        }
        return $result;
    }
}