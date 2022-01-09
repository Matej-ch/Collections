<?php

namespace tests;

use App\Collection;
use PHPUnit\Framework\TestCase;

class CollectionForgetTest extends TestCase
{
    /** @test */
    function it_forgets_item_and_returns_collection_with_rest_of_items() {

        $collection = Collection::make(['Alex', 'John', 'Jason', 'Martyn', 'Hanlin']);

        $this->assertEquals(Collection::make([0 => 'Alex',1=> 'John',3=>'Martyn',4 => 'Hanlin']),
            $collection->forget(2));
    }

    /** @test */
    function it_forgets_item_and_returns_collection_with_Rest_of_items_and_forgets_keys() {

        $collection = Collection::make(['Alex', 'John', 'Jason', 'Martyn', 'Hanlin']);

        $this->assertEquals(Collection::make(['Alex','John','Martyn','Hanlin']),
            $collection->forget(2,false));
    }
}
