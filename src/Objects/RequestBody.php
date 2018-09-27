<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class RequestBody extends BaseObject
{
    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    protected $content;

    /**
     * @var bool|null
     */
    protected $required;

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType $content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody
     */
    public static function create(MediaType $content): self
    {
        $instance = new static();

        $instance->content = $content;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'description' => $this->description,
            'content' => [$this->content->getMediaType() => $this->content],
            'required' => $this->required,
        ]);
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody
     */
    public function description(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType $content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody
     */
    public function content(MediaType $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param bool $required
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody
     */
    public function required(bool $required = true): self
    {
        $this->required = $required;

        return $this;
    }
}
