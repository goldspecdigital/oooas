<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $mediaType
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Example[]|null $examples
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Example|null $example
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding[]|null $encoding
 */
class MediaType extends BaseObject
{
    const MEDIA_TYPE_APPLICATION_JSON = 'application/json';
    const MEDIA_TYPE_APPLICATION_PDF = 'application/pdf';
    const MEDIA_TYPE_IMAGE_JPEG = 'image/jpeg';
    const MEDIA_TYPE_IMAGE_PNG = 'image/png';
    const MEDIA_TYPE_TEXT_CALENDAR = 'text/calendar';
    const MEDIA_TYPE_TEXT_PLAIN = 'text/plain';
    const MEDIA_TYPE_TEXT_XML = 'text/xml';

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
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Example[]|null
     */
    protected $examples;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding[]|null
     */
    protected $encoding;

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
        return static::create(static::MEDIA_TYPE_APPLICATION_JSON, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function pdf(SchemaContract $schema = null): self
    {
        return static::create(static::MEDIA_TYPE_APPLICATION_PDF, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function jpeg(SchemaContract $schema = null): self
    {
        return static::create(static::MEDIA_TYPE_IMAGE_JPEG, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function png(SchemaContract $schema = null): self
    {
        return static::create(static::MEDIA_TYPE_IMAGE_PNG, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function calendar(SchemaContract $schema = null): self
    {
        return static::create(static::MEDIA_TYPE_TEXT_CALENDAR, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function plainText(SchemaContract $schema = null): self
    {
        return static::create(static::MEDIA_TYPE_TEXT_PLAIN, $schema);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function xml(SchemaContract $schema = null): self
    {
        return static::create(static::MEDIA_TYPE_TEXT_XML, $schema);
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
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Example[]|null $examples
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public function examples(Example ...$examples): self
    {
        $instance = clone $this;

        $instance->examples = $examples ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding[] $encoding
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public function encoding(Encoding ...$encoding): self
    {
        $instance = clone $this;

        $instance->encoding = $encoding ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $examples = [];
        foreach ($this->examples ?? [] as $example) {
            $examples[$example->name] = $example->toArray();
        }

        $encodings = [];
        foreach ($this->encoding ?? [] as $encoding) {
            $encodings[$encoding->name] = $encoding->toArray();
        }

        return Arr::filter([
            'schema' => $this->schema,
            'example' => $this->example,
            'examples' => $examples ?: null,
            'encoding' => $encodings ?: null,
        ]);
    }
}
