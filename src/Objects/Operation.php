<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $action
 * @property string[]|null $tags
 * @property string|null $summary
 * @property string|null $description
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null $externalDocs
 * @property string|null $operationId
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter[]|null $parameters
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody|null $requestBody
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[]|null $responses
 * @property bool|null $deprecated
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement|null $security
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[]|null $servers
 */
class Operation extends BaseObject
{
    const GET = 'get';
    const PUT = 'put';
    const POST = 'post';
    const DELETE = 'delete';
    const OPTIONS = 'options';
    const HEAD = 'head';
    const PATCH = 'patch';
    const TRACE = 'trace';

    /**
     * @var string|null
     */
    protected $action;

    /**
     * @var string[]|null
     */
    protected $tags;

    /**
     * @var string|null
     */
    protected $summary;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null
     */
    protected $externalDocs;

    /**
     * @var string|null
     */
    protected $operationId;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter[]|null
     */
    protected $parameters;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody|null
     */
    protected $requestBody;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[]|null
     */
    protected $responses;

    /**
     * @var bool|null
     */
    protected $deprecated;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement|null
     */
    protected $security;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[]|null
     */
    protected $servers;

    /**
     * @param string|null $action
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function create(string $action = null, Response ...$responses): self
    {
        $instance = new static();

        $instance->action = $action;
        $instance->responses = $responses ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function get(Response ...$responses): self
    {
        return static::create(static::GET, ...$responses);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function put(Response ...$responses): self
    {
        return static::create(static::PUT, ...$responses);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function post(Response ...$responses): self
    {
        return static::create(static::POST, ...$responses);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function delete(Response ...$responses): self
    {
        return static::create(static::DELETE, ...$responses);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function head(Response ...$responses): self
    {
        return static::create(static::HEAD, ...$responses);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function patch(Response ...$responses): self
    {
        return static::create(static::PATCH, ...$responses);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function trace(Response ...$responses): self
    {
        return static::create(static::TRACE, ...$responses);
    }

    /**
     * @param string|null $action
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function action(?string $action): self
    {
        $instance = clone $this;

        $instance->action = $action;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag[]|string[] $tags
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException
     */
    public function tags(...$tags): self
    {
        // Only allow Tag instances and strings.
        foreach ($tags as &$tag) {
            // If a Tag instance was passed in then extract it's name string.
            if ($tag instanceof Tag) {
                $tag = $tag->name;
                continue;
            }

            if (is_string($tag)) {
                continue;
            }

            throw new InvalidArgumentException();
        }

        $instance = clone $this;

        $instance->tags = $tags ?: null;

        return $instance;
    }

    /**
     * @param string|null $summary
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function summary(?string $summary): self
    {
        $instance = clone $this;

        $instance->summary = $summary;

        return $instance;
    }

    /**
     * @param string|null $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null $externalDocs
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function externalDocs(?ExternalDocs $externalDocs): self
    {
        $instance = clone $this;

        $instance->externalDocs = $externalDocs;

        return $instance;
    }

    /**
     * @param string|null $operationId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function operationId(?string $operationId): self
    {
        $instance = clone $this;

        $instance->operationId = $operationId;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter[] $parameters
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function parameters(Parameter ...$parameters): self
    {
        $instance = clone $this;

        $instance->parameters = $parameters ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody|null $requestBody
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function requestBody(?RequestBody $requestBody): self
    {
        $instance = clone $this;

        $instance->requestBody = $requestBody;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Response[] $responses
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function responses(Response ...$responses): self
    {
        $instance = clone $this;

        $instance->responses = $responses;

        return $instance;
    }

    /**
     * @param bool|null $deprecated
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function deprecated(?bool $deprecated = true): self
    {
        $instance = clone $this;

        $instance->deprecated = $deprecated;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement|null $security
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function security(?SecurityRequirement $security): self
    {
        $instance = clone $this;

        $instance->security = $security;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[] $servers
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function servers(Server ...$servers): self
    {
        $instance = clone $this;

        $instance->servers = $servers ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $responses = [];
        foreach ($this->responses ?? [] as $response) {
            $responses[$response->statusCode ?? 'default'] = $response;
        }

        return Arr::filter([
            'tags' => $this->tags,
            'summary' => $this->summary,
            'description' => $this->description,
            'externalDocs' => $this->externalDocs,
            'operationId' => $this->operationId,
            'parameters' => $this->parameters,
            'requestBody' => $this->requestBody,
            'responses' => $responses ?: null,
            'deprecated' => $this->deprecated,
            'security' => $this->security,
            'servers' => $this->servers,
        ]);
    }
}
