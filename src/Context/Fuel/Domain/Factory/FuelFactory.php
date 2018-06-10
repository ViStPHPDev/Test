<?php

namespace App\Fuel\Domain\Factory;

use App\Fuel\Domain\Exception\FuelTypeIncorrectException;
use App\Fuel\Domain\Model\FuelInterface;
use App\Fuel\Domain\Model\Gas\Gas;

/**
 * Class FuelFactory
 * @package App\Fuel\Domain\Factory
 */
class FuelFactory
{
    const
        GAS = Gas::class;

    /**
     * @param string $type
     * @param string $name
     * @return FuelInterface
     * @throws FuelTypeIncorrectException
     */
    public static function create(string $type, string $name): FuelInterface
    {
        $constants = array_flip((new \ReflectionClass(self::class))->getConstants());
        if (!isset($constants[$type])) {
            throw new FuelTypeIncorrectException();
        }
        return new $type($name);
    }
}