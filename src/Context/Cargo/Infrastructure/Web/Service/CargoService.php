<?php

namespace App\Cargo\Infrastructure\Web\Service;

use App\Cargo\Domain\Factory\CargoFactory;
use App\Cargo\Domain\Model\CargoInterface;

/**
 * Class CargoService
 * @package App\Cargo\Infrastructure\Web\Service
 */
class CargoService
{
    /**
     * @return CargoInterface
     */
    public function getBulk()
    {
        return CargoFactory::create(CargoFactory::BULK, 'Bulk cargo');
    }
}