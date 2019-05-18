<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $name
 * @property string|null $type
 * @property array|null $flows
 */
class SecurityScheme extends BaseObject
{
    const OAUTH2 = 'oauth2';

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $type;

    /**
     * @var array|null
     */
    protected $flows;

    /**
     * @param string|null $name
     * @param string|null $type
     * @param array|null $flows
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public static function create(
        string $name = null,
        string $type = null,
        array $flows = null
    ): self {
        $instance = new static();

        $instance->name = $name;
        $instance->type = $type;
        $instance->flows = $flows;

        return $instance;
    }

    /**
     * @param string|null $name
     * @param array|null $flows
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme
     */
    public static function oauth2(string $name = null, array $flows = null): self
    {
        return static::create($name, static::OAUTH2, $flows);
    }

    /**
     * @param string|null $name
     * @return string
     */
    public function name(?string $name): string
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string|null $type
     * @return string
     */
    public function type(?string $type): string
    {
        $instance = clone $this;

        $instance->type = $type;

        return $instance;
    }

    /**
     * @param array|null $flows
     * @return string
     */
    public function flows(?array $flows): string
    {
        $instance = clone $this;

        $instance->flows = $flows;

        return $instance;
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
}
