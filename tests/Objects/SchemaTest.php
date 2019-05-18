<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Discriminator;
use GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Xml;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class SchemaTest extends TestCase
{
    /** @test */
    public function create_array_with_all_parameters_works()
    {
        $schema = Schema::create()
            ->title('Schema title')
            ->description('Schema description')
            ->enum(['Earth'], ['Venus'], ['Mars'])
            ->default(['Earth'])
            ->type(Schema::ARRAY)
            ->items(Schema::string())
            ->maxItems(10)
            ->minItems(1)
            ->uniqueItems()
            ->nullable()
            ->discriminator(Discriminator::create()->propertyName('Property name'))
            ->readOnly()
            ->writeOnly()
            ->xml(Xml::create())
            ->externalDocs(ExternalDocs::create()->url('https://goldspecdigital.com'))
            ->example(['Venus'])
            ->deprecated();

        $response = MediaType::create()
            ->schema($schema);

        $this->assertEquals([
            'schema' => [
                'title' => 'Schema title',
                'description' => 'Schema description',
                'enum' => [
                    ['Earth'],
                    ['Venus'],
                    ['Mars'],
                ],
                'default' => ['Earth'],
                'type' => 'array',
                'items' => ['type' => 'string'],
                'maxItems' => 10,
                'minItems' => 1,
                'uniqueItems' => true,
                'nullable' => true,
                'discriminator' => ['propertyName' => 'Property name'],
                'readOnly' => true,
                'writeOnly' => true,
                'xml' => [],
                'externalDocs' => ['url' => 'https://goldspecdigital.com'],
                'example' => ['Venus'],
                'deprecated' => true,
            ],
        ], $response->toArray());
    }

    /** @test */
    public function create_boolean_with_all_parameters_works()
    {
        $schema = Schema::create()
            ->title('Schema title')
            ->description('Schema description')
            ->default(false)
            ->type(Schema::BOOLEAN)
            ->nullable()
            ->discriminator(Discriminator::create()->propertyName('Property name'))
            ->readOnly()
            ->writeOnly()
            ->xml(Xml::create())
            ->externalDocs(ExternalDocs::create()->url('https://goldspecdigital.com'))
            ->example(['Venus'])
            ->deprecated();

        $response = MediaType::create()
            ->schema($schema);

        $this->assertEquals([
            'schema' => [
                'title' => 'Schema title',
                'description' => 'Schema description',
                'default' => false,
                'type' => 'boolean',
                'nullable' => true,
                'discriminator' => ['propertyName' => 'Property name'],
                'readOnly' => true,
                'writeOnly' => true,
                'xml' => [],
                'externalDocs' => ['url' => 'https://goldspecdigital.com'],
                'example' => ['Venus'],
                'deprecated' => true,
            ],
        ], $response->toArray());
    }

    /** @test */
    public function create_integer_with_all_parameters_works()
    {
        $schema = Schema::create()
            ->title('Schema title')
            ->description('Schema description')
            ->default(false)
            ->format(Schema::INT32)
            ->type(Schema::INTEGER)
            ->maximum(100)
            ->exclusiveMaximum(101)
            ->minimum(1)
            ->exclusiveMinimum(0)
            ->multipleOf(2)
            ->nullable()
            ->discriminator(Discriminator::create()->propertyName('Property name'))
            ->readOnly()
            ->writeOnly()
            ->xml(Xml::create())
            ->externalDocs(ExternalDocs::create()->url('https://goldspecdigital.com'))
            ->example(['Venus'])
            ->deprecated();

        $response = MediaType::create()
            ->schema($schema);

        $this->assertEquals([
            'schema' => [
                'title' => 'Schema title',
                'description' => 'Schema description',
                'default' => false,
                'format' => 'int32',
                'type' => 'integer',
                'maximum' => 100,
                'exclusiveMaximum' => 101,
                'minimum' => 1,
                'exclusiveMinimum' => 0,
                'multipleOf' => 2,
                'nullable' => true,
                'discriminator' => ['propertyName' => 'Property name'],
                'readOnly' => true,
                'writeOnly' => true,
                'xml' => [],
                'externalDocs' => ['url' => 'https://goldspecdigital.com'],
                'example' => ['Venus'],
                'deprecated' => true,
            ],
        ], $response->toArray());
    }

    /** @test */
    public function create_number_with_all_parameters_works()
    {
        $schema = Schema::create()
            ->title('Schema title')
            ->description('Schema description')
            ->default(false)
            ->type(Schema::NUMBER)
            ->maximum(100)
            ->exclusiveMaximum(101)
            ->minimum(1)
            ->exclusiveMinimum(0)
            ->multipleOf(2)
            ->nullable()
            ->discriminator(Discriminator::create()->propertyName('Property name'))
            ->readOnly()
            ->writeOnly()
            ->xml(Xml::create())
            ->externalDocs(ExternalDocs::create()->url('https://goldspecdigital.com'))
            ->example(['Venus'])
            ->deprecated();

        $response = MediaType::create()
            ->schema($schema);

        $this->assertEquals([
            'schema' => [
                'title' => 'Schema title',
                'description' => 'Schema description',
                'default' => false,
                'type' => 'number',
                'maximum' => 100,
                'exclusiveMaximum' => 101,
                'minimum' => 1,
                'exclusiveMinimum' => 0,
                'multipleOf' => 2,
                'nullable' => true,
                'discriminator' => ['propertyName' => 'Property name'],
                'readOnly' => true,
                'writeOnly' => true,
                'xml' => [],
                'externalDocs' => ['url' => 'https://goldspecdigital.com'],
                'example' => ['Venus'],
                'deprecated' => true,
            ],
        ], $response->toArray());
    }

    /** @test */
    public function create_object_with_all_parameters_works()
    {
        $property = Schema::string()
            ->name('id')
            ->format(Schema::UUID);

        $schema = Schema::create()
            ->title('Schema title')
            ->description('Schema description')
            ->default(false)
            ->type(Schema::OBJECT)
            ->required($property)
            ->properties($property)
            ->additionalProperties(Schema::integer()->name('age'))
            ->maxProperties(10)
            ->minProperties(1)
            ->nullable()
            ->discriminator(Discriminator::create()->propertyName('Property name'))
            ->readOnly()
            ->writeOnly()
            ->xml(Xml::create())
            ->externalDocs(ExternalDocs::create()->url('https://goldspecdigital.com'))
            ->example(['Venus'])
            ->deprecated();

        $response = MediaType::create()
            ->schema($schema);

        $this->assertEquals([
            'schema' => [
                'title' => 'Schema title',
                'description' => 'Schema description',
                'default' => false,
                'type' => 'object',
                'required' => ['id'],
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'format' => 'uuid',
                    ],
                ],
                'additionalProperties' => [
                    'type' => 'integer',
                ],
                'maxProperties' => 10,
                'minProperties' => 1,
                'nullable' => true,
                'discriminator' => ['propertyName' => 'Property name'],
                'readOnly' => true,
                'writeOnly' => true,
                'xml' => [],
                'externalDocs' => ['url' => 'https://goldspecdigital.com'],
                'example' => ['Venus'],
                'deprecated' => true,
            ],
        ], $response->toArray());
    }

    /** @test */
    public function create_string_with_all_parameters_works()
    {
        $schema = Schema::create()
            ->title('Schema title')
            ->description('Schema description')
            ->default(false)
            ->format(Schema::UUID)
            ->type(Schema::STRING)
            ->pattern('/[a-zA-Z]+/')
            ->maxLength(10)
            ->minLength(1)
            ->nullable()
            ->discriminator(Discriminator::create()->propertyName('Property name'))
            ->readOnly()
            ->writeOnly()
            ->xml(Xml::create())
            ->externalDocs(ExternalDocs::create()->url('https://goldspecdigital.com'))
            ->example(['Venus'])
            ->deprecated();

        $response = MediaType::create()
            ->schema($schema);

        $this->assertEquals([
            'schema' => [
                'title' => 'Schema title',
                'description' => 'Schema description',
                'default' => false,
                'format' => 'uuid',
                'type' => 'string',
                'pattern' => '/[a-zA-Z]+/',
                'maxLength' => 10,
                'minLength' => 1,
                'nullable' => true,
                'discriminator' => ['propertyName' => 'Property name'],
                'readOnly' => true,
                'writeOnly' => true,
                'xml' => [],
                'externalDocs' => ['url' => 'https://goldspecdigital.com'],
                'example' => ['Venus'],
                'deprecated' => true,
            ],
        ], $response->toArray());
    }
}