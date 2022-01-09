<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class HeapSortTest extends TestCase
{
    use SortDataProvider;
    /**
     * @test
     * @dataProvider arraysFromLowest
     * @param $sorted
     * @param $unsorted
     */
    function it_sorts_array_of_values_from_lowest($sorted,$unsorted) {

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