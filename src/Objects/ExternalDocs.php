<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class ExternalDocs extends BaseObject
{
    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs
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
            'description' => $this->description,
            'url' => $this->url,
        ]);
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param string $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs
     */
    public function url(string $url): self
    {
        $instance = clone $this;

        $instance->url = $url;

        return $instance;
    }
}
