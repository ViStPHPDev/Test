<?php

namespace App\Cargo\Domain\Repository;

use App\Cargo\Domain\Exception\CargoTypeIncorrectException;
use App\Cargo\Domain\Model\CargoInterface;
use App\Cargo\Domain\Shared\Collection\ArrayCollection;

/**
 * Class CargoRepository
 * @package App\Cargo\Domain\Repository
 */
class CargoRepository extends ArrayCollection implements CargoRepositoryInterface
{
    /**
     * CargoRepository constructor.
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
     * @throws CargoTypeIncorrectException
     */
    protected function check($element)
    {
        if (!($element instanceof CargoInterface)) {
            throw new CargoTypeIncorrectException();
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
     * @return mixed|void
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