<?php

namespace tests;

use App\sort\BubbleSort;

class BubbleSortTest extends SortDataProvider
{
    /**
     * @test
     * @dataProvider arraysFromLowest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_lowest($sorted,$unsorted) {

        $this->assertEquals($sorted,BubbleSort::sort($unsorted));
    }

    /**
     * @test
     * @dataProvider arraysFromHighest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_highest($sorted,$unsorted) {

    }
}