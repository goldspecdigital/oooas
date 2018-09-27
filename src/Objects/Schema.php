<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class Schema extends BaseObject
{
    /*
     * Types.
     */
    const ARRAY = 'array';
    const BOOLEAN = 'boolean';
    const INTEGER = 'integer';
    const NUMBER = 'number';
    const OBJECT = 'object';
    const STRING = 'string';

    /*
     * Formats.
     */
    const INT32 = 'int32';
    const INT64 = 'int64';
    const FLOAT = 'float';
    const DOUBLE = 'double';
    const BYTE = 'byte';
    const BINARY = 'binary';
    const DATE = 'date';
    const DATE_TIME = 'date-time';
    const PASSWORD = 'password';
    const UUID = 'uuid';

    /**
     * @var string|null;
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string[]|null
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
     * @var string
     */
    protected $type;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null
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
     * @var bool|null
     */
    protected $required;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null
     */
    protected $properties;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null
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
     * @param string $type
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function create(string $type, string $name = null): self
    {
        $instance = new static();

        $instance->type = $type;
        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function array(string $name = null): self
    {
        return static::create(static::ARRAY, $name);
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function boolean(string $name = null): self
    {
        return static::create(static::BOOLEAN, $name);
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function integer(string $name = null): self
    {
        return static::create(static::INTEGER, $name);
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function number(string $name = null): self
    {
        return static::create(static::NUMBER, $name);
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function object(string $name = null): self
    {
        return static::create(static::OBJECT, $name);
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function string(string $name = null): self
    {
        return static::create(static::STRING, $name);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $properties = [];
        foreach ($this->properties ?? [] as $property) {
            $properties[$property->getName()] = $property->toArray();
        }

        $additionalProperties = [];
        foreach ($this->additionalProperties ?? [] as $additionalProperty) {
            $additionalProperties[$additionalProperty->getName()] = $additionalProperty->toArray();
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
            'additionalProperties' => $additionalProperties ?: null,
            'maxProperties' => $this->maxProperties,
            'minProperties' => $this->minProperties,
        ]);
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $title
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function title(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function description(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param mixed[] $enum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function enum(...$enum): self
    {
        $this->enum = $enum ?: null;

        return $this;
    }

    /**
     * @param mixed $default
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function default($default): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @param null|string $format
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function format(?string $format): self
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @param string $type
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function type(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[] $items
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function items(Schema ...$items): self
    {
        $this->items = $items ?: null;

        return $this;
    }

    /**
     * @param int|null $maxItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maxItems(?int $maxItems): self
    {
        $this->maximum = $maxItems;

        return $this;
    }

    /**
     * @param int|null $minItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minItems(?int $minItems): self
    {
        $this->maximum = $minItems;

        return $this;
    }

    /**
     * @param bool $uniqueItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function uniqueItems(bool $uniqueItems = true): self
    {
        $this->uniqueItems = $uniqueItems;
        
        return $this;
    }

    /**
     * @param null|string $pattern
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function pattern(?string $pattern): self
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * @param int|null $maxLength
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maxLength(?int $maxLength): self
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * @param int|null $minLength
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minLength(?int $minLength): self
    {
        $this->minLength = $minLength;

        return $this;
    }

    /**
     * @param int|null $maximum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maximum(?int $maximum): self
    {
        $this->maximum = $maximum;

        return $this;
    }

    /**
     * @param int|null $exclusiveMaximum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function exclusiveMaximum(?int $exclusiveMaximum): self
    {
        $this->exclusiveMaximum = $exclusiveMaximum;

        return $this;
    }

    /**
     * @param int|null $minimum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minimum(?int $minimum): self
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * @param int|null $exclusiveMinimum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function exclusiveMinimum(?int $exclusiveMinimum): self
    {
        $this->exclusiveMinimum = $exclusiveMinimum;

        return $this;
    }

    /**
     * @param int|null $multipleOf
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function multipleOf(?int $multipleOf): self
    {
        $this->multipleOf = $multipleOf;

        return $this;
    }

    /**
     * @param bool $required
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function required(bool $required = true): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[] $properties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function properties(Schema ...$properties): self
    {
        $this->properties = $properties ?: null;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[] $additionalProperties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function additionalProperties(Schema ...$additionalProperties): self
    {
        $this->additionalProperties = $additionalProperties ?: null;

        return $this;
    }

    /**
     * @param int|null $maxProperties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maxProperties(?int $maxProperties): self
    {
        $this->maxProperties = $maxProperties;

        return $this;
    }

    /**
     * @param int|null $minProperties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minProperties(?int $minProperties): self
    {
        $this->minProperties = $minProperties;

        return $this;
    }
}
