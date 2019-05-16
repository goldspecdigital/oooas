<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $mediaType
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Example|null $example
 */
class MediaType extends BaseObject
{
    const APPLICATION_JSON = 'application/json';
    const TEXT_CALENDAR = 'text/calendar';
    const TEXT_PLAIN = 'text/plain';
    const TEXT_XML = 'text/xml';

    /**
     * @var string|null
     */
    protected $mediaType;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null
     */
    protected $schema;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Example|null
     */
    protected $example;

    /**
     * @param string|null $mediaType
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function create(string $mediaType = null, Schema $schema = null): self
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
