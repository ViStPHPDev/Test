<?php

namespace App\Garage\Domain\Shared\Collection;

/**
 * Class ArrayCollection
 * @package App\Garage\Domain\Shared\Collection
 */
class ArrayCollection implements ArrayCollectionInterface
{
    /**
     * @var array
     */
    private $elements = [];

    /**
     * ArrayCollection constructor.
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->load($elements);
    }

    /**
     * @param array $elements
     */
    protected function load(array $elements = [])
    {
        $this->elements = $elements;
    }

    /**
     * @param array $elements
     * @return static
     */
    protected function createFrom(array $elements)
    {
        return new static($elements);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->elements;
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return reset($this->elements);
    }

    /**
     * @return mixed
     */
    public function last()
    {
        return end($this->elements);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->elements);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->elements);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->elements);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function remove($key)
    {
        if (! isset($this->elements[$key]) && ! array_key_exists($key, $this->elements)) {
            return null;
        }

        $removed = $this->elements[$key];
        unset($this->elements[$key]);

        return $removed;
    }

    /**
     * @param $element
     * @return bool
     */
    public function removeElement($element)
    {
        $key = array_search($element, $this->elements, true);

        if ($key === false) {
            return false;
        }

        unset($this->elements[$key]);

        return true;
    }

    /**
     * @param $key
     * @return bool
     */
    public function containsKey($key)
    {
        return isset($this->elements[$key]) || array_key_exists($key, $this->elements);
    }

    /**
     * @param $element
     * @return bool
     */
    public function contains($element)
    {
        return in_array($element, $this->elements, true);
    }

    /**
     * @param \Closure $p
     * @return bool
     */
    public function exists(\Closure $p)
    {
        foreach ($this->elements as $key => $element) {
            if ($p($key, $element)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $element
     * @return mixed
     */
    public function indexOf($element)
    {
        return array_search($element, $this->elements, true);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->elements[$key] ?? null;
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->elements);
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return array_values($this->elements);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->elements);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->elements[$key] = $value;
    }

    /**
     * @param $element
     * @return bool
     */
    public function add($element)
    {
        $this->elements[] = $element;

        return true;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->elements);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->elements);
    }

    /**
     * @param \Closure $func
     * @return ArrayCollection
     */
    public function map(\Closure $func)
    {
        return $this->createFrom(array_map($func, $this->elements));
    }

    /**
     * @param \Closure $p
     * @return ArrayCollection
     */
    public function filter(\Closure $p)
    {
        return $this->createFrom(array_filter($this->elements, $p));
    }

    /**
     * @param \Closure $p
     * @return bool
     */
    public function forAll(\Closure $p)
    {
        foreach ($this->elements as $key => $element) {
            if (! $p($key, $element)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param \Closure $p
     * @return array
     */
    public function partition(\Closure $p)
    {
        $matches = $noMatches = [];

        foreach ($this->elements as $key => $element) {
            if ($p($key, $element)) {
                $matches[$key] = $element;
            } else {
                $noMatches[$key] = $element;
            }
        }

        return [$this->createFrom($matches), $this->createFrom($noMatches)];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . '@' . spl_object_hash($this);
    }

    /**
     *
     */
    public function clear()
    {
        $this->elements = [];
    }

    /**
     * @param $offset
     * @param null $length
     * @return array
     */
    public function slice($offset, $length = null)
    {
        return array_slice($this->elements, $offset, $length, true);
    }
}