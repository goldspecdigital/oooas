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
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function ok(MediaType ...$content): self
    {
        return static::create(200, 'OK', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function created(MediaType ...$content): self
    {
        return static::create(201, 'Created', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function movedPermanently(MediaType ...$content): self
    {
        return static::create(301, 'Moved Permanently', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function movedTemporarily(MediaType ...$content): self
    {
        return static::create(302, 'Moved Temporarily', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function badRequest(MediaType ...$content): self
    {
        return static::create(400, 'Bad Request', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function unauthorized(MediaType ...$content): self
    {
        return static::create(401, 'Unauthorized', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function forbidden(MediaType ...$content): self
    {
        return static::create(403, 'Forbidden', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function notFound(MediaType ...$content): self
    {
        return static::create(404, 'Not Found', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function unprocessableEntity(MediaType ...$content): self
    {
        return static::create(422, 'Unprocessable Entity', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function tooManyRequests(MediaType ...$content): self
    {
        return static::create(429, 'Too Many Requests', ...$content);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType ...$content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Response
     */
    public static function internalServerError(MediaType ...$content): self
    {
        return static::create(500, 'Internal Server Error', ...$content);
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
