<?php

namespace App;

class Functions
{
    public static function map($items, $func) {
        $results = [];

        foreach ($items as $item) {
            $results[] = $func($item);
        }

        return $results;
    }

    public static function each($items, $func) {
        foreach ($items as $item) {
            $func($item);
        }
    }

    public static function filter($items, $func)
    {
        $results = [];

        foreach ($items as $item) {
            if($func($item)) {
                $results[] = $item;
            }
        }

        return $results;
    }

    public static function reject($items, $func)
    {
        return self::filter($items,static function ($item) use ($func) {
            return ! $func($item);
        });
    }

    public static function reduce($items, $func, $init)
    {
        $accumulator = $init;

        foreach ($items as $item) {
            $accumulator = $func($accumulator,$item);
        }

        return $accumulator;
    }

    public static function sum($items, $func)
    {
        return self::reduce($items,static function ($total,$item) use ($func) {
            return $total + $func($item);
        },0);
    }
}