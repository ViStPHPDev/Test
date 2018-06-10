<?php

namespace App\Fuel\Application;

use App\Fuel\Domain\Repository\FuelRepositoryInterface;

/**
 * Interface FuelManagerInterface
 * @package App\Fuel\Application
 */
interface FuelManagerInterface
{
    public function setFuels(FuelRepositoryInterface $repository);
    public function getFuels(): FuelRepositoryInterface;
}