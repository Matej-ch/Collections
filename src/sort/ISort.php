<?php

namespace App\sort;

interface ISort
{
    public static function sort(array $data,int $direction = SORT_ASC): array;
}