<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class Operation extends BaseObject
{
    const GET = 'get';
    const PUT = 'put';
    const POST = 'post';
    const DELETE = 'options';
    const HEAD = 'head';
    const PATCH = 'patch';

    /**
     * @var string
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

    protected $requestBody;
    protected $responses;

    /**
     * @var bool
     */
    protected $deprecated = false;

    protected $security;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[]|null
     */
    protected $servers;

    /**
     * @param string $action
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public static function create(string $action): self
    {
        $instance = new static();

        $instance->action = $action;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'tags' => $this->tags,
            'summary' => $this->summary,
            'description' => $this->description,
            'externalDocs' => $this->externalDocs,
            'operationId' => $this->operationId,
            'parameters' => $this->parameters,
            'requestBody' => $this->requestBody,
            'responses' => $this->responses,
            'deprecated' => $this->deprecated,
            'security' => $this->security,
            'servers' => $this->servers,
        ]);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function action(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag ...$tags
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function tags(Tag ...$tags): self
    {
        $this->tags = $tags ?: null;

        return $this;
    }

    /**
     * @param null|string $summary
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function summary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function description(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null $externalDocs
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function externalDocs(?ExternalDocs $externalDocs): self
    {
        $this->externalDocs = $externalDocs;

        return $this;
    }

    /**
     * @param null|string $operationId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function operationId(?string $operationId): self
    {
        $this->operationId = $operationId;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter ...$parameters
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function parameters(Parameter ...$parameters): self
    {
        $this->parameters = $parameters ?: null;

        return $this;
    }

    /**
     * @param bool $deprecated
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function deprecated(bool $deprecated = true): self
    {
        $this->deprecated = $deprecated;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Server ...$servers
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
     */
    public function servers(Server ...$servers): self
    {
        $this->servers = $servers ?: null;

        return $this;
    }
}
