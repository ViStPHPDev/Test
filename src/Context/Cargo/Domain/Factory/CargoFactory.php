<?php

namespace App\Cargo\Domain\Factory;

use App\Cargo\Domain\Exception\CargoTypeIncorrectException;
use App\Cargo\Domain\Model\Bulk\Bulk;
use App\Cargo\Domain\Model\CargoInterface;

/**
 * Class CargoFactory
 * @package App\Cargo\Domain\Factory
 */
class CargoFactory
{
    const
        BULK = Bulk::class;

    /**
     * @param string $type
     * @param string $name
     * @return CargoInterface
     * @throws CargoTypeIncorrectException
     */
    public static function create(string $type, string $name): CargoInterface
    {
        $constants = array_flip((new \ReflectionClass(self::class))->getConstants());
        if (!isset($constants[$type])) {
            throw new CargoTypeIncorrectException();
        }
        return new $type($name);
    }
}