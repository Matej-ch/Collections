<?php

namespace App\sort;

class QuickSort implements ISort
{
    public static function sort(array $data,int $direction = SORT_ASC): array
    {
        return self::quickSort($data,$direction);
    }

    private static function quickSort(array $data,int $direction): array
    {
        $left = $right = [];

        if(count($data) < 2) {
            return $data;
        }

        $pivotKey = key($data);
        $pivot = array_shift($data);

        foreach($data as $val) {

            if($direction === SORT_ASC) {
                if($val <= $pivot) {
                    $left[] = $val;
                } else {
                    $right[] = $val;
                }
            } else {
                if($val >= $pivot) {
                    $left[] = $val;
                } else {
                    $right[] = $val;
                }
            }
        }

        return array_merge(self::quickSort($left,$direction),[$pivotKey=>$pivot],self::quickSort($right,$direction));
    }
}