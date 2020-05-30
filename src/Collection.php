<?php


namespace App;


class Collection
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

    public function filter($callback)
    {
        return new static(array_filter($this->items,$callback));
    }

    public function toArray()
    {
        return $this->items;
    }
}