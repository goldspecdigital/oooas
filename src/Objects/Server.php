<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $url
 * @property string|null $description
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable[]|null $variables
 */
class Server extends BaseObject
{
    /**
     * @var string|null
     */
    protected $url;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable[]|null
     */
    protected $variables;

    /**
     * @param string|null $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Server
     */
    public static function create(string $url = null): self
    {
        $instance = new static();

        $instance->url = $url;

        return $instance;
    }

    /**
     * @param null|string $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Server
     */
    public function url(?string $url): self
    {
        $instance = clone $this;

        $instance->url = $url;

        return $instance;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Server
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable[] $variables
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Server
     */
    public function variables(ServerVariable ...$variables): self
    {
        $instance = clone $this;

        $instance->variables = $variables ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $variables = [];
        foreach ($this->variables ?? [] as $variable) {
            $variables[$variable->name] = $variable->toArray();
        }

        return Arr::filter([
            'url' => $this->url,
            'description' => $this->description,
            'variables' => $variables ?: null,
        ]);
    }
}
