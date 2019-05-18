<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Components;
use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class ComponentsTest extends TestCase
{
    /** @test */
    public function create_with_all_parameters_works()
    {
        $securityScheme = SecurityScheme::create()
            ->name('OAuth2')
            ->type(SecurityScheme::OAUTH2)
            ->flows([
                'implicit' => [
                    'authorizationUrl' => 'http://example.org/api/oauth/dialog',
                    'scopes' => [],
                ],
            ]);

        $components = Components::create()
            ->securitySchemes($securityScheme);

        $this->assertEquals([
            'securitySchemes' => [
                'OAuth2' => [
                    'type' => 'oauth2',
                    'flows' => [
                        'implicit' => [
                            'authorizationUrl' => 'http://example.org/api/oauth/dialog',
                            'scopes' => [],
                        ],
                    ],
                ],
            ],
        ], $components->toArray());
    }
}
