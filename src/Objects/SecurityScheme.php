<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $objectId
 * @property string|null $type
 * @property string|null $description
 * @property string|null $name
 * @property string|null $in
 * @property string|null $scheme
 * @property string|null $bearerFormat
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\OAuthFlow[]|null $flows
 * @property string|null $openIdConnectUrl
 */
class SecurityScheme extends BaseObject
{
    const TYPE_API_KEY= 'apiKey';
    const TYPE_HTTP= 'http';
    const TYPE_OAUTH2 = 'oauth2';
    const TYPE_OPEN_ID_CONNECT= 'openIdConnect';

    const IN_QUERY = 'query';
    const IN_HEADER = 'header';
    const IN_COOKIE = 'cookie';

    /**
     * @var string|null
     */
    protected $objectId;

    /**
     * @var string|null
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $in;

    /**
     * @var string|null
     */
    protected $scheme;

    /**
     * @var string|null
     */
    protected $bearerFormat;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\OAuthFlow[]|null
     */
    protected $flows;

    /**
     * @var string|null
     */
    protected $openIdConnectUrl;

    /**
     * @param string|null $name
     * @param string|null $type
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public static function create(
        string $name = null,
        string $type = null
    ): self {
        $instance = new static();

        $instance->name = $name;
        $instance->type = $type;

        return $instance;
    }

    public function objectId(?string $objectId): self
    {
        $instance = clone $this;

        $instance->objectId = $objectId;

        return $instance;
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public static function oauth2(string $name = null): self
    {
        return static::create($name, static::TYPE_OAUTH2);
    }

    /**
     * @param string|null $type
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public function type(?string $type): self
    {
        $instance = clone $this;

        $instance->type = $type;

        return $instance;
    }

    /**
     * @param string|null $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public function name(?string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string|null $in
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public function in(?string $in): self
    {
        $instance = clone $this;

        $instance->in = $in;

        return $instance;
    }

    /**
     * @param string|null $scheme
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public function scheme(?string $scheme): self
    {
        $instance = clone $this;

        $instance->scheme = $scheme;

        return $instance;
    }

    /**
     * @param string|null $bearerFormat
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public function bearerFormat(?string $bearerFormat): self
    {
        $instance = clone $this;

        $instance->bearerFormat = $bearerFormat;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\OAuthFlow[] $flows
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public function flows(OAuthFlow ...$flows): self
    {
        $instance = clone $this;

        $instance->flows = $flows;

        return $instance;
    }

    /**
     * @param string|null $openIdConnectUrl
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public function openIdConnectUrl(?string $openIdConnectUrl): self
    {
        $instance = clone $this;

        $instance->openIdConnectUrl = $openIdConnectUrl;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $flows = [];
        foreach ($this->flows ?? [] as $flow) {
            $flows[$flow->flow] = $flow;
        }

        return Arr::filter([
            'type' => $this->type,
            'description' => $this->description,
            'name' => $this->name,
            'in' => $this->in,
            'scheme' => $this->scheme,
            'bearerFormat' => $this->bearerFormat,
            'flows' => $flows ?: null,
            'openIdConnectUrl' => $this->openIdConnectUrl,
        ]);
    }
}
