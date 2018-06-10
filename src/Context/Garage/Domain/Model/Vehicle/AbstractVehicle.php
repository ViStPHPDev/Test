<?php

namespace App\Garage\Domain\Model\Vehicle;

use App\Garage\Domain\Exception\ClassManagerFaultException;
use App\Garage\Domain\Exception\ClassManagerMethodNotFoundException;
use App\Garage\Domain\Exception\ClassManagerNotFoundException;
use PHPUnit\Runner\Exception;

/**
 * Class AbstractVehicle
 * @package App\Garage\Domain\Model\Vehicle
 */
abstract class AbstractVehicle implements VehicleInterface
{
    /** @var  string */
    protected $name;

    /**
     * AbstractVehicle constructor.
     * @param string $name
     * @throws ClassManagerNotFoundException
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     * @throws ClassManagerFaultException
     * @throws ClassManagerMethodNotFoundException
     * @throws ClassManagerNotFoundException
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
     * @return VehicleManagerInterface
     * @throws ClassManagerFaultException
     * @throws ClassManagerNotFoundException
     */
    public function getManager(): VehicleManagerInterface
    {
        $manager = static::class . 'Manager';
        if (!class_exists($manager)) {
            throw new ClassManagerNotFoundException();
        }
        try {
            /** @var AbstractVehicleManager $manager */
            return call_user_func([$manager, 'for'], $this);
        } catch (Exception $e) {
            throw new ClassManagerFaultException();
        }
    }

    /**
     * @param string $name
     * @return VehicleInterface
     */
    public function setName(string $name): VehicleInterface
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