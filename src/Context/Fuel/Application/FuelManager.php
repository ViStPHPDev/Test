<?php

namespace App\Fuel\Application;

use App\Fuel\Domain\Factory\FuelRepositoryFactory;
use App\Fuel\Domain\Model\FuelInterface;
use App\Fuel\Domain\Model\Gas\GasInterface;
use App\Fuel\Domain\Repository\FuelRepositoryInterface;

/**
 * Class FuelManager
 * @package App\Fuel\Application
 */
class FuelManager implements FuelManagerInterface
{
    /**
     * @var FuelRepositoryInterface
     */
    protected $repository;

    /**
     * FuelManager constructor.
     * @param iterable $elements
     */
    function __construct(iterable $elements = [])
    {
        $this->setFuels(FuelRepositoryFactory::create($elements));
    }

    /**
     * @param FuelRepositoryInterface $repository
     */
    public function setFuels(FuelRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return FuelRepositoryInterface
     */
    public function getFuels(): FuelRepositoryInterface
    {
        return $this->repository;
    }

    /**
     * @param FuelInterface $fuel
     * @return bool
     */
    public function isGas(FuelInterface $fuel)
    {
        return $fuel instanceof GasInterface;
    }
}