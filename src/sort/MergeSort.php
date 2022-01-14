<?php

namespace App\sort;

class MergeSort implements ISort
{
    public static function sort(array $data, int $direction = SORT_ASC): array
    {
        return self::mergesort($data,$direction);
    }

    private static function mergesort(array $data,$direction): array
    {
        $count = count($data);

        if ($count === 0 || $count === 1) {
            return $data;
        }

        $mid = $count / 2;
        $left = array_slice($data, 0, $mid);
        $right = array_slice($data, $mid);

        $left = self::mergesort($left,$direction);
        $right = self::mergesort($right,$direction);

        return self::merge($left, $right,$direction);
    }

    private static function merge($left, $right,$direction): array
    {
        $result = [];
        $leftIndex = 0;
        $rightIndex = 0;

        while ($leftIndex < count($left) && $rightIndex < count($right)) {

            if($direction === SORT_ASC) {
                $condition = $left[$leftIndex] > $right[$rightIndex];
            } else {
                $condition = $left[$leftIndex] < $right[$rightIndex];
            }

            if ($condition) {

                $result[] = $right[$rightIndex];
                $rightIndex++;
            } else {
                $result[] = $left[$leftIndex];
                $leftIndex++;
            }
        }

        while ($leftIndex < count($left)) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        }

        while ($rightIndex < count($right)) {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }

        return $result;
    }
}