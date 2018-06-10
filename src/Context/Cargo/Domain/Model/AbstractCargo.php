<?php

namespace App\Cargo\Domain\Model;
use App\Cargo\Domain\Exception\ClassManagerFaultException;
use App\Cargo\Domain\Exception\ClassManagerMethodNotFoundException;
use App\Cargo\Domain\Exception\ClassManagerNotFoundException;

/**
 * Class AbstractCargo
 * @package App\Cargo\Domain\Model
 */
abstract class AbstractCargo implements CargoInterface
{
    /** @var  string */
    protected $name;

    /**
     * AbstractCargo constructor.
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
     * @return CargoManagerInterface
     * @throws ClassManagerFaultException
     * @throws ClassManagerNotFoundException
     */
    public function getManager(): CargoManagerInterface
    {
        $manager = static::class . 'Manager';
        if (!class_exists($manager)) {
            throw new ClassManagerNotFoundException();
        }
        try {
            /** @var AbstractCargoManager $manager */
            return call_user_func([$manager, 'for'], $this);
        } catch (\Exception $e) {
            throw new ClassManagerFaultException();
        }
    }

    /**
     * @param string $name
     * @return CargoInterface
     */
    public function setName(string $name): CargoInterface
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