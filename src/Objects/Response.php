<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property int|null $statusCode
 * @property string|null $description
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[]|null $content
 */
class Response extends BaseObject
{
    /**
     * @var int|null
     */
    protected $statusCode;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[]|null
     */
    protected $content;

    /**
     * @param int|null $statusCode
     * @param string|null $description
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[] $content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function create(
        int $statusCode = null,
        string $description = null,
        MediaType ...$content
    ): self {
        $instance = new static();

        $instance->statusCode = $statusCode;
        $instance->description = $description;
        $instance->content = $content ?: null;

        return $instance;
    }

    /**
     * @param null|int $statusCode
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public function statusCode(?int $statusCode): self
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
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[] $content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public function content(MediaType ...$content): self
    {
        $instance = clone $this;

        $instance->content = $content ?: null;

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
}
