<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string $name
 * @property string $in
 * @property string|null $description
 * @property bool|null $required
 * @property bool|null $deprecated
 * @property bool|null $allowEmptyValue
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema $schema
 */
class Parameter extends BaseObject
{
    const QUERY = 'query';
    const HEADER = 'header';
    const PATH = 'path';
    const COOKIE = 'cookie';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
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
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema
     */
    protected $schema;

    /**
     * @param string $name
     * @param string $in
     * @param $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function create(string $name, string $in, Schema $schema): self
    {
        $instance = new static();

        $instance->name = $name;
        $instance->in = $in;
        $instance->schema = $schema;

        return $instance;
    }

    /**
     * @param string $name
     * @param $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function query(string $name, $schema): self
    {
        return static::create($name, static::QUERY, $schema);
    }

    /**
     * @param string $name
     * @param $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function header(string $name, $schema): self
    {
        return static::create($name, static::HEADER, $schema);
    }

    /**
     * @param string $name
     * @param $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function path(string $name, $schema): self
    {
        return static::create($name, static::PATH, $schema);
    }

    /**
     * @param string $name
     * @param $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public static function cookie(string $name, $schema): self
    {
        return static::create($name, static::COOKIE, $schema);
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
            'deprecated ' => $this->deprecated ,
            'allowEmptyValue ' => $this->allowEmptyValue ,
            'schema' => $this->schema,
        ]);
    }

    /**
     * @param string $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function name(string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string $in
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function in(string $in): self
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
     * @param bool $required
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function required(bool $required = true): self
    {
        $instance = clone $this;

        $instance->required = $required;

        return $instance;
    }

    /**
     * @param bool $deprecated
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function deprecated(bool $deprecated = true): self
    {
        $instance = clone $this;

        $instance->deprecated = $deprecated;

        return $instance;
    }

    /**
     * @param bool $allowEmptyValue
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function allowEmptyValue(bool $allowEmptyValue = true): self
    {
        $instance = clone $this;

        $instance->allowEmptyValue = $allowEmptyValue;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function schema(Schema $schema): self
    {
        $instance = clone $this;

        $instance->schema = $schema;

        return $instance;
    }
}
