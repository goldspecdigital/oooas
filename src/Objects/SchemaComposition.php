<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null $schemas
 */
abstract class SchemaComposition extends BaseObject implements SchemaContract
{
    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[]|null
     */
    protected $schemas;

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SchemaComposition
     */
    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Schema[] $schemas
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SchemaComposition
     */
    public function schemas(Schema ...$schemas): self
    {
        $instance = clone $this;

        $instance->schemas = $schemas ?: null;

        return $instance;
    }

    /**
     * @return string
     */
    abstract protected function compositionType(): string;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            $this->compositionType() => $this->schemas,
        ]);
    }
}
