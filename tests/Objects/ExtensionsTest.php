<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Components;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Operation;
use GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class ExtensionsTest extends TestCase
{
    /**
     * @test
     * @dataProvider schemasDataProvider
     * @param string|Schema $schema
     */
    public function create_with_extensions($schema)
    {
        $object = $schema::create();

        $object = $object
            ->x('key', 'value')
            ->x('x-foo', 'bar')
            ->x('x-baz', null)
            ->x('x-array', Schema::array()->items(Schema::string()));

        $this->assertEquals([
            'x-key' => 'value',
            'x-foo' => 'bar',
            'x-baz' => null,
            'x-array' => Schema::array()->items(Schema::string()),
        ], $object->toArray());

        $this->assertEquals(
            '{"x-key":"value","x-foo":"bar","x-baz":null,"x-array":{"type":"array","items":{"type":"string"}}}',
            $object->toJson()
        );
    }

    /**
     * @test
     * @dataProvider schemasDataProvider
     * @param string|Schema $schema
     */
    public function can_unset_extensions($schema)
    {
        $object = $schema::create();

        $object = $object
            ->x('x-foo', 'bar')
            ->x('x-baz', null);

        $object->x('key');

        $this->assertEquals([
            'x-foo' => 'bar',
            'x-baz' => null,
        ], $object->toArray());

        $this->assertEquals('{"x-foo":"bar","x-baz":null}', $object->toJson());
    }

    public function schemasDataProvider()
    {
        return [
            [Components::class],
            [Operation::class],
            [PathItem::class],
            [Response::class],
            [Schema::class],
        ];
    }
}
