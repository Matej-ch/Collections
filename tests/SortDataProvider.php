<?php

namespace tests;

trait SortDataProvider
{
    public function arraysFromLowest(): array
    {
        return [
            [[],[]],
            [[1,2,3,4,5,6,7],[7,5,3,1,4,2,6]],
            [['a','b','c','d','e'],['e','d','c','b','a']],
            [[6,6],[6,6]],
            [[99],[99]]
        ];
    }

    public function arraysFromHighest(): array
    {
        return [
            [[],[]],
            [[7,6,5,4,3,2,1],[7,5,3,1,4,2,6]],
            [['e','d','c','b','a'],['c','d','e','a','b']],
            [[6,6],[6,6]],
            [[99],[99]]
        ];
    }
}