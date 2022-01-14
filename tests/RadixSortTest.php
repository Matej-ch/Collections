<?php

namespace tests;

use App\sort\RadixSort;
use PHPUnit\Framework\TestCase;

class RadixSortTest extends TestCase
{
    use SortDataProvider;
    /**
     * @test
     * @dataProvider arraysFromLowest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_lowest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,RadixSort::sort($unsorted));
    }

    /**
     * @test
     * @dataProvider arraysFromHighest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_highest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,RadixSort::sort($unsorted,SORT_DESC));
    }
}