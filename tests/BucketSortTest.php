<?php

namespace tests;

use App\sort\BucketSort;
use PHPUnit\Framework\TestCase;

class BucketSortTest extends TestCase
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
        $this->assertEquals($sorted,BucketSort::sort($unsorted));
    }

    /**
     * @test
     * @dataProvider arraysIntegerFromHighest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_highest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,BucketSort::sort($unsorted,1,SORT_DESC));
    }
}