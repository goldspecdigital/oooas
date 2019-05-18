<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

/**
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null $schemas
 */
class AllOf extends Composition
{
    /**
     * @return string
     */
    protected function compositionType(): string
    {
        return 'allOf';
    }
}
