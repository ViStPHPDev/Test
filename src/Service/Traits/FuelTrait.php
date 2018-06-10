<?php

namespace App\Service\Traits;

use App\Fuel\Infrastructure\Web\Service\FuelService as Fuel;

/**
 * Trait FuelTrait
 * @package App\Service\Traits
 */
trait FuelTrait
{
    /** @var  Fuel */
    protected $fuel;

    /**
     * @return Fuel
     */
    public function getFuel(): Fuel
    {
        return $this->fuel;
    }

    /**
     * @param Fuel $fuel
     */
    public function setFuel(Fuel $fuel)
    {
        $this->fuel = $fuel;
    }
}