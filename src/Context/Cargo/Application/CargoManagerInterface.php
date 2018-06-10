<?php

namespace App\Cargo\Application;

use App\Cargo\Domain\Repository\CargoRepositoryInterface;

/**
 * Interface CargoManagerInterface
 * @package App\Cargo\Application
 */
interface CargoManagerInterface
{
    public function setCargo(CargoRepositoryInterface $repository);
    public function getCargo(): CargoRepositoryInterface;
}