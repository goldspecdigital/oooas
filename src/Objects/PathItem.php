<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $route
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation[]|null $operations
 */
class PathItem extends BaseObject
{
    /**
     * @var string|null
     */
    protected $route;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation[]|null
     */
    protected $operations;

    /**
     * @param string|null $route
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation[] $operations
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem
     */
    public static function create(string $route = null, Operation ...$operations): self
    {
        $instance = new static();

        $instance->route = $route;
        $instance->operations = $operations ?: null;

        return $instance;
    }

    /**
     * @param null|string $route
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem
     */
    public function route(?string $route): self
    {
        $instance = clone $this;

        $instance->route = $route;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation[] $operations
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem
     */
    public function operations(Operation ...$operations): self
    {
        $instance = clone $this;

        $instance->operations = $operations ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $operations = [];
        foreach ($this->operations as $operation) {
            $operations[$operation->action] = $operation->toArray();
        }

        return Arr::filter($operations);
    }
}
