<?php

namespace App\sort;

class InsertionSort
{
    public static function sort($data, $direction = SORT_ASC)
    {
        for ($i = 0; $i < count($data) - 1; $i++) {
            $j = $i + 1;
            $tmp = $data[$j];

            if($direction === SORT_ASC) {
                while ($j > 0 && $tmp < $data[$j - 1]) {
                    $data[$j] = $data[$j - 1];
                    $j--;
                }
            } else {
                while ($j > 0 && $tmp > $data[$j - 1]) {
                    $data[$j] = $data[$j - 1];
                    $j--;
                }
            }


            $data[$j] = $tmp;
        }

        return $data;
    }
}