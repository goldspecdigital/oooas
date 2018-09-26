<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

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
     * @var bool
     */
    protected $required = false;

    /**
     * @var bool
     */
    protected $deprecated = false;

    /**
     * @var bool
     */
    protected $allowEmptyValue = false;

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
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $in
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function in(string $in): self
    {
        $this->in = $in;

        return $this;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function description(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param bool $required
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function required(bool $required = true): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @param bool $deprecated
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function deprecated(bool $deprecated = true): self
    {
        $this->deprecated = $deprecated;

        return $this;
    }

    /**
     * @param bool $allowEmptyValue
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function allowEmptyValue(bool $allowEmptyValue = true): self
    {
        $this->allowEmptyValue = $allowEmptyValue;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema $schema
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter
     */
    public function schema(Schema $schema): self
    {
        $this->schema = $schema;

        return $this;
    }
}
