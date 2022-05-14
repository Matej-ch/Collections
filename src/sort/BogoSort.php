<?php

namespace App\sort;

class BogoSort implements ISort
{
    public static function sort(array $data,int $direction = SORT_ASC): array
    {
        $sorted = array_values($data);
        if($direction === SORT_ASC) {
            sort($sorted);
        } else {
            rsort($sorted);
        }

        while ($data !== $sorted) {

            shuffle($data);

            $sorted = array_values($data);
            if($direction === SORT_ASC) {
                sort($sorted);
            } else {
                rsort($sorted);
            }
        }

        return $data;
    }
}