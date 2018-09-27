<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $description
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[] $content
 * @property bool|null $required
 */
class RequestBody extends BaseObject
{
    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[]
     */
    protected $content;

    /**
     * @var bool|null
     */
    protected $required;

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[] $content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody
     */
    public static function create(MediaType ...$content): self
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
        $content = [];
        foreach ($this->content ?? [] as $contentItem) {
            $content[$contentItem->mediaType] = $contentItem;
        }

        return Arr::filter([
            'description' => $this->description,
            'content' => $content ?: null,
            'required' => $this->required,
        ]);
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[] $content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody
     */
    public function content(MediaType ...$content): self
    {
        $instance = clone $this;

        $instance->content = count($content) > 1 ? $content : null;

        return $instance;
    }

    /**
     * @param bool $required
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody
     */
    public function required(bool $required = true): self
    {
        $instance = clone $this;

        $instance->required = $required;

        return $instance;
    }
}
