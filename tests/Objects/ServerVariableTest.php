<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class ServerVariableTest extends TestCase
{
    /** @test */
    public function create_with_required_parameters_works()
    {
        $serverVariable = ServerVariable::create()
            ->name('username')
            ->default('demo');

        $this->assertEquals(
            ['default' => 'demo'],
            $serverVariable->toArray()
        );
    }
}
