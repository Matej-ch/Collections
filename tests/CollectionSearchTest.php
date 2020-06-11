<?php


use PHPUnit\Framework\TestCase;

class CollectionSearchTest extends TestCase
{
    /** @test */
    function it_returns_false_if_value_is_not_in_collection() {
        $collection = \App\Collection::make(['Alex', 'John', 'Jason', 'Martyn', 'Hanlin']);

        $this->assertFalse($collection->search('Matt'));
    }

    /** @test */
    function it_returns_key_if_value_is_in_collection() {
        $collection = \App\Collection::make(['Alex', 'John', 'Jason', 'Martyn', 'Hanlin']);

        $this->assertEquals(2,$collection->search('Jason'));
    }

    /** @test */
    function it_returns_key_if_value_is_in_collection_with_strict_comparison() {
        $collection = \App\Collection::make([1,2,3,45,6,78,9]);

        $this->assertSame(1,$collection->search(2));
    }

    /** @test */
    function it_returns_false_if_value_not_in_collection_with_strict_comparison() {
        $collection = \App\Collection::make([1,2,3,45,6,78,9]);

        $this->assertFalse($collection->search('3'));
    }
}
