<?php


use App\Collection;
use PHPUnit\Framework\TestCase;

class CollectionChunkTest extends TestCase
{
    /** @test */
    function it_returns_collection_with_three_chunks() {

        $collection = Collection::make(['Alex', 'John', 'Jason', 'Martyn', 'Hanlin']);

        $this->assertCount(2,$collection->chunk(3));
    }
}
