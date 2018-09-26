<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

class Paths extends BaseObject
{
    /**
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths
     */
    public static function create(): self
    {
        $instance = new static();

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}
