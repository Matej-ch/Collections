<?php


use App\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    /** @test */
    function it_returns_instance_of_collection() {
        $collection = Collection::make($this->getTestItems());

        $this->assertInstanceOf(Collection::class,$collection);
    }

    /** @test */
    function it_returns_item_array() {
        $collection = Collection::make($this->getTestItems());

        $this->assertIsArray($collection->toArray());
    }

    /** @test */
    function it_returns_size_of_collection() {
        $collection = Collection::make($this->getTestItems());

        $this->assertCount(6,$collection);
    }

    /** @test */
    function it_returns_size_of_collection_with_function() {
        $collection = Collection::make($this->getTestItems());

        $this->assertEquals(6,$collection->count());
    }

    function getTestItems() {
        return [
            (object)[
                'value' => 2,
                'email' => 'abc@test.com',
                'info' => [
                    'price' => 12.5,
                    'pieces' => 2
                ]
            ],
            (object)[
                'value' => 5,
                'email' => 'zcxx@test.com',
                'info' => [
                    'price' => 12.98,
                    'pieces' => 9
                ]
            ],
            (object)[
                'value' => 420,
                'email' => 'tendies@local.com',
                'info' => [
                    'price' => 65,
                    'pieces' => 66
                ]
            ],
            (object)[
                'value' => 69,
                'email' => 'zumba@test.com',
                'info' => [
                    'price' => 12.5,
                    'pieces' => 3
                ]
            ],
            (object)[
                'value' => 3,
                'email' => 'quak5@test.com',
                'info' => [
                    'price' => 15,
                    'pieces' => 1
                ]
            ],
            (object)[
                'value' => 8,
                'email' => 'as5s52@test.com',
                'info' => [
                    'price' => 0.256,
                    'pieces' => 5
                ]
            ],
        ];
    }
}
