<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{

    /** @test */
    function it_returns_array_of_emails()
    {
        $users = $this->getTestModels();


        $emails = \App\Functions::map($users,static function ($user) {
            return $user->email;
        });

        $this->assertSame(['test@mal.com','abc@123.com'],$emails);

    }

    /** @test */
    function it_updates_every_item()
    {
        $users = $this->getTestModels();

        \App\Functions::each($users,static function($user) {
            $user->email = 'qwerty@gmail.com';
        });

        $this->assertEquals([(object)['email' => 'qwerty@gmail.com'], (object)['email' => 'qwerty@gmail.com'],],$users);

    }

    /** @test */
    function it_filters_specific_email()
    {
        $users = $this->getTestModels();

        $filtered = \App\Functions::filter($users,static function ($user) {
            return $user->email === 'abc@123.com';
        });

        $this->assertEquals([(object)['email' => 'abc@123.com']],$filtered);
    }

    /** @test */
    function it_rejects_specified_items() {

        $users = $this->getTestModels();

        $rejected = \App\Functions::reject($users,static function ($user) {
            return $user->email === 'abc@123.com';
        });

        $this->assertEquals([(object)['email' => 'test@mal.com']],$rejected);
    }

    /** @test */
    function it_reduces_array() {
        $users = $this->getTestModels();

        $emailString = \App\Functions::reduce($users,static function ($emailString,$user) {
            return $emailString . $user->email . ', ';
        },'');

        $this->assertEquals('test@mal.com, abc@123.com, ',$emailString);
    }

    /** @test */
    function it_returns_sum_of_items_in_array() {

        $items = [1,2,3,5,98,51,23,9];

        $sum = \App\Functions::sum($items,static function ($item) {
            return $item;
        });

        $this->assertEquals(192,$sum);
    }

    function getTestModels()
    {

        return [
            (object)[
                'email' => 'test@mal.com'
            ],
            (object)[
                'email' => 'abc@123.com'
            ],
        ];
    }

}
