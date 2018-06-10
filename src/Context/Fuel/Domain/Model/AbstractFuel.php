<?php

namespace App\Fuel\Domain\Model;

use App\Fuel\Domain\Exception\ClassManagerFaultException;
use App\Fuel\Domain\Exception\ClassManagerMethodNotFoundException;
use App\Fuel\Domain\Exception\ClassManagerNotFoundException;

/**
 * Class AbstractFuel
 * @package App\Fuel\Domain\Model
 */
abstract class AbstractFuel implements FuelInterface
{
    /** @var  string */
    protected $name;

    /**
     * AbstractFuel constructor.
     * @param string $name
     */
    function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     * @throws ClassManagerMethodNotFoundException
     */
    public function __call($method, $arguments)
    {
        $manager = $this->getManager();
        if (!method_exists($manager, $method)) {
            throw new ClassManagerMethodNotFoundException();
        }
        return call_user_func_array([$manager, $method], $arguments);
    }

    /**
     * @return FuelManagerInterface
     * @throws ClassManagerFaultException
     * @throws ClassManagerNotFoundException
     */
    public function getManager(): FuelManagerInterface
    {
        $manager = static::class . 'Manager';
        if (!class_exists($manager)) {
            throw new ClassManagerNotFoundException();
        }
        try {
            /** @var AbstractFuelManager $manager */
            return call_user_func([$manager, 'for'], $this);
        } catch (\Exception $e) {
            throw new ClassManagerFaultException();
        }
    }

    /**
     * @param string $name
     * @return FuelInterface
     */
    public function setName(string $name): FuelInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}