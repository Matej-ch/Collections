<?php

namespace App\sort;

class BucketSort
{

    public static function sort(array $data, int $bucketCount = 1, int $direction = SORT_ASC): array
    {
        if (count($data) <= 1) {
            return $data;
        }

        $high = $data[0];
        $low = $data[0];
        for ($i = 1; $i < count($data); $i++) {
            if ($data[$i] > $high) {
                $high = $data[$i];
            }
            if ($data[$i] < $low) {
                $low = $data[$i];
            }
        }
        $interval = (($high - $low + 1)) / $bucketCount;

        $buckets = [];
        for ($i = 0; $i < $bucketCount; $i++) {
            $buckets[$i] = [];
        }

        for ($i = 0; $i < count($data); $i++) {
            $buckets[(int)(($data[$i] - $low) / $interval)][] = $data[$i];
        }

        $pointer = 0;
        for ($i = 0; $i < count($data); $i++) {
            sort($buckets[$i]); //mergeSort
            for ($j = 0; $j < count($buckets[$i]); $j++) {
                $data[$pointer] = $buckets[$i][$j];
                $pointer++;
            }
        }
        return $data;
    }
}