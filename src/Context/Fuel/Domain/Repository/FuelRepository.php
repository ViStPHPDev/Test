<?php

namespace App\Fuel\Domain\Repository;

use App\Fuel\Domain\Exception\FuelTypeIncorrectException;
use App\Fuel\Domain\Model\FuelInterface;
use App\Fuel\Domain\Shared\Collection\ArrayCollection;

/**
 * Class FuelRepository
 * @package App\Fuel\Domain\Repository
 */
class FuelRepository extends ArrayCollection implements FuelRepositoryInterface
{
    /**
     * FuelRepository constructor.
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
     * @throws FuelTypeIncorrectException
     */
    protected function check($element)
    {
        if (!($element instanceof FuelInterface)) {
            throw new FuelTypeIncorrectException();
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