<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property int $statusCode
 * @property string $description
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[] $content
 */
class Response extends BaseObject
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[]
     */
    protected $content;

    /**
     * @param int $statusCode
     * @param string $description
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function create(int $statusCode, string $description, MediaType ...$content): self
    {
        $instance = new static();

        $instance->statusCode = $statusCode;
        $instance->description = $description;
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
        ]);
    }

    /**
     * @param int $statusCode
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public function statusCode(int $statusCode): self
    {
        $instance = clone $this;

        $instance->statusCode = $statusCode;

        return $instance;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public function content(MediaType ...$content): self
    {
        $instance = clone $this;

        $instance->content = $content ?: null;

        return $instance;
    }
}
