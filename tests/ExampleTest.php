<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Tests;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Contact;
use GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Info;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Operation;
use GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Paths;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Tag;
use GoldSpecDigital\ObjectOrientedOAS\OpenApi;

class ExampleTest extends TestCase
{
    public function test_example()
    {
        $contact = Contact::create(
            'Ayup Digital',
            'https://ayup.agency',
            'info@ayup.agency'
        );

        $info = Info::create('Core API Specification', 'v1')
            ->description('For using the Core Example App API')
            ->contact($contact);

        $listAudits = Operation::create(Operation::GET)
            ->summary('List all audits')
            ->operationId('audits.index');
        $createAudit = Operation::create(Operation::POST)
            ->summary('Create an audit')
            ->operationId('audits.store');
        $readAudit = Operation::create(Operation::GET)->summary('View an audit')
            ->operationId('audits.show');

        $paths = Paths::create(
            PathItem::create('/audits', $listAudits, $createAudit),
            PathItem::create('/audits/{audit}', $readAudit)
        );

        $servers = [
            Server::create('https://api.example.com/v1'),
            Server::create('https://api.example.com/v2'),
        ];

        $security = ['OAuth2' => []];

        $tags = [
            Tag::create('Audits')->description('All the audits'),
        ];

        $externalDocs = ExternalDocs::create('https://github.com/RoyalBoroughKingston/cwk-api/wiki')
            ->description('GitHub Wiki');

        $openApi = OpenApi::create(OpenApi::VERSION_3_0_1, $info, $paths)
            ->servers(...$servers)
            ->security($security)
            ->tags(...$tags)
            ->externalDocs($externalDocs);

        var_dump($openApi->toJson());
    }
}
