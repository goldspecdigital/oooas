<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $name
 * @property string|null $href
 * @property string|null $operationId
 * @property string|null $description
 */
class Link extends BaseObject
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $href;

    /**
     * @var string|null
     */
    protected $operationId;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Link
     */
    public static function create(): self
    {
        $instance = new static();

        return $instance;
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Link
     */
    public function name(?string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string|null $href
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Link
     */
    public function href(?string $href): self
    {
        $instance = clone $this;

        $instance->href = $href;

        return $instance;
    }

    /**
     * @param string|null $operationId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Link
     */
    public function operationId(?string $operationId): self
    {
        $instance = clone $this;

        $instance->operationId = $operationId;

        return $instance;
    }

    /**
     * @param string|null $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Link
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'name' => $this->name,
            'href' => $this->href,
            'operationId' => $this->operationId,
            'description' => $this->description,
        ]);
    }
}
