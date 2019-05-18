<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests;

use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
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
use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement;
use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Tag;
use GoldSpecDigital\ObjectOrientedOAS\OpenApi;

class MainTest extends TestCase
{
    /** @test */
    public function it_works()
    {
        // Create a tag.
        $tag = Tag::create()
            ->name('Audits')
            ->description('All the audits');

        // Factory creation method.
        $contact = Contact::create(
            'GoldSpec Digital',
            'https://goldspecdigital.com',
            'hello@goldspecdigital.com'
        );

        // Alternative method chaining creation method.
        $info = Info::create()
            ->title('API Specification')
            ->version('v1')
            ->description('For using the Example App API')
            ->contact($contact);

        // Create a schema object to be used where a schema is accepted.
        $exampleObject = Schema::object()
            ->properties(
                Schema::string('id')->format(Schema::UUID),
                Schema::string('created_at')->format(Schema::DATE_TIME),
                Schema::integer('age')->example(60),
                Schema::array('data')->items(
                    AllOf::create(
                        Schema::string('id')->format(Schema::UUID)
                    )
                )
            )
            ->required('id', 'created_at');

        // A response to be returned from a route.
        $exampleResponse = Response::create()
            ->statusCode(200)
            ->description('OK')
            ->content(MediaType::json($exampleObject));

        // Create an operation for a route.
        $listAudits = Operation::get($exampleResponse)
            ->tags($tag)
            ->summary('List all audits')
            ->operationId('audits.index');

        // Create an operation for a route.
        $createAudit = Operation::post($exampleResponse)
            ->tags($tag)
            ->summary('Create an audit')
            ->operationId('audits.store')
            ->requestBody(RequestBody::create(
                MediaType::json($exampleObject)
            ));

        // Create parameter schemas.
        $auditId = Schema::string()
            ->name('audit')
            ->format(Schema::UUID);
        $format = Schema::string()
            ->name('format')
            ->enum('json', 'ics')
            ->default('json');

        // Create an operation for a route.
        $readAudit = Operation::get($exampleResponse)
            ->tags($tag)
            ->summary('View an audit')
            ->operationId('audits.show')
            ->parameters(
                Parameter::path()
                    ->name('audit')
                    ->schema($auditId)
                    ->required(),
                Parameter::query()
                    ->name('format')
                    ->schema($format)
                    ->description('The format of the appointments')
            );

        // Specify the paths supported by the API.
        $paths = Paths::create(
            // Create a path along with it's operations.
            PathItem::create()
                ->route('/audits')
                ->operations($listAudits, $createAudit),
            PathItem::create()
                ->route('/audits/{audit}')
                ->operations($readAudit)
        );

        // Specify the server endpoints.
        $servers = [
            Server::create('https://api.example.com/v1'),
            Server::create('https://api.example.com/v2'),
        ];

        // Create a security scheme component.
        $components = Components::create()->securitySchemes(
            SecurityScheme::oauth2('OAuth2', [
                'password' => [
                    'tokenUrl' => 'https://api.example.com/oauth/authorize',
                ],
            ])
        );

        // Specify the security.
        $security = SecurityRequirement::create()
            ->name('OAuth2');

        // Specify external documentatino for the API.
        $externalDocs = ExternalDocs::create('https://github.com/goldspecdigital/oooas')
            ->description('GitHub Wiki');

        // Create the main OpenAPI object composed off everything created above.
        $openApi = OpenApi::create()
            ->version(OpenApi::VERSION_3_0_1)
            ->info($info)
            ->paths($paths)
            ->servers(...$servers)
            ->components($components)
            ->security($security)
            ->tags($tag)
            ->externalDocs($externalDocs);

        $exampleResponse = file_get_contents(realpath(__DIR__) . '/storage/example_response.json');

        $this->assertEquals(
            json_decode($exampleResponse, true),
            $openApi->toArray()
        );
    }

    /** @test */
    public function the_readme_example_works()
    {
        // Create a tag for all the user endpoints.
        $usersTag = Tag::create()
            ->name('Users')
            ->description('All user related endpoints');

        // Create the info section.
        $info = Info::create()
            ->title('API Specification')
            ->version('v1')
            ->description('For using the Example App API');

        // Create the user schema.
        $userSchema = Schema::object()
            ->properties(
                Schema::string('id')->format(Schema::UUID),
                Schema::string('name'),
                Schema::integer('age')->example(23),
                Schema::string('created_at')->format(Schema::DATE_TIME)
            );

        // Create the user response.
        $userResponse = Response::create()
            ->statusCode(200)
            ->description('OK')
            ->content(MediaType::json($userSchema));

        // Create the operation for the route (i.e. GET, POST, etc.).
        $showUser = Operation::get()
            ->responses($userResponse)
            ->tags($usersTag)
            ->summary('Get an individual user')
            ->operationId('users.show');

        // Define the /users path along with the supported operations.
        $userPaths = PathItem::create()
            ->route('/users')
            ->operations($showUser);

        // Define all of the paths supported by the API.
        $paths = Paths::create()
            ->pathItems($userPaths);

        // Create the main OpenAPI object composed off everything created above.
        $openApi = OpenApi::create()
            ->version(OpenApi::VERSION_3_0_1)
            ->info($info)
            ->paths($paths)
            ->tags($usersTag);

        $readmeExample = file_get_contents(realpath(__DIR__) . '/storage/readme_example.json');

        $this->assertEquals(
            json_decode($readmeExample, true),
            $openApi->toArray()
        );
    }
}
