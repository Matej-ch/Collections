<?php

namespace App\sort;

class SelectionSort
{
    public static function sort($data, $direction = SORT_ASC)
    {
        for ($i = 0; $i < count($data) - 1; $i++) {
            $maxIndex = $i;
            for ($j = $i + 1; $j < count($data); $j++) {

                if($direction === SORT_ASC) {
                    if ($data[$j] < $data[$maxIndex]) {
                        $maxIndex = $j;
                    }
                } else {
                    if ($data[$j] > $data[$maxIndex]) {
                        $maxIndex = $j;
                    }
                }
            }
            $tmp = $data[$i];
            $data[$i] = $data[$maxIndex];
            $data[$maxIndex] = $tmp;
        }

        return $data;
    }
}