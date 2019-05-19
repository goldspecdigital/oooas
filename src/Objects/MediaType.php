<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $mediaType
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Example|null $example
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Example[]|null $examples
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
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function json(string $objectId = null): self
    {
        return static::create($objectId)
            ->mediaType(static::MEDIA_TYPE_APPLICATION_JSON);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function pdf(string $objectId = null): self
    {
        return static::create($objectId)
            ->mediaType(static::MEDIA_TYPE_APPLICATION_PDF);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function jpeg(string $objectId = null): self
    {
        return static::create($objectId)
            ->mediaType(static::MEDIA_TYPE_IMAGE_JPEG);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function png(string $objectId = null): self
    {
        return static::create($objectId)
            ->mediaType(static::MEDIA_TYPE_IMAGE_PNG);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function calendar(string $objectId = null): self
    {
        return static::create($objectId)
            ->mediaType(static::MEDIA_TYPE_TEXT_CALENDAR);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function plainText(string $objectId = null): self
    {
        return static::create($objectId)
            ->mediaType(static::MEDIA_TYPE_TEXT_PLAIN);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType
     */
    public static function xml(string $objectId = null): self
    {
        return static::create($objectId)
            ->mediaType(static::MEDIA_TYPE_TEXT_XML);
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
            $examples[$example->objectId] = $example->toArray();
        }

        $encodings = [];
        foreach ($this->encoding ?? [] as $encoding) {
            $encodings[$encoding->objectId] = $encoding->toArray();
        }

        return Arr::filter([
            'schema' => $this->schema,
            'example' => $this->example,
            'examples' => $examples ?: null,
            'encoding' => $encodings ?: null,
        ]);
    }
}
