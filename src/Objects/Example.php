<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class Example extends BaseObject
{
    /**
     * @var string|null
     */
    protected $summary;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param $value
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Example
     */
    public static function create($value): self
    {
        $instance = new static();

        $instance->value = $value;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'summary' => $this->summary,
            'description' => $this->description,
            'value' => $this->value,
        ]);
    }

    /**
     * @param null|string $summary
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Example
     */
    public function summary(?string $summary): self
    {
        $instance = clone $this;

        $instance->summary = $summary;

        return $instance;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Example
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param mixed $value
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Example
     */
    public function value($value): self
    {
        $instance = clone $this;

        $instance->value = $value;

        return $instance;
    }
}
