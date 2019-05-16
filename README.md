<p align="center">
    <img src="https://svgshare.com/i/D7e.svg" width="400px">
</p>

<p align="center">
    <a href="https://travis-ci.com/goldspecdigital/oooas"><img src="https://travis-ci.com/goldspecdigital/oooas.svg?branch=master" alt="Build Status"></a>
</p>

## Introduction

An object oriented implementation in PHP for generating OpenAPI docs.

## Installing

You can install the package via composer:
```bash
composer require goldspecdigital/oooas
```

## Example

See the code sample below for the most basic usage:

```php
use GoldSpecDigital\ObjectOrientedOAS\Objects\Components;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Contact;
use GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Info;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Operation;
use GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Paths;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Tag;
use GoldSpecDigital\ObjectOrientedOAS\OpenApi;

// Create a tag.
$tag = Tag::create()
    ->name('Audits')
    ->description('Audit logs for all actions');

// Factory creation method (optional parameters are required for the OpenAPI spec).
$contact = Contact::create(
    'GoldSpec Digital',
    'https://goldspecdigital.com',
    'hello@goldspecdigital.com'
);

/*
 * Alternative method chaining creation method (you can provide the required 
 * OpenAPI parameters later).
 */
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
            Schema::string('id')->format(Schema::UUID)
        )
    )
    ->required('id', 'created_at');
    
// A response to be returned from a route.
$exampleResponse = Response::create()
    ->statusCode(200)
    ->description('OK')
    ->content(MediaType::json($exampleObject));
    
// Create an operation for a route.
$listAudits = Operation::get()
    ->responses($exampleResponse)
    ->tags($tag)
    ->summary('List all audits')
    ->operationId('audits.index');
    
// Specify the paths supported by the API.
$paths = Paths::create()
    ->pathItems(
        // Create a path along with it's operations.
        PathItem::create()
            ->route('/audits')
            ->operations($listAudits)
    );

// Specify the server endpoints.
$servers = [
    Server::create('https://api.example.com/v1'),
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
$security = ['OAuth2' => []];

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
    
header('Content-Type: application/json');
echo $openApi->toJson();
```

## Running the tests

To run the test suite you can use the following command:

```bash
# Code style tests.
php vendor/bin/phpcs

# Unit tests.
php vendor/bin/phpunit
```

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of 
conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, 
see the [tags on this repository](https://github.com/goldspecdigital/oooas/tags). 

## Authors

* [GoldSpec Digital](https://github.com/goldspecdigital)

See also the list of [contributors](https://github.com/goldspecdigital/oooas/contributors) 
who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) 
file for details.
