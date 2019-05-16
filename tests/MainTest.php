<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Tests;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Components;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Contact;
use GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Info;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Operation;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Paths;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Tag;
use GoldSpecDigital\ObjectOrientedOAS\OpenApi;

class MainTest extends TestCase
{
    public function test_example()
    {
        $tags = [
            Tag::create('Audits')->description('All the audits'),
        ];

        $contact = Contact::create(
            'GoldSpec Digital',
            'https://goldspecdigital.com',
            'hello@goldspecdigital.com'
        );

        $info = Info::create('API Specification', 'v1')
            ->description('For using the Example App API')
            ->contact($contact);

        $exampleObject = Schema::object()->properties(
            Schema::string('id')->format(Schema::UUID),
            Schema::string('created_at')->format(Schema::DATE_TIME),
            Schema::integer('age')->example(60),
            Schema::array('data')->items(
                Schema::string('id')->format(Schema::UUID)
            )
        )->required('id', 'created_at');

        $exampleResponse = Response::create(
            200,
            'OK',
            MediaType::json($exampleObject)
        );

        $listAudits = Operation::get($exampleResponse)
            ->tags('Audits')
            ->summary('List all audits')
            ->operationId('audits.index');

        $createAudit = Operation::post($exampleResponse)
            ->tags('Audits')
            ->summary('Create an audit')
            ->operationId('audits.store')
            ->requestBody(RequestBody::create(
                MediaType::json($exampleObject)
            ));

        $auditId = Schema::string('audit')->format(Schema::UUID);
        $format = Schema::string('format')->enum('json', 'ics')->default('json');

        $readAudit = Operation::get($exampleResponse)
            ->tags('Audits')
            ->summary('View an audit')
            ->operationId('audits.show')
            ->parameters(
                Parameter::path('audit', $auditId)->required(),
                Parameter::query('format', $format)->description('The format of the appointments')
            );

        $paths = Paths::create(
            PathItem::create('/audits', $listAudits, $createAudit),
            PathItem::create('/audits/{audit}', $readAudit)
        );

        $servers = [
            Server::create('https://api.example.com/v1'),
            Server::create('https://api.example.com/v2'),
        ];

        $components = Components::create()->securitySchemes(
            SecurityScheme::oauth2('OAuth2', ['password' => ['tokenUrl' => 'https://api.example.com/oauth/authorize']])
        );

        $security = ['OAuth2' => []];

        $externalDocs = ExternalDocs::create('https://github.com/goldspecdigital/oooas')
            ->description('GitHub Wiki');

        $openApi = OpenApi::create(OpenApi::VERSION_3_0_1, $info, $paths)
            ->servers(...$servers)
            ->components($components)
            ->security($security)
            ->tags(...$tags)
            ->externalDocs($externalDocs);

        $exampleResponse = file_get_contents(realpath(__DIR__) . '/storage/example_response.json');

        $this->assertEquals(
            json_decode($exampleResponse, true),
            $openApi->toArray()
        );
    }
}
