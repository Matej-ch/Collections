<?php

namespace App\sort;

class ShellSort
{
    public static function sort(array $data, $direction = SORT_ASC): array
    {
        $gap = count($data) / 2;

        while ($gap > 0) {

            for ($i = 0; $i < count($data) - $gap; $i++) {
                $j = $i + $gap;
                $tmp = $data[$j];

                while ($j >= $gap && $tmp > $data[$j - $gap]) {
                    $data[$j] = $data[$j - $gap];
                    $j -= $gap;
                }
                $data[$j] = $tmp;
            }

            if ($gap === 2) {
                $gap = 1;
            } else {
                $gap = (int)($gap / 2.2);
            }
        }

        return $data;
    }
}