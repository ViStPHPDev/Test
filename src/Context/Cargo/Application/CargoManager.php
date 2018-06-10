<?php

namespace App\Cargo\Application;

use App\Cargo\Domain\Factory\CargoRepositoryFactory;
use App\Cargo\Domain\Model\Bulk\BulkInterface;
use App\Cargo\Domain\Model\CargoInterface;
use App\Cargo\Domain\Repository\CargoRepositoryInterface;

/**
 * Class CargoManager
 * @package App\Cargo\Application
 */
class CargoManager implements CargoManagerInterface
{
    /**
     * @var CargoRepositoryInterface
     */
    protected $repository;

    /**
     * CargoManager constructor.
     * @param iterable $elements
     */
    function __construct(iterable $elements = [])
    {
        $this->setCargo(CargoRepositoryFactory::create($elements));
    }

    /**
     * @param CargoRepositoryInterface $repository
     */
    public function setCargo(CargoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return CargoRepositoryInterface
     */
    public function getCargo(): CargoRepositoryInterface
    {
        return $this->repository;
    }

    /**
     * @param CargoInterface $cargo
     * @return bool
     */
    public function isBulk(CargoInterface $cargo)
    {
        return $cargo instanceof BulkInterface;
    }
}