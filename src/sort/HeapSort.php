<?php

namespace App\sort;

class HeapSort implements ISort
{
    public static function sort(array $data, int $direction = SORT_ASC): array
    {
        for ($i = count($data) / 2 - 1; $i >= 0; $i--) {
            self::repairTop($data, count($data) - 1, $i, $direction === SORT_DESC ? 1 : -1);
        }

        for ($i = count($data) - 1; $i > 0; $i--) {
            $tmp = $data[$i];
            $data[$i] = $data[0];
            $data[0] = $tmp;
            $data = self::repairTop($data, $i - 1, 0, $direction === SORT_DESC ? 1 : -1);
        }

        return $data;
    }

    private static function repairTop(array $data, int $bottom, int $topIndex, int $order): array
    {
        $tmp = $data[$topIndex];
        $succ = $topIndex * 2 + 1;
        if ($succ < $bottom && $data[$succ] > $data[$succ + 1]) {
            $succ++;
        }

        while ($succ <= $bottom && $tmp > $data[$succ]) {
            $data[$topIndex] = $data[$succ];
            $topIndex = $succ;
            $succ = $succ * 2 + 1;
            if ($succ < $bottom && $data[$succ] > $data[$succ + 1]) {
                $succ++;
            }
        }
        $data[$topIndex] = $tmp;

        return $data;
    }
}