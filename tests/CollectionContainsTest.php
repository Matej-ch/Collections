<?php


use App\Collection;
use PHPUnit\Framework\TestCase;

class CollectionContainsTest extends TestCase
{

    /** @test */
    function it_returns_true_if_value_is_found()
    {
        $collection = Collection::make(['country' => 'Slovakia','address' => 'Street 12','zip' => 12345]);

        $this->assertTrue($collection->contains('Street 12'));
    }

    /** @test */
    function it_returns_false_if_value_is_not_found()
    {
        $collection = Collection::make(['country' => 'Slovakia','address' => 'Street 12','zip' => 12345]);

        $this->assertFalse($collection->contains('Poland'));
    }

    /** @test */
    function it_returns_false_if_value_is_not_found_with_strict_comparison()
    {
        $collection = Collection::make(['country' => 'Slovakia','address' => 'Street 12','zip' => 12345]);

        $this->assertFalse($collection->contains('12345',true));
    }
}
