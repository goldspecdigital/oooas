<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Example;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class MediaTypeTest extends TestCase
{
    /** @test */
    public function create_with_all_parameters_works()
    {
        $mediaType = MediaType::create()
            ->mediaType(MediaType::MEDIA_TYPE_APPLICATION_JSON)
            ->schema(Schema::object())
            ->examples(Example::create()->name('ExampleName'))
            ->example(Example::create())
            ->encoding(Encoding::create()->name('EncodingName'));

        $response = Response::create()
            ->content($mediaType);

        $this->assertEquals([
            'content' => [
                'application/json' => [
                    'schema' => [
                        'type' => 'object',
                    ],
                    'examples' => [
                        'ExampleName' => [],
                    ],
                    'example' => [],
                    'encoding' => [
                        'EncodingName' => [],
                    ],
                ],
            ],
        ], $response->toArray());
    }
}
