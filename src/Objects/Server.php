<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class Server extends BaseObject
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @param string $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Server
     */
    public static function create(string $url): self
    {
        $instance = new static();

        $instance->url = $url;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'url' => $this->url,
            'description' => $this->description,
        ]);
    }

    /**
     * @param string $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Server
     */
    public function url(string $url): self
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
}
