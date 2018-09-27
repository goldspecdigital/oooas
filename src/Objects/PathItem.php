<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string $route
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation[] $operations
 */
class PathItem extends BaseObject
{
    /**
     * @var string
     */
    protected $route;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation[]
     */
    protected $operations;

    /**
     * @param string $route
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation[] $operations
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem
     */
    public static function create(string $route, Operation ...$operations): self
    {
        $instance = new static();

        $instance->route = $route;
        $instance->operations = $operations;

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

    /**
     * @param string $route
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem
     */
    public function route(string $route): self
    {
        $instance = clone $this;

        $instance->route = $route;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation ...$operations
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem
     */
    public function operations(Operation ...$operations): self
    {
        $instance = clone $this;

        $instance->operations = $operations;

        return $instance;
    }
}
