<?php

namespace tests;

use App\sort\HeapSort;
use PHPUnit\Framework\TestCase;

class HeapSortTest extends TestCase
{
    use SortDataProvider;
    /**
     * @test
     * @dataProvider arraysIntegerFromLowest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_lowest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,HeapSort::sort($unsorted));
    }

    /**
     * @test
     * @dataProvider arraysIntegerFromHighest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_highest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,HeapSort::sort($unsorted,SORT_DESC));
    }
}