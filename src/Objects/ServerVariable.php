<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $name
 * @property string[]|null $enum
 * @property string|null $default
 * @property string|null $description
 */
class ServerVariable extends BaseObject
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string[]|null
     */
    protected $enum;

    /**
     * @var string|null
     */
    protected $default;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @param string|null $name
     * @param string|null $default
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable
     */
    public static function create(
        string $name = null,
        string $default = null
    ): self {
        $instance = new static();

        $instance->name = $name;
        $instance->default = $default;

        return $instance;
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable
     */
    public function name(?string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string[] $enum
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable
     */
    public function enum(string ...$enum): self
    {
        $instance = clone $this;

        $instance->enum = $enum ?: null;

        return $instance;
    }

    /**
     * @param string|null $default
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable
     */
    public function default(?string $default): self
    {
        $instance = clone $this;

        $instance->default = $default;

        return $instance;
    }

    /**
     * @param string|null $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\ServerVariable
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'enum' => $this->enum,
            'default' => $this->default,
            'description' => $this->description,
        ]);
    }
}
