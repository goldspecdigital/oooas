<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $title
 * @property string|null $description
 * @property mixed[]|null $enum
 * @property mixed|null $default
 * @property string|null $format
 * @property string|null $type
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null $items
 * @property int|null $maxItems
 * @property int|null $minItems
 * @property bool|null $uniqueItems
 * @property string|null $pattern
 * @property int|null $maxLength
 * @property int|null $minLength
 * @property int|null $maximum
 * @property int|null $exclusiveMaximum
 * @property int|null $minimum
 * @property int|null $exclusiveMinimum
 * @property int|null $multipleOf
 * @property string[]|null $required
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null $properties
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $additionalProperties
 * @property int|null $maxProperties
 * @property int|null $minProperties
 * @property bool|null $nullable
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Discriminator|null $discriminator
 * @property bool|null $readOnly
 * @property bool|null $writeOnly
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Xml|null $xml
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null $externalDocs
 * @property mixed|null $example
 * @property bool|null $deprecated
 */
class Schema extends BaseObject implements SchemaContract
{
    const TYPE_ARRAY = 'array';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_INTEGER = 'integer';
    const TYPE_NUMBER = 'number';
    const TYPE_OBJECT = 'object';
    const TYPE_STRING = 'string';

    const FORMAT_INT32 = 'int32';
    const FORMAT_INT64 = 'int64';
    const FORMAT_FLOAT = 'float';
    const FORMAT_DOUBLE = 'double';
    const FORMAT_BYTE = 'byte';
    const FORMAT_BINARY = 'binary';
    const FORMAT_DATE = 'date';
    const FORMAT_DATE_TIME = 'date-time';
    const FORMAT_PASSWORD = 'password';
    const FORMAT_UUID = 'uuid';

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var mixed[]|null
     */
    protected $enum;

    /**
     * @var mixed|null
     */
    protected $default;

    /**
     * @var string|null
     */
    protected $format;

    /**
     * @var string|null
     */
    protected $type;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null
     */
    protected $items;

    /**
     * @var int|null
     */
    protected $maxItems;

    /**
     * @var int|null
     */
    protected $minItems;

    /**
     * @var bool|null
     */
    protected $uniqueItems;

    /**
     * @var string|null
     */
    protected $pattern;

    /**
     * @var int|null
     */
    protected $maxLength;

    /**
     * @var int|null
     */
    protected $minLength;

    /**
     * @var int|null
     */
    protected $maximum;

    /**
     * @var int|null
     */
    protected $exclusiveMaximum;

    /**
     * @var int|null
     */
    protected $minimum;

    /**
     * @var int|null
     */
    protected $exclusiveMinimum;

    /**
     * @var int|null
     */
    protected $multipleOf;

    /**
     * @var string[]|null
     */
    protected $required;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null
     */
    protected $properties;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null
     */
    protected $additionalProperties;

    /**
     * @var int|null
     */
    protected $maxProperties;

    /**
     * @var int|null
     */
    protected $minProperties;

    /**
     * @var bool|null
     */
    protected $nullable;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Discriminator|null
     */
    protected $discriminator;

    /**
     * @var bool|null
     */
    protected $readOnly;

    /**
     * @var bool|null
     */
    protected $writeOnly;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Xml|null
     */
    protected $xml;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null
     */
    protected $externalDocs;

    /**
     * @var mixed|null
     */
    protected $example;

    /**
     * @var bool|null
     */
    protected $deprecated;

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function array(string $objectId = null): self
    {
        return static::create($objectId)->type(static::TYPE_ARRAY);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function boolean(string $objectId = null): self
    {
        return static::create($objectId)->type(static::TYPE_BOOLEAN);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function integer(string $objectId = null): self
    {
        return static::create($objectId)->type(static::TYPE_INTEGER);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function number(string $objectId = null): self
    {
        return static::create($objectId)->type(static::TYPE_NUMBER);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function object(string $objectId = null): self
    {
        return static::create($objectId)->type(static::TYPE_OBJECT);
    }

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function string(string $objectId = null): self
    {
        return static::create($objectId)->type(static::TYPE_STRING);
    }

    /**
     * @param string|null $title
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function title(?string $title): self
    {
        $instance = clone $this;

        $instance->title = $title;

        return $instance;
    }

    /**
     * @param string|null $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param mixed[] $enum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function enum(...$enum): self
    {
        $instance = clone $this;

        $instance->enum = $enum ?: null;

        return $instance;
    }

    /**
     * @param mixed|null $default
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function default($default): self
    {
        $instance = clone $this;

        $instance->default = $default;

        return $instance;
    }

    /**
     * @param string|null $format
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function format(?string $format): self
    {
        $instance = clone $this;

        $instance->format = $format;

        return $instance;
    }

    /**
     * @param string|null $type
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function type(?string $type): self
    {
        $instance = clone $this;

        $instance->type = $type;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract $items
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function items(SchemaContract $items): self
    {
        $instance = clone $this;

        $instance->items = $items;

        return $instance;
    }

    /**
     * @param int|null $maxItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maxItems(?int $maxItems): self
    {
        $instance = clone $this;

        $instance->maxItems = $maxItems;

        return $instance;
    }

    /**
     * @param int|null $minItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minItems(?int $minItems): self
    {
        $instance = clone $this;

        $instance->minItems = $minItems;

        return $instance;
    }

    /**
     * @param bool|null $uniqueItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function uniqueItems(?bool $uniqueItems = true): self
    {
        $instance = clone $this;

        $instance->uniqueItems = $uniqueItems;

        return $instance;
    }

    /**
     * @param string|null $pattern
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function pattern(?string $pattern): self
    {
        $instance = clone $this;

        $instance->pattern = $pattern;

        return $instance;
    }

    /**
     * @param int|null $maxLength
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maxLength(?int $maxLength): self
    {
        $instance = clone $this;

        $instance->maxLength = $maxLength;

        return $instance;
    }

    /**
     * @param int|null $minLength
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minLength(?int $minLength): self
    {
        $instance = clone $this;

        $instance->minLength = $minLength;

        return $instance;
    }

    /**
     * @param int|null $maximum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maximum(?int $maximum): self
    {
        $instance = clone $this;

        $instance->maximum = $maximum;

        return $instance;
    }

    /**
     * @param int|null $exclusiveMaximum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function exclusiveMaximum(?int $exclusiveMaximum): self
    {
        $instance = clone $this;

        $instance->exclusiveMaximum = $exclusiveMaximum;

        return $instance;
    }

    /**
     * @param int|null $minimum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minimum(?int $minimum): self
    {
        $instance = clone $this;

        $instance->minimum = $minimum;

        return $instance;
    }

    /**
     * @param int|null $exclusiveMinimum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function exclusiveMinimum(?int $exclusiveMinimum): self
    {
        $instance = clone $this;

        $instance->exclusiveMinimum = $exclusiveMinimum;

        return $instance;
    }

    /**
     * @param int|null $multipleOf
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function multipleOf(?int $multipleOf): self
    {
        $instance = clone $this;

        $instance->multipleOf = $multipleOf;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|string[] $required
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function required(...$required): self
    {
        // Only allow Schema instances and strings.
        foreach ($required as &$require) {
            // If a Schema instance was passed in then extract it's name string.
            if ($require instanceof Schema) {
                $require = $require->objectId;
                continue;
            }

            if (is_string($require)) {
                continue;
            }

            throw new InvalidArgumentException();
        }

        $instance = clone $this;

        $instance->required = $required ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[] $properties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function properties(Schema ...$properties): self
    {
        $instance = clone $this;

        $instance->properties = $properties ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $additionalProperties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function additionalProperties(?Schema $additionalProperties): self
    {
        $instance = clone $this;

        $instance->additionalProperties = $additionalProperties;

        return $instance;
    }

    /**
     * @param int|null $maxProperties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maxProperties(?int $maxProperties): self
    {
        $instance = clone $this;

        $instance->maxProperties = $maxProperties;

        return $instance;
    }

    /**
     * @param int|null $minProperties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minProperties(?int $minProperties): self
    {
        $instance = clone $this;

        $instance->minProperties = $minProperties;

        return $instance;
    }

    /**
     * @param bool|null $nullable
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function nullable(?bool $nullable = true): self
    {
        $instance = clone $this;

        $instance->nullable = $nullable;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Discriminator|null $discriminator
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function discriminator(?Discriminator $discriminator): self
    {
        $instance = clone $this;

        $instance->discriminator = $discriminator;

        return $instance;
    }

    /**
     * @param bool|null $readOnly
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function readOnly(?bool $readOnly = true): self
    {
        $instance = clone $this;

        $instance->readOnly = $readOnly;

        return $instance;
    }

    /**
     * @param bool|null $writeOnly
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function writeOnly(?bool $writeOnly = true): self
    {
        $instance = clone $this;

        $instance->writeOnly = $writeOnly;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Xml|null $xml
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function xml(?Xml $xml): self
    {
        $instance = clone $this;

        $instance->xml = $xml;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null $externalDocs
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function externalDocs(?ExternalDocs $externalDocs): self
    {
        $instance = clone $this;

        $instance->externalDocs = $externalDocs;

        return $instance;
    }

    /**
     * @param mixed|null $example
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function example($example): self
    {
        $instance = clone $this;

        $instance->example = $example;

        return $instance;
    }

    /**
     * @param bool|null $deprecated
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function deprecated(?bool $deprecated = true): self
    {
        $instance = clone $this;

        $instance->deprecated = $deprecated;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $properties = [];
        foreach ($this->properties ?? [] as $property) {
            $properties[$property->objectId] = $property->toArray();
        }

        return Arr::filter([
            'title' => $this->title,
            'description' => $this->description,
            'enum' => $this->enum,
            'default' => $this->default,
            'format' => $this->format,
            'type' => $this->type,
            'items' => $this->items,
            'maxItems' => $this->maxItems,
            'minItems' => $this->minItems,
            'uniqueItems' => $this->uniqueItems,
            'pattern' => $this->pattern,
            'maxLength' => $this->maxLength,
            'minLength' => $this->minLength,
            'maximum' => $this->maximum,
            'exclusiveMaximum' => $this->exclusiveMaximum,
            'minimum' => $this->minimum,
            'exclusiveMinimum' => $this->exclusiveMinimum,
            'multipleOf' => $this->multipleOf,
            'required' => $this->required,
            'properties' => $properties ?: null,
            'additionalProperties' => $this->additionalProperties,
            'maxProperties' => $this->maxProperties,
            'minProperties' => $this->minProperties,
            'nullable' => $this->nullable,
            'discriminator' => $this->discriminator,
            'readOnly' => $this->readOnly,
            'writeOnly' => $this->writeOnly,
            'xml' => $this->xml,
            'externalDocs' => $this->externalDocs,
            'example' => $this->example,
            'deprecated' => $this->deprecated,
        ]);
    }
}
