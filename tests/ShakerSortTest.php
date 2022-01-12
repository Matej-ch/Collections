<?php

namespace tests;

use App\sort\ShakerSort;
use PHPUnit\Framework\TestCase;

class ShakerSortTest extends TestCase
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
        $this->assertEquals($sorted,ShakerSort::sort($unsorted));
    }

    /**
     * @test
     * @dataProvider arraysFromHighest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_highest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,ShakerSort::sort($unsorted,SORT_DESC));
    }
}