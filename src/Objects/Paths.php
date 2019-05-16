<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem[]|null $pathItems
 */
class Paths extends BaseObject
{
    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem[]|null
     */
    protected $pathItems;

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem[] $pathItem
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths
     */
    public static function create(PathItem ...$pathItem): self
    {
        $instance = new static();

        $instance->pathItems = $pathItem ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem[] $pathItem
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths
     */
    public function pathItems(PathItem ...$pathItem): self
    {
        $instance = clone $this;

        $instance->pathItems = $pathItem ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $pathItems = [];
        foreach ($this->pathItems as $pathItem) {
            $pathItems[$pathItem->route] = $pathItem;
        }

        return Arr::filter($pathItems);
    }
}
