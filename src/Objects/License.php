<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class License extends BaseObject
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * @param string $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\License
     */
    public static function create(string $name): self
    {
        $instance = new static();

        $instance->name = $name;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'name' => $this->name,
            'url' => $this->url,
        ]);
    }

    /**
     * @param string $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\License
     */
    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param null|string $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\License
     */
    public function url(?string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
