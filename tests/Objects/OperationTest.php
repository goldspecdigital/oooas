<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Operation;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Tag;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class OperationTest extends TestCase
{
    /** @test */
    public function create_with_all_parameters_works()
    {
        $operation = Operation::create()
            ->action(Operation::GET)
            ->tags(Tag::create()->name('Users'))
            ->summary('Lorem ipsum')
            ->description('Dolar sit amet')
            ->externalDocs(ExternalDocs::create())
            ->operationId('users.show')
            ->parameters(Parameter::create())
            ->requestBody(RequestBody::create())
            ->responses(Response::create())
            ->deprecated()
            ->security(SecurityRequirement::create()->name('OAuth2'))
            ->servers(Server::create());

        $pathItem = PathItem::create()
            ->operations($operation);

        $this->assertEquals([
            'get' => [
                'tags' => ['Users'],
                'summary' => 'Lorem ipsum',
                'description' => 'Dolar sit amet',
                'externalDocs' => [],
                'operationId' => 'users.show',
                'parameters' => [
                    [],
                ],
                'requestBody' => [],
                'responses' => [
                    'default' => [],
                ],
                'deprecated' => true,
                'security' => [
                    'OAuth2' => [],
                ],
                'servers' => [
                    [],
                ],
            ],
        ], $pathItem->toArray());
    }
}
