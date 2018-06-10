<?php

namespace App\Garage\Domain\Repository;

use App\Garage\Domain\Exception\VehicleTypeIncorrectException;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use App\Garage\Domain\Shared\Collection\ArrayCollection;

/**
 * Class VehicleRepository
 * @package App\Garage\Domain\Repository
 */
class VehicleRepository extends ArrayCollection implements VehicleRepositoryInterface
{
    /**
     * VehicleRepository constructor.
     * @param iterable $elements
     */
    public function __construct(iterable $elements = [])
    {
        foreach ($elements as $element) {
            self::check($element);
        }
        parent::__construct($elements);
    }

    /**
     * @param $element
     * @throws VehicleTypeIncorrectException
     */
    protected function check($element)
    {
        if (!($element instanceof VehicleInterface)) {
            throw new VehicleTypeIncorrectException();
        }
    }

    /**
     * @param $element
     * @return bool
     */
    public function add($element)
    {
        self::check($element);
        return parent::add($element);
    }

    /**
     * @param $key
     * @param $element
     */
    public function set($key, $element)
    {
        self::check($element);
        parent::set($key, $element);
    }

    /**
     * @param iterable $elements
     */
    protected function load(iterable $elements = [])
    {
        foreach ($elements as $element) {
            self::check($element);
        }
        parent::load($elements);
    }
}