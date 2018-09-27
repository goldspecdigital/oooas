<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class MediaType extends BaseObject
{
    const APPLICATION_JSON = 'application/json';
    const TEXT_CALENDAR = 'text/calendar';
    const TEXT_PLAIN = 'text/plain';
    const TEXT_XML = 'text/xml';

    /**
     * @var string
     */
    protected $mediaType;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    protected $schema;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Example|null
     */
    protected $example;

    /**
     * @param string $mediaType
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function create(string $mediaType, Schema $schema): self
    {
        $instance = new static();

        $instance->mediaType = $mediaType;
        $instance->schema = $schema;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function json(Schema $schema): self
    {
        return static::create(static::APPLICATION_JSON, $schema);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'schema' => $this->schema,
            'example' => $this->example,
        ]);
    }

    /**
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @param string $mediaType
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public function mediaType(string $mediaType): self
    {
        $instance = clone $this;

        $instance->mediaType = $mediaType;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public function schema(Schema $schema): self
    {
        $instance = clone $this;

        $instance->schema = $schema;

        return $instance;
    }
}
