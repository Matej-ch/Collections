<?php

namespace tests;

use App\sort\BubbleSort;
use PHPUnit\Framework\TestCase;

class BubbleSortTest extends TestCase
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
        $this->assertEquals($sorted,BubbleSort::sort($unsorted));
    }

    /**
     * @test
     * @dataProvider arraysFromHighest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_highest($sorted,$unsorted)
    {
        $this->assertEquals($sorted,BubbleSort::sort($unsorted,SORT_DESC));
    }

    /**
     * @test
     */
    function it_gets_second_step_of_sorting()
    {

    }

    /**
     * @test
     */
    function it_gets_fourth_step_of_sorting()
    {

    }

    /**
     * @test
     */
    function it_gets_last_step_of_sorting()
    {

    }
}