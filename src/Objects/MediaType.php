<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $mediaType
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Example|null $example
 */
class MediaType extends BaseObject
{
    const APPLICATION_JSON = 'application/json';
    const APPLICATION_PDF = 'application/pdf';
    const IMAGE_JPEG = 'image/jpeg';
    const IMAGE_PNG = 'image/png';
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
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function create(string $mediaType = null, SchemaContract $schema = null): self
    {
        $instance = new static();

        $instance->mediaType = $mediaType;
        $instance->schema = $schema;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function json(SchemaContract $schema = null): self
    {
        return static::create(static::APPLICATION_JSON, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function pdf(SchemaContract $schema = null): self
    {
        return static::create(static::APPLICATION_PDF, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function jpeg(SchemaContract $schema = null): self
    {
        return static::create(static::IMAGE_JPEG, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function png(SchemaContract $schema = null): self
    {
        return static::create(static::IMAGE_PNG, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function calendar(SchemaContract $schema = null): self
    {
        return static::create(static::TEXT_CALENDAR, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function plainText(SchemaContract $schema = null): self
    {
        return static::create(static::TEXT_PLAIN, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function xml(SchemaContract $schema = null): self
    {
        return static::create(static::TEXT_XML, $schema);
    }

    /**
     * @param string|null $mediaType
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public function mediaType(?string $mediaType): self
    {
        $instance = clone $this;

        $instance->mediaType = $mediaType;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public function schema(?SchemaContract $schema): self
    {
        $instance = clone $this;

        $instance->schema = $schema;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Example|null $example
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public function example(?Example $example): self
    {
        $instance = clone $this;

        $instance->example = $example;

        return $instance;
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
}
