<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $name
 * @property string|null $in
 * @property string|null $description
 * @property bool|null $required
 * @property bool|null $deprecated
 * @property bool|null $allowEmptyValue
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null $schema
 */
class Parameter extends BaseObject
{
    const QUERY = 'query';
    const HEADER = 'header';
    const PATH = 'path';
    const COOKIE = 'cookie';

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
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema|null
     */
    protected $schema;

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
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'name' => $this->name,
            'in' => $this->in,
            'description' => $this->description,
            'required' => $this->required,
            'deprecated ' => $this->deprecated,
            'allowEmptyValue ' => $this->allowEmptyValue,
            'schema' => $this->schema,
        ]);
    }
}
