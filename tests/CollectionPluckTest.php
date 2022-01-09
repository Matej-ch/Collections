<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class CollectionPluckTest extends TestCase
{
    /** @test */
    function it_returns_values_from_column_given_by_key()
    {
        $collection = \App\Collection::make([
            ['name' => 'Alex','age' => 12],
            ['name' => 'John','age' => 1],
            ['name' => 'Jason','age' => 100],
            ['name' => 'Martyn','age' => 42],
            ['name' => 'Hanlin','age' => 69]]);

        $this->assertEquals([
            'Alex','John','Jason','Martyn','Hanlin'
        ],$collection->pluck('name'));
    }

    /** @test */
    function it_returns_empty_array_if_key__not_in_array()
    {
        $collection = \App\Collection::make([
            ['name' => 'Alex','age' => 12],
            ['name' => 'John','age' => 1],
            ['name' => 'Jason','age' => 100],
            ['name' => 'Martyn','age' => 42],
            ['name' => 'Hanlin','age' => 69]]);

        $this->assertEquals([],$collection->pluck('address'));
    }
}
