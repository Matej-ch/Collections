<?php

namespace App\sort;

class BubbleSort
{
    public static function sort($data,$direction = SORT_ASC)
    {
        $count = count($data);

        if($count ===0 || $count === 1) {
            return $data;
        }

        for($i = 0; $i < $count - 1; $i++) {
            for($j = 0; $j < $count - $i - 1; $j++) {
                if($data[$j + 1] < $data[$j]) {
                    $tmp = $data[$j + 1];
                    $data[$j + 1] = $data[$j];
                    $data[$j] = $tmp;
                }
            }
        }

        return $data;
    }
}