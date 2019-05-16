<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
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
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null $additionalProperties
 * @property int|null $maxProperties
 * @property int|null $minProperties
 * @property boolean|null $nullable
 * @property mixed|null $example
 */
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
     * @var string|null
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
     * @var string[]|null
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
     * @var boolean|null
     */
    protected $nullable;

    /**
     * @var mixed|null
     */
    protected $example;

    /**
     * @param string|null $type
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public static function create(string $type = null, string $name = null): self
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
     * @param null|string $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function name(?string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param null|string $title
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function title(?string $title): self
    {
        $instance = clone $this;

        $instance->title = $title;

        return $instance;
    }

    /**
     * @param null|string $description
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
     * @param null|mixed $default
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function default($default): self
    {
        $instance = clone $this;

        $instance->default = $default;

        return $instance;
    }

    /**
     * @param null|string $format
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function format(?string $format): self
    {
        $instance = clone $this;

        $instance->format = $format;

        return $instance;
    }

    /**
     * @param null|string $type
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function type(?string $type): self
    {
        $instance = clone $this;

        $instance->type = $type;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[] $items
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function items(Schema ...$items): self
    {
        $instance = clone $this;

        $instance->items = $items ?: null;

        return $instance;
    }

    /**
     * @param int|null $maxItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function maxItems(?int $maxItems): self
    {
        $instance = clone $this;

        $instance->maximum = $maxItems;

        return $instance;
    }

    /**
     * @param int|null $minItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function minItems(?int $minItems): self
    {
        $instance = clone $this;

        $instance->maximum = $minItems;

        return $instance;
    }

    /**
     * @param null|bool $uniqueItems
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function uniqueItems(?bool $uniqueItems = true): self
    {
        $instance = clone $this;

        $instance->uniqueItems = $uniqueItems;

        return $instance;
    }

    /**
     * @param null|string $pattern
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
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException
     */
    public function required(...$required): self
    {
        // Only allow Schema instances and strings.
        foreach ($required as &$require) {
            // If a Schema instance was passed in then extract it's name string.
            if ($require instanceof Schema) {
                $require = $require->name;
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
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[] $additionalProperties
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function additionalProperties(Schema ...$additionalProperties): self
    {
        $instance = clone $this;

        $instance->additionalProperties = $additionalProperties ?: null;

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
     * @param null|mixed $example
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    public function example($example): self
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
        $properties = [];
        foreach ($this->properties ?? [] as $property) {
            $properties[$property->name] = $property->toArray();
        }

        $additionalProperties = [];
        foreach ($this->additionalProperties ?? [] as $additionalProperty) {
            $additionalProperties[$additionalProperty->name] = $additionalProperty->toArray();
        }

        return Arr::filter([
            'title' => $this->title,
            'description' => $this->description,
            'enum' => $this->enum,
            'default' => $this->default,
            'format' => $this->format,
            'type' => $this->type,
            'items' => $this->items ? ['allOf' => $this->items] : null,
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
            'nullable' => $this->nullable,
            'example' => $this->example,
        ]);
    }
}
