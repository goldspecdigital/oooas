<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $name
 * @property string|null $description
 */
class Tag extends BaseObject
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag
     */
    public static function create(string $name = null): self
    {
        $instance = new static();

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag
     */
    public function name(?string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string|null $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag
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
            'name' => $this->name,
            'description' => $this->description,
        ]);
    }
}
