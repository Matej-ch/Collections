<?php

namespace App\sort;

class CountingSort implements ISort
{
    public static function sort(array $data, int $direction = SORT_ASC): array
    {
        $aux = [];
        if(empty($data)) {
            return $aux;
        }

        $min = $data[0];
        $max = $data[0];

        for ($i = 1; $i < count($data); $i++) {
            if ($data[$i] < $min) {
                $min = $data[$i];
            } elseif ($data[$i] > $max) {
                $max = $data[$i];
            }
        }

        $counts = [];
        for ($i = 0; $i < $max - $min + 1;$i++) {
            $counts[] = 0;
        }

        foreach ($data as $iValue) {
            $counts[$iValue - $min]++;
        }

        $counts[0]--;
        for ($i = 1; $i < count($counts); $i++) {
            $counts[$i] += $counts[$i - 1];
        }


        for ($i = count($data) - 1; $i >= 0; $i--) {
            $aux[$counts[$data[$i] - $min]--] = $data[$i];
        }

        if($direction === SORT_DESC) {
            rsort($aux);
        }

        return $aux;
    }
}