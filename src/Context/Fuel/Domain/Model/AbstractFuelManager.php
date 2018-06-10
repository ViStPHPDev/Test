<?php

namespace App\Fuel\Domain\Model;

/**
 * Class AbstractFuelManager
 * @package App\Fuel\Domain\Model
 */
abstract class AbstractFuelManager implements FuelManagerInterface
{
    /** @var FuelManagerInterface  */
    private static $instance = null;

    /** @var  FuelInterface */
    protected $fuel;

    /**
     * AbstractFuelManager constructor.
     * @param FuelInterface $fuel
     */
    private function __construct(FuelInterface $fuel)
    {
        $this->setFuel($fuel);
    }

    private function __clone()
    {
    }

    /**
     * @param FuelInterface $fuel
     * @return AbstractFuelManager
     */
    public static function for(FuelInterface $fuel)
    {
        if (null === self::$instance) {
            self::$instance = new static($fuel);
        } else {
            self::$instance->setFuel($fuel);
        }
        return self::$instance;
    }

    /**
     * @param FuelInterface $fuel
     * @return FuelManagerInterface
     */
    public function setFuel(FuelInterface $fuel): FuelManagerInterface
    {
        $this->fuel = $fuel;
        return $this;
    }

    /**
     * @return FuelInterface
     */
    public function getFuel(): FuelInterface
    {
        return $this->fuel;
    }
}