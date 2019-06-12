<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $dollarRef
 */
class Reference extends BaseObject
{
    /**
     * @var string|null
     */
    protected $dollarRef;

    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param string|null $dollarRef
     *
     * @return Reference
     */
    public function dollarRef(?string $dollarRef): self
    {
        $instance = clone $this;

        $instance->dollarRef = $dollarRef;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            '$ref' => $this->dollarRef,
        ]);
    }
}
