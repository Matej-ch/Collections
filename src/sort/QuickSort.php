<?php

namespace App\sort;

class QuickSort
{
    public static function sort(array $data, $direction = SORT_ASC): array
    {
        return self::quickSort($data,0,count($data) - 1);
    }

    private static function quickSort(array $data, int $left, int $right): array
    {
        if ($left < $right) {
            $boundary = $left;
            for ($i = $left + 1; $i < $right; $i++) {
                if ($data[$i] > $data[$left]) {
                    self::swap($data, $i, ++$boundary);
                }
            }
            $data = self::swap($data, $left, $boundary);
            self::quickSort($data, $left, $boundary);
            self::quickSort($data, $boundary + 1, $right);
        }

        return $data;
    }

    private static function swap(array $data, int $left, int $right): array
    {
        $tmp = $data[$right];
        $data[$right] = $data[$left];
        $data[$left] = $tmp;

        return $data;
    }
}