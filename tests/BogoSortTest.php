<?php

namespace tests;


use App\sort\BogoSort;
use PHPUnit\Framework\TestCase;

class BogoSortTest extends TestCase
{
    /**
     * @test
     */
    function it_sorts_array_of_values_from_lowest()
    {
        $this->assertEquals([1,2,3],BogoSort::sort([3,1,2]));
    }

    /**
     * @test
     */
    function it_sorts_array_of_values_from_highest()
    {
        $this->assertEquals([3,2,1],BogoSort::sort([3,1,2],SORT_DESC));
    }
}