<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Tests;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Info;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Paths;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\OpenApi;

class ExampleTest extends TestCase
{
    public function test_example()
    {
        $openApi = OpenApi::create(
            OpenApi::VERSION_3_0_1,
            Info::create('Core API Specification', 'v1'),
            Paths::create()
        )
            ->servers(
                Server::create('https://api.example.com/v1'),
                Server::create('https://api.example.com/v2')
            );

        var_dump($openApi->toJson());
    }
}
