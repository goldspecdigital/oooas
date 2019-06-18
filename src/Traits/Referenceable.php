<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Traits;

/**
 * @property string|null $ref
 */
trait Referenceable
{
    /**
     * @var string|null
     */
    protected $ref;

    /**
     * @param string $ref
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\BaseObject
     */
    public static function ref(string $ref): self
    {
        $instance = static::create();

        $instance->ref = $ref;

        return $instance;
    }
}
