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
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement[]|null $security
 * @property bool|null $noSecurity
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[]|null $servers
 */
class Operation extends BaseObject
{
    const ACTION_GET = 'get';
    const ACTION_PUT = 'put';
    const ACTION_POST = 'post';
    const ACTION_DELETE = 'delete';
    const ACTION_OPTIONS = 'options';
    const ACTION_HEAD = 'head';
    const ACTION_PATCH = 'patch';
    const ACTION_TRACE = 'trace';

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
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement[]|null
     */
    protected $security;

    /**
     * @var bool|null
     */
    protected $noSecurity;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[]|null
     */
    protected $servers;

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function get(string $objectId = null): self
    {
        return static::create($objectId)->action(static::ACTION_GET);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function put(string $objectId = null): self
    {
        return static::create($objectId)->action(static::ACTION_PUT);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function post(string $objectId = null): self
    {
        return static::create($objectId)->action(static::ACTION_POST);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function delete(string $objectId = null): self
    {
        return static::create($objectId)->action(static::ACTION_DELETE);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function head(string $objectId = null): self
    {
        return static::create($objectId)->action(static::ACTION_HEAD);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function patch(string $objectId = null): self
    {
        return static::create($objectId)->action(static::ACTION_PATCH);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function trace(string $objectId = null): self
    {
        return static::create($objectId)->action(static::ACTION_TRACE);
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
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
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
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement[]|null $security
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function security(SecurityRequirement ...$security): self
    {
        $instance = clone $this;

        $instance->security = $security ?: null;
        $instance->noSecurity = null;

        return $instance;
    }

    /**
     * @param bool|null $noSecurity
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function noSecurity(?bool $noSecurity = true): self
    {
        $instance = clone $this;

        $instance->noSecurity = $noSecurity;

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
    protected function generate(): array
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
            'security' => $this->noSecurity ? [] : $this->security,
            'servers' => $this->servers,
        ]);
    }
}
