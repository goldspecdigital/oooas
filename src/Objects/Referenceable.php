<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

trait Referenceable
{
    /**
     * @var Reference|null
     */
    protected $reference;

    public function setReference(?Reference $reference): self
    {
        $instance = clone $this;

        $instance->reference = $reference;

        return $instance;
    }

    public function getReference()
    {
        return $this->reference;
    }
}
