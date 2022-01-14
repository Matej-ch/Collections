<?php

namespace tests;

use App\sort\ShellSort;
use PHPUnit\Framework\TestCase;

class ShellSortTest extends TestCase
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
        $this->assertEquals($sorted,ShellSort::sort($unsorted));
    }

    /**
     * @test
     * @dataProvider arraysFromHighest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_highest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,ShellSort::sort($unsorted,SORT_DESC));
    }
}