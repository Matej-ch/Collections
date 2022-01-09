<?php

namespace tests;

use App\Collection;
use PHPUnit\Framework\TestCase;

class CollectionFilterTest extends TestCase
{
    /** @test */
    public function it_returns_filtered_items_as_collection_without_keys()
    {
        $collection = Collection::make([
            ['email' => 'test@foo.com'],
            ['email' => 'abc@test.com'],
            ['email' => 'foo@bar.com'],
            ['email' => 'quak@hack.com'],
            ['email' => 'abc@test.com']]);

        $this->assertEquals(Collection::make([
            ['email' => 'abc@test.com'],
            ['email' => 'abc@test.com']
        ]),$collection->filter(static function($item) {
            return $item['email'] === 'abc@test.com';
        },false));
    }

    /** @test */
    public function it_returns_filtered_items_as_collection_with_preserved_keys()
    {
        $collection = Collection::make([
            ['email' => 'test@foo.com'],
            ['email' => 'abc@test.com'],
            ['email' => 'foo@bar.com'],
            ['email' => 'quak@hack.com'],
            ['email' => 'abc@test.com']]);

        $this->assertEquals(Collection::make([
            1 => ['email' => 'abc@test.com'],
            4 => ['email' => 'abc@test.com']
        ]),$collection->filter(static function($item) {
            return $item['email'] === 'abc@test.com';
        }));
    }

    /** @test */
    public function it_returns_odd_numbers_in_collection()
    {
        $collection = Collection::make([1,2,3,4,5,6,7,8,9,10,11,12,13]);

        $this->assertEquals(Collection::make([1,3,5,7,9,11,13]),
        $collection->filter(static function ($item){ return $item & 1;},false));
    }
}
