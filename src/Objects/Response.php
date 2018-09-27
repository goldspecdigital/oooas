<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

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
            $content[$contentItem->getMediaType()] = $contentItem;
        }

        return Arr::filter([
            'description' => $this->description,
            'content' => $content ?: null,
        ]);
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public function statusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public function description(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public function content(MediaType ...$content): self
    {
        $this->content = $content ?: null;

        return $this;
    }
}
