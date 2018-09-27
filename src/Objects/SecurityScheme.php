<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class SecurityScheme extends BaseObject
{
    const OAUTH2 = 'oauth2';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $flows;

    /**
     * @param string $name
     * @param string $type
     * @param array $flows
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public static function create(string $name, string $type, array $flows): self
    {
        $instance = new static();
        
        $instance->name = $name;
        $instance->type = $type;
        $instance->flows = $flows;
        
        return $instance;
    }

    /**
     * @param string $name
     * @param array $flows
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public static function oauth2(string $name, array $flows): self
    {
        return static::create($name, static::OAUTH2, $flows);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'type' => $this->type,
            'flows' => $this->flows,
        ]);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return string
     */
    public function name(string $name): string
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string $type
     * @return string
     */
    public function type(string $type): string
    {
        $instance = clone $this;

        $instance->type = $type;

        return $instance;
    }

    /**
     * @param array $flows
     * @return string
     */
    public function flows(array $flows): string
    {
        $instance = clone $this;

        $instance->flows = $flows;

        return $instance;
    }
}
