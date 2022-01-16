<?php

namespace App\sort;

class BubbleSort implements ISort
{
    public $data;

    public $direction = SORT_ASC;

    public function __construct($data,$direction)
    {
        $this->data = $data;
        $this->direction = $direction;
    }

    public static function sort(array $data,int $direction = SORT_ASC): array
    {
        $count = count($data);

        if($count === 0 || $count === 1) {
            return $data;
        }

        for($i = 0; $i < $count - 1; $i++) {
            for($j = 0; $j < $count - $i - 1; $j++) {
                if($direction === SORT_ASC) {
                    if($data[$j + 1] < $data[$j]) {
                        $tmp = $data[$j + 1];
                        $data[$j + 1] = $data[$j];
                        $data[$j] = $tmp;
                    }
                } elseif($data[$j + 1] > $data[$j]) {
                    $tmp = $data[$j + 1];
                    $data[$j + 1] = $data[$j];
                    $data[$j] = $tmp;
                }
            }
        }

        return $data;
    }

    public function steps(int $numberOfSteps)
    {
        $count = count($this->data);

        if($count === 0 || $count === 1) {
            return;
        }


    }

    public function getSorted()
    {
        return $this->data;
    }

}