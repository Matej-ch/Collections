<?php

namespace tests;

use App\sort\QuickSort;
use PHPUnit\Framework\TestCase;

class QuickSortTest extends TestCase
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
        $this->assertEquals($sorted,QuickSort::sort($unsorted));
    }

    /**
     * @test
     * @dataProvider arraysFromHighest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_highest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,QuickSort::sort($unsorted));
    }
}