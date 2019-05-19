<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement;
use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme;
use GoldSpecDigital\ObjectOrientedOAS\OpenApi;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class SecurityRequirementTest extends TestCase
{
    /** @test */
    public function create_with_all_parameters_works()
    {
        $securityScheme = SecurityScheme::create();

        $securityRequirement = SecurityRequirement::create('OAuth2')
            ->securitySchemes($securityScheme);

        $openApi = OpenApi::create()
            ->security($securityRequirement);

        $this->assertEquals([
            'security' => [
                ['OAuth2' => []],
            ],
        ], $openApi->toArray());
    }
}
