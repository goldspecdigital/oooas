<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Components;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OAuthFlow;
use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class ComponentsTest extends TestCase
{
    /** @test */
    public function create_with_all_parameters_works()
    {
        $oauthFlow = OAuthFlow::create()
            ->flow(OAuthFlow::FLOW_IMPLICIT)
            ->authorizationUrl('http://example.org/api/oauth/dialog');

        $securityScheme = SecurityScheme::create()
            ->objectId('OAuth2')
            ->type(SecurityScheme::TYPE_OAUTH2)
            ->flows($oauthFlow);

        $components = Components::create()
            ->securitySchemes($securityScheme);

        $this->assertEquals([
            'securitySchemes' => [
                'OAuth2' => [
                    'type' => 'oauth2',
                    'flows' => [
                        'implicit' => [
                            'authorizationUrl' => 'http://example.org/api/oauth/dialog',
                        ],
                    ],
                ],
            ],
        ], $components->toArray());
    }
}
