<?php

namespace App\Garage\Domain\Shared\Collection;

/**
 * Interface ArrayCollectionInterface
 * @package App\Garage\Domain\Shared\Collection
 */
interface ArrayCollectionInterface
{
    /**
     * @return mixed
     */
    public function toArray();

    /**
     * @return mixed
     */
    public function first();

    /**
     * @return mixed
     */
    public function last();

    /**
     * @return mixed
     */
    public function key();

    /**
     * @return mixed
     */
    public function next();

    /**
     * @return mixed
     */
    public function current();

    /**
     * @param $key
     * @return mixed
     */
    public function remove($key);

    /**
     * @param $element
     * @return mixed
     */
    public function removeElement($element);

    /**
     * @param $key
     * @return mixed
     */
    public function containsKey($key);

    /**
     * @param $element
     * @return mixed
     */
    public function contains($element);

    /**
     * @param \Closure $p
     * @return mixed
     */
    public function exists(\Closure $p);

    /**
     * @param $element
     * @return mixed
     */
    public function indexOf($element);

    /**
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * @return mixed
     */
    public function getKeys();

    /**
     * @return mixed
     */
    public function getValues();

    /**
     * @return mixed
     */
    public function count();

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param $element
     * @return mixed
     */
    public function add($element);

    /**
     * @return mixed
     */
    public function isEmpty();

    /**
     * @return mixed
     */
    public function getIterator();

    /**
     * @param \Closure $func
     * @return mixed
     */
    public function map(\Closure $func);

    /**
     * @param \Closure $p
     * @return mixed
     */
    public function filter(\Closure $p);

    /**
     * @param \Closure $p
     * @return mixed
     */
    public function forAll(\Closure $p);

    /**
     * @param \Closure $p
     * @return mixed
     */
    public function partition(\Closure $p);

    /**
     * @return mixed
     */
    public function __toString();

    /**
     * @return mixed
     */
    public function clear();

    /**
     * @param $offset
     * @param null $length
     * @return mixed
     */
    public function slice($offset, $length = null);
}