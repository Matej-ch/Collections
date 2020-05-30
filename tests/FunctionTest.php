<?php


use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{

    /** @test */
    function map_returns_array_of_emails()
    {
        $users = $this->getTestModels();


        $emails = \App\Functions::map($users,static function ($user) {
            return $user->email;
        });

        $this->assertSame(['test@mal.com','abc@123.com'],$emails);

    }

    /** @test */
    function each_updates_every_item()
    {
        $users = $this->getTestModels();

        \App\Functions::each($users,static function($user) {
            $user->email = 'qwerty@gmail.com';
        });

        $this->assertEquals([(object)['email' => 'qwerty@gmail.com'], (object)['email' => 'qwerty@gmail.com'],],$users);

    }

    /** @test */
    function filter_filters_specific_email()
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
