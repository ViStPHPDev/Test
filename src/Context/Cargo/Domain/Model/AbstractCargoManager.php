<?php

namespace App\Cargo\Domain\Model;

/**
 * Class AbstractCargoManager
 * @package App\Cargo\Domain\Model
 */
abstract class AbstractCargoManager implements CargoManagerInterface
{
    /** @var CargoManagerInterface  */
    private static $instance = null;

    /** @var  CargoInterface */
    protected $cargo;

    /**
     * AbstractCargoManager constructor.
     * @param CargoInterface $cargo
     */
    private function __construct(CargoInterface $cargo)
    {
        $this->setCargo($cargo);
    }

    private function __clone()
    {
    }

    /**
     * @param CargoInterface $cargo
     * @return AbstractCargoManager
     */
    public static function for(CargoInterface $cargo)
    {
        if (null === self::$instance) {
            self::$instance = new static($cargo);
        } else {
            self::$instance->setCargo($cargo);
        }
        return self::$instance;
    }

    /**
     * @param CargoInterface $cargo
     * @return CargoManagerInterface
     */
    public function setCargo(CargoInterface $cargo): CargoManagerInterface
    {
        $this->cargo = $cargo;
        return $this;
    }

    /**
     * @return CargoInterface
     */
    public function getCargo(): CargoInterface
    {
        return $this->cargo;
    }
}