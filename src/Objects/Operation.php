<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

class Operation extends BaseObject
{
    /**
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Operation
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
