<?php


use App\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    /** @test */
    function it_returns_instance_of_collection()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertInstanceOf(Collection::class,$collection);
    }

    /** @test */
    function it_returns_item_array()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertIsArray($collection->toArray());
    }

    /** @test */
    function it_returns_size_of_collection()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertCount(6,$collection);
    }

    /** @test */
    function it_returns_size_of_collection_with_function()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertEquals(6,$collection->count());
    }

    /** @test */
    function it_returns_first_element_of_collection()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertEquals($this->getTestItems()[0],$collection->first());
    }

    /** @test */
    function it_returns_null_for_method_first_if_collection_is_empty()
    {
        $collection = Collection::make([]);

        $this->assertNull($collection->first());
    }

    /** @test */
    function it_returns_default_value_if_value_is_set_and_collection_is_empty()
    {
        $collection = Collection::make([]);
        $this->assertEquals('default',$collection->first(null,'default'));
    }

    /** @test */
    function it_returns_first_value_for_matching_callback()
    {

        $collection = Collection::make(['one','two','sixtyNine']);

        $this->assertEquals('sixtyNine',$collection->first(static function ($value){
            return strlen($value) === 9;
        }));
    }

    /** @test */
    function it_returns_default_value_if_items_dont_satisfy_callback()
    {
        $collection = Collection::make(['one','two','sixtyNine']);

        $this->assertEquals('default',$collection->first(static function ($value){
            return strlen($value) > 69;
        },'default'));
    }

    /** @test */
    function it_returns_last_element_of_collection()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertEquals((object)[
            'value' => 8,
            'email' => 'as5s52@test.com',
            'info' => [
                'price' => 0.256,
                'pieces' => 5
            ]
        ],$collection->last());
    }

    /** @test */
    function it_returns_null_for_method_last_if_collection_is_empty()
    {
        $collection = Collection::make([]);

        $this->assertNull($collection->last());
    }

    /** @test */
    function it_returns_default_value_for_method_last_if_is_set_and_collection_is_empty()
    {
        $collection = Collection::make([]);
        $this->assertEquals('default',$collection->last(null,'default'));
    }

    /** @test */
    function it_returns_last_value_for_matching_callback()
    {
        $collection = Collection::make(['one','sixtyNine','two']);

        $this->assertEquals('sixtyNine',$collection->last(static function ($value){
            return strlen($value) === 9;
        }));
    }

    /** @test */
    function it_returns_default_value_for_method_last_if_items_dont_satisfy_callback()
    {
        $collection = Collection::make(['one','sixtyNine','two']);

        $this->assertEquals('default',$collection->last(static function ($value){
            return strlen($value) > 69;
        },'default'));
    }

    /** @test */
    function flatten_returns_one_dimensional_array()
    {
        $collection = Collection::make([1, 2, [3, 4, 5, [6, 7], 8, 9,], 10, 11]);

        $this->assertEquals(Collection::make([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),$collection->flatten());
    }

    /** @test */
    function flatten_returns_empty_collection_for_empty_input()
    {
        $collection = Collection::make([]);

        $this->assertEquals(Collection::make([]),$collection->flatten());
    }

    /** @test */
    function transpose_returns_matrix_with_flipped_rows_and_columns_for_1D()
    {
        $collection = Collection::make([1,2]);

        $this->assertEquals(Collection::make([[1],[2]]),$collection->transpose());
    }

    /** @test */
    function transpose_returns_matrix_with_flipped_rows_and_columns_for_2x2()
    {
        $collection = Collection::make([[1,2],[3,4]]);

        $this->assertEquals(Collection::make([[1,3],[2,4]]),$collection->transpose());
    }

    /** @test */
    function transpose_returns_matrix_with_flipped_rows_and_columns_for_2x3()
    {
        $collection = Collection::make([[1,2],[3,4],[5,6]]);

        $this->assertEquals(Collection::make([[1,3,5],[2,4,6]]),$collection->transpose());
    }

    /** @test */
    function transpose_returns_matrix_with_flipped_rows_and_columns_for_3x3()
    {
        $collection = Collection::make([[1,2,3],[4,5,6],[7,8,9]]);

        $this->assertEquals(Collection::make([[1,4,7],[2,5,8],[3,6,9]]),$collection->transpose());
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
