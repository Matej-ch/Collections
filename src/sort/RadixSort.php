<?php

namespace App\sort;

class RadixSort implements ISort
{
    public static function sort(array $data, int $direction = SORT_ASC): array
    {
        // Array for 10 queues.
        $queues = [
            [], [], [], [], [], [], [], [], [], []
        ];

        // Queues are allocated dynamically. In first iteration longest digits
        // element also determined.
        $longest = 0;
        foreach ($data as $el) {

            if(is_numeric($el)) {
                $condition = $el > $longest;
            } else {
                $condition = ord($el) > $longest;
            }

            if ($condition) {
                $longest = $el;
            }

            if(is_numeric($el)) {
                $queues[$el % 10][] = $el;
            } else {
                $queues[ord($el) % 10][] = $el;
            }
        }

        // Queues are dequeued back into original elements.
        $i = 0;
        foreach ($queues as $key => $q) {
            while (!empty($queues[$key])) {
                $data[$i++] = array_shift($queues[$key]);
            }
        }

        // Remaining iterations are determined based on longest digits element.
        $it = strlen($longest) - 1;
        $d = 10;
        while ($it--) {
            foreach ($data as $el) {
                if(is_numeric($el)) {
                    $queues[floor($el / $d) % 10][] = $el;
                } else {
                    $queues[floor(ord($el) / $d) % 10][] = $el;
                }

            }
            $i = 0;
            foreach ($queues as $key => $q) {
                while (!empty($queues[$key])) {
                    $data[$i++] = array_shift($queues[$key]);
                }
            }
            $d *= 10;
        }

        return $data;
    }

}