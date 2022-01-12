<?php

namespace App\sort;

class ShakerSort
{
    public static function sort(array $data, $direction = SORT_ASC): array
    {
        for ($i = 0; $i < count($data) / 2; $i++) {
            $swapped = false;

            for ($j = $i; $j < count($data) - $i - 1; $j++) {

                if($direction === SORT_ASC) {
                    $comparison = $data[$j] > $data[$j + 1];
                } else {
                    $comparison = $data[$j] < $data[$j + 1];
                }

                if ($comparison) {
                    $tmp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $tmp;
                    $swapped = true;
                }
            }

            for ($j = count($data) - 2 - $i; $j > $i; $j--) {

                if($direction === SORT_ASC) {
                    $comparison = $data[$j] < $data[$j - 1];
                } else {
                    $comparison = $data[$j] > $data[$j - 1];
                }

                if ($comparison) {
                    $tmp = $data[$j];
                    $data[$j] = $data[$j - 1];
                    $data[$j - 1] = $tmp;
                    $swapped = true;
                }
            }

            if (!$swapped) {
                break;
            }
        }

        return $data;
    }
}