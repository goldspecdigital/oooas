<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class ServerTestTest extends TestCase
{
    /** @test */
    public function create_with_required_parameters_works()
    {
        $server = Server::create()
            ->url('https://api.example.con/v1');

        $this->assertEquals(
            ['url' => 'https://api.example.con/v1'],
            $server->toArray()
        );
    }

    /** @test */
    public function variables_are_supported()
    {
        $serverVariable = ServerVariable::create()
            ->name('username')
            ->default('demo');

        $server = Server::create()
            ->url('https://api.example.con/v1')
            ->variables($serverVariable);

        $this->assertEquals(
            [
                'url' => 'https://api.example.con/v1',
                'variables' => [
                    'username' => [
                        'default' => 'demo',
                    ],
                ],
            ],
            $server->toArray()
        );
    }
}
