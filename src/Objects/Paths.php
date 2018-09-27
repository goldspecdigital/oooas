<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem[] $pathItems
 */
class Paths extends BaseObject
{
    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem[]
     */
    protected $pathItems;

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\PathItem[] $pathItem
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths
     */
    public static function create(PathItem ...$pathItem): self
    {
        $instance = new static();

        $instance->pathItems = $pathItem;

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
