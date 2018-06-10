<?php

namespace App\Fuel\Infrastructure\Web\Service;

use App\Fuel\Domain\Factory\FuelFactory;
use App\Fuel\Domain\Model\FuelInterface;

/**
 * Class FuelService
 * @package App\Fuel\Infrastructure\Web\Service
 */
class FuelService
{
    /**
     * @return FuelInterface
     */
    public function getGas()
    {
        return FuelFactory::create(FuelFactory::GAS, 'Gas');
    }
}