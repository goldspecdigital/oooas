<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $name
 * @property string|null $in
 * @property string|null $description
 * @property bool|null $required
 * @property bool|null $deprecated
 * @property bool|null $allowEmptyValue
 * @property string|null $style
 * @property bool|null $explode
 * @property bool|null $allowReserved
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
 * @property mixed|null $example
 * @property Example[]|null $examples
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType|null $content
 */
class Parameter extends BaseObject
{
    const QUERY = 'query';
    const HEADER = 'header';
    const PATH = 'path';
    const COOKIE = 'cookie';

    const MATRIX = 'matrix';
    const LABEL = 'label';
    const FORM = 'form';
    const SIMPLE = 'simple';
    const SPACE_DELIMITED = 'spaceDelimited';
    const PIPE_DELIMITED = 'pipeDelimited';
    const DEEP_OBJECT = 'deepObject';

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $in;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var bool|null
     */
    protected $required;

    /**
     * @var bool|null
     */
    protected $deprecated;

    /**
     * @var bool|null
     */
    protected $allowEmptyValue;

    /**
     * @var string|null
     */
    protected $style;

    /**
     * @var bool|null
     */
    protected $explode;

    /**
     * @var string|null
     */
    protected $allowReserved;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null
     */
    protected $schema;

    /**
     * @var mixed|null
     */
    protected $example;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Example[]|null
     */
    protected $examples;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType|null
     */
    protected $content;

    /**
     * @param string|null $name
     * @param string|null $in
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function create(
        string $name = null,
        string $in = null,
        Schema $schema = null
    ): self {
        $instance = new static();

        $instance->name = $name;
        $instance->in = $in;
        $instance->schema = $schema;

        return $instance;
    }

    /**
     * @param string|null $name
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function query(string $name = null, Schema $schema = null): self
    {
        return static::create($name, static::QUERY, $schema);
    }

    /**
     * @param string|null $name
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function header(string $name = null, Schema $schema = null): self
    {
        return static::create($name, static::HEADER, $schema);
    }

    /**
     * @param string|null $name
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function path(string $name = null, Schema $schema = null): self
    {
        return static::create($name, static::PATH, $schema);
    }

    /**
     * @param string|null $name
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function cookie(string $name = null, Schema $schema = null): self
    {
        return static::create($name, static::COOKIE, $schema);
    }

    /**
     * @param null|string $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function name(?string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param null|string $in
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function in(?string $in): self
    {
        $instance = clone $this;

        $instance->in = $in;

        return $instance;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param null|bool $required
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function required(?bool $required = true): self
    {
        $instance = clone $this;

        $instance->required = $required;

        return $instance;
    }

    /**
     * @param null|bool $deprecated
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function deprecated(?bool $deprecated = true): self
    {
        $instance = clone $this;

        $instance->deprecated = $deprecated;

        return $instance;
    }

    /**
     * @param null|bool $allowEmptyValue
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function allowEmptyValue(?bool $allowEmptyValue = true): self
    {
        $instance = clone $this;

        $instance->allowEmptyValue = $allowEmptyValue;

        return $instance;
    }

    /**
     * @param string|null $style
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function style(?string $style): self
    {
        $instance = clone $this;

        $instance->style = $style;

        return $instance;
    }

    /**
     * @param bool|null $explode
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function explode(?bool $explode = true): self
    {
        $instance = clone $this;

        $instance->explode = $explode;

        return $instance;
    }

    /**
     * @param bool|null $allowReserved
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function allowReserved(?bool $allowReserved = true): self
    {
        $instance = clone $this;

        $instance->allowReserved = $allowReserved;

        return $instance;
    }

    /**
     * @param null|\GoldSpecDigital\ObjectOrientedOAS\Objects\Schema $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function schema(?Schema $schema): self
    {
        $instance = clone $this;

        $instance->schema = $schema;

        return $instance;
    }

    /**
     * @param null|mixed $example
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function example($example): self
    {
        $instance = clone $this;

        $instance->example = $example;

        return $instance;
    }

    /**
     * @param null|\GoldSpecDigital\ObjectOrientedOAS\Objects\Example[] $examples
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function examples(Example ...$examples): self
    {
        $instance = clone $this;

        $instance->examples = $examples ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType[] $content
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
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
        $examples = [];
        foreach ($this->examples ?? [] as $example) {
            $examples[$example->name] = $example->toArray();
        }

        $content = [];
        foreach ($this->content ?? [] as $contentItem) {
            $content[$contentItem->mediaType] = $contentItem;
        }

        return Arr::filter([
            'name' => $this->name,
            'in' => $this->in,
            'description' => $this->description,
            'required' => $this->required,
            'deprecated' => $this->deprecated,
            'allowEmptyValue' => $this->allowEmptyValue,
            'style' => $this->style,
            'explode' => $this->explode,
            'allowReserved' => $this->allowReserved,
            'schema' => $this->schema,
            'example' => $this->example,
            'examples' => $examples ?: null,
            'content' => $content ?: null,
        ]);
    }
}
