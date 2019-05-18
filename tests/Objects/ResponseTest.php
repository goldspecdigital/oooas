<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class ResponseTest extends TestCase
{
    /** @test */
    public function create_with_required_parameters_works()
    {
        $response = Response::create(
            200,
            'OK',
            MediaType::json()
        );

        $this->assertEquals(
            [
                'description' => 'OK',
                'content' => [
                    'application/json' => [],
                ],
            ],
            $response->toArray()
        );
    }

    /** @test */
    public function create_with_ok_method_works()
    {
        $response = Response::ok();

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals('OK', $response->description);
    }

    /** @test */
    public function create_with_created_method_works()
    {
        $response = Response::created();

        $this->assertEquals(201, $response->statusCode);
        $this->assertEquals('Created', $response->description);
    }

    /** @test */
    public function create_with_movedPermanently_method_works()
    {
        $response = Response::movedPermanently();

        $this->assertEquals(301, $response->statusCode);
        $this->assertEquals('Moved Permanently', $response->description);
    }

    /** @test */
    public function create_with_movedTemporarily_method_works()
    {
        $response = Response::movedTemporarily();

        $this->assertEquals(302, $response->statusCode);
        $this->assertEquals('Moved Temporarily', $response->description);
    }

    /** @test */
    public function create_with_badRequest_method_works()
    {
        $response = Response::badRequest();

        $this->assertEquals(400, $response->statusCode);
        $this->assertEquals('Bad Request', $response->description);
    }

    /** @test */
    public function create_with_unauthorized_method_works()
    {
        $response = Response::unauthorized();

        $this->assertEquals(401, $response->statusCode);
        $this->assertEquals('Unauthorized', $response->description);
    }

    /** @test */
    public function create_with_notFound_method_works()
    {
        $response = Response::notFound();

        $this->assertEquals(404, $response->statusCode);
        $this->assertEquals('Not Found', $response->description);
    }

    /** @test */
    public function create_with_unprocessableEntity_method_works()
    {
        $response = Response::unprocessableEntity();

        $this->assertEquals(422, $response->statusCode);
        $this->assertEquals('Unprocessable Entity', $response->description);
    }

    /** @test */
    public function create_with_tooManyRequests_method_works()
    {
        $response = Response::tooManyRequests();

        $this->assertEquals(429, $response->statusCode);
        $this->assertEquals('Too Many Requests', $response->description);
    }

    /** @test */
    public function create_with_internalServerError_method_works()
    {
        $response = Response::internalServerError();

        $this->assertEquals(500, $response->statusCode);
        $this->assertEquals('Internal Server Error', $response->description);
    }
}
