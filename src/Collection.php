<?php


namespace App;


use Exception;
use Traversable;

class Collection implements \ArrayAccess, \Countable, \IteratorAggregate
{
    private $items;
    
    public function __construct($items)
    {
        $this->items = $items;
    }

    public static function make($items): Collection
    {
        return new static($items);
    }

    public function map($callback): Collection
    {
        return new static(array_map($callback,$this->items));
    }

    public function each($callback)
    {

    }

    public function pluck($key)
    {

    }

    public function flatten(): Collection
    {
        return new static($this->flattenArray($this->items));
    }

    private function flattenArray($array): array
    {
        $result = [];

        foreach ($array as $item) {
            if (is_null($item)) {
                continue;
            }

            $result = array_merge($result, is_array($item) ? $this->flattenArray($item) : [$item]);
        }

        return $result;
    }

    public function last($callback = null,$default = null)
    {
        if(empty($this->items) && $default) {
            return $default;
        }

        if($callback) {

            $reversed = array_reverse($this->items);
            foreach ($reversed as $item) {
                if($callback($item)) {
                    return $item;
                }
            }

            if($default) {
                return $default;
            }
        }

        return array_pop($this->items);
    }

    public function first($callback = null,$default = null)
    {
        if(empty($this->items) && $default) {
            return $default;
        }

        if($callback) {
            foreach ($this->items as $item) {
                if($callback($item)) {
                    return $item;
                }
            }
            if($default) {
                return $default;
            }
        }

        $reversed = $this->reverse()->toArray();
        return array_pop($reversed);
    }

    public function transpose()
    {

    }

    public function filter($callback): Collection
    {
        return new static(array_filter($this->items,$callback));
    }

    public function reject($callback): Collection
    {
        return new static($this->filter($callback));
    }

    public function reduce($callback,$init): Collection
    {
        return new static(array_reduce($this->items,$callback,$init));
    }

    public function sum(): Collection
    {
        return new static(array_sum($this->items));
    }

    public function contains($callback)
    {

    }

    public function reverse(): Collection
    {
        return new static(array_reverse($this->items));
    }

    public function values(): Collection
    {
        return new static(array_values($this->items));
    }

    public function keys(): Collection
    {
        return new static(array_keys($this->items));
    }

    public function toArray()
    {
        return $this->items;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset,$this->items);
    }

    public function offsetGet($offset)
    {
       return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if($offset === null) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
         unset($this->items[$offset]);
    }

    public function count()
    {
        return count($this->items);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}