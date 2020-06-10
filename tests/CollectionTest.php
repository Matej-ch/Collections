<?php


use App\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    /** @test */
    public function it_returns_instance_of_collection()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertInstanceOf(Collection::class,$collection);
    }

    /** @test */
    public function it_returns_item_array()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertIsArray($collection->toArray());
    }

    /** @test */
    public function it_returns_size_of_collection()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertCount(6,$collection);
    }

    /** @test */
    public function it_returns_size_of_collection_with_function()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertEquals(6,$collection->count());
    }

    /** @test */
    public function it_returns_first_element_of_collection()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertEquals($this->getTestItems()[0],$collection->first());
    }

    /** @test */
    public function it_returns_null_for_method_first_if_collection_is_empty()
    {
        $collection = Collection::make([]);

        $this->assertNull($collection->first());
    }

    /** @test */
    public function it_returns_default_value_if_value_is_set_and_collection_is_empty()
    {
        $collection = Collection::make([]);
        $this->assertEquals('default',$collection->first(null,'default'));
    }

    /** @test */
    public function it_returns_first_value_for_matching_callback()
    {

        $collection = Collection::make(['one','two','sixtyNine']);

        $this->assertEquals('sixtyNine',$collection->first(static function ($value){
            return strlen($value) === 9;
        }));
    }

    /** @test */
    public function it_returns_default_value_if_items_dont_satisfy_callback()
    {
        $collection = Collection::make(['one','two','sixtyNine']);

        $this->assertEquals('default',$collection->first(static function ($value){
            return strlen($value) > 69;
        },'default'));
    }

    /** @test */
    public function it_returns_last_element_of_collection()
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
    public function it_returns_null_for_method_last_if_collection_is_empty()
    {
        $collection = Collection::make([]);

        $this->assertNull($collection->last());
    }

    /** @test */
    public function it_returns_default_value_for_method_last_if_is_set_and_collection_is_empty()
    {
        $collection = Collection::make([]);
        $this->assertEquals('default',$collection->last(null,'default'));
    }

    /** @test */
    public function it_returns_last_value_for_matching_callback()
    {
        $collection = Collection::make(['one','sixtyNine','two']);

        $this->assertEquals('sixtyNine',$collection->last(static function ($value){
            return strlen($value) === 9;
        }));
    }

    /** @test */
    public function it_returns_default_value_for_method_last_if_items_dont_satisfy_callback()
    {
        $collection = Collection::make(['one','sixtyNine','two']);

        $this->assertEquals('default',$collection->last(static function ($value){
            return strlen($value) > 69;
        },'default'));
    }

    /** @test */
    public function flatten_returns_one_dimensional_array()
    {
        $collection = Collection::make([1, 2, [3, 4, 5, [6, 7], 8, 9,], 10, 11]);

        $this->assertEquals(Collection::make([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),$collection->flatten());
    }

    /** @test */
    public function flatten_returns_empty_collection_for_empty_input()
    {
        $collection = Collection::make([]);

        $this->assertEquals(Collection::make([]),$collection->flatten());
    }

    /** @test */
    public function transpose_returns_matrix_with_flipped_rows_and_columns_for_1D()
    {
        $collection = Collection::make([1,2]);

        $this->assertEquals(Collection::make([[1],[2]]),$collection->transpose());
    }

    /** @test */
    public function transpose_returns_matrix_with_flipped_rows_and_columns_for_2x2()
    {
        $collection = Collection::make([[1,2],[3,4]]);

        $this->assertEquals(Collection::make([[1,3],[2,4]]),$collection->transpose());
    }

    /** @test */
    public function transpose_returns_matrix_with_flipped_rows_and_columns_for_2x3()
    {
        $collection = Collection::make([[1,2],[3,4],[5,6]]);

        $this->assertEquals(Collection::make([[1,3,5],[2,4,6]]),$collection->transpose());
    }

    /** @test */
    public function transpose_returns_matrix_with_flipped_rows_and_columns_for_3x3()
    {
        $collection = Collection::make([[1,2,3],[4,5,6],[7,8,9]]);

        $this->assertEquals(Collection::make([[1,4,7],[2,5,8],[3,6,9]]),$collection->transpose());
    }

    /** @test */
    public function each_iterates_over_each_element_and_returns_updated_eamil()
    {
        $collection = Collection::make([(object)['value' => 2, 'email' => 'abc@test.com'], (object)['value' => 5, 'email' => 'zcxx@test.com']]);

        $this->assertEquals(
            Collection::make([(object)['value' => 2, 'email' => 'updated@.com'], (object)['value' => 5, 'email' => 'updated@.com']]),
            $collection->each(static function ($item) { return $item->email = 'updated@.com';}));
    }

    /** @test */
    public function zip_funcion_zips_collection_items_with_array()
    {
        $collection1 = Collection::make([1, 2, 3, 4, 5]);

        $this->assertEquals(Collection::make([[1,5],[2,6],[3,7],[4,8],[5,9]]),$collection1->zip([5, 6, 7, 8, 9]));
    }

    /** @test */
    public function zip_funcion_zips_collection_items_with_varaible_bumer_fo_arrays()
    {
        $collection = Collection::make([1, 2, 3, 4, 5]);

        $this->assertEquals
        (Collection::make([[1,5,'quak'],[2,6,'hack',],[3,7,'suck'],[4,8,'make'],[5,9,'kack']]),
            $collection->zip(
            [5, 6, 7, 8, 9],
            ['quak','hack','suck','make','kack']));

    }

    /** @test */
    public function max_returns_maximum_value_of_given_key()
    {
        $collection = Collection::make($this->getTestItems());

        $this->assertEquals(420,$collection->max('value'));
    }

    /** @test */
    public function max_returns_maximum_value_for_key_for_collecion_of_simple_arrays()
    {
        $collection = Collection::make([['id' => 1],['id' =>  2],['id' => 69],['id' =>  3],['id' =>  4],['id' =>  5]]);

        $this->assertEquals(69,$collection->max('id'));
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
