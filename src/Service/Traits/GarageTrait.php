<?php

namespace App\Service\Traits;

use App\Garage\Infrastructure\Web\Service\GarageService as Garage;

/**
 * Trait GarageTrait
 * @package App\Service\Traits
 */
trait GarageTrait
{
    /** @var  Garage */
    protected $garage;

    /**
     * @return Garage
     */
    public function getGarage(): Garage
    {
        return $this->garage;
    }

    /**
     * @param Garage $garage
     */
    public function setGarage(Garage $garage)
    {
        $this->garage = $garage;
    }
}