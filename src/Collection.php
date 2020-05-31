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

    public static function make($items)
    {
        return new static($items);
    }

    public function map($callback)
    {
        return new static(array_map($callback,$this->items));
    }

    public function each($callback)
    {

    }

    public function pluck($key)
    {

    }

    public function flatten($callback)
    {

    }

    public function last()
    {

    }

    public function first($callback)
    {

    }

    public function transpose()
    {

    }

    public function filter($callback)
    {
        return new static(array_filter($this->items,$callback));
    }

    public function reject($callback)
    {
        return new static($this->filter($callback));
    }

    public function reduce($callback,$init)
    {
        return new static(array_reduce($this->items,$callback,$init));
    }

    public function sum()
    {
        return new static(array_sum($this->items));
    }

    public function contains($callback)
    {

    }

    public function reverse()
    {
        return new static(array_reverse($this->items));
    }

    public function values()
    {
        return new static(array_values($this->items));
    }

    public function keys()
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