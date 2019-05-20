<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme|null $securityScheme
 * @property string[]|null $scopes
 */
class SecurityRequirement extends BaseObject
{
    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme|null
     */
    protected $securityScheme;

    /**
     * @var string[]|null
     */
    protected $scopes;

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme $securityScheme
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public function securityScheme(SecurityScheme $securityScheme): self
    {
        $instance = clone $this;

        $instance->securityScheme = $securityScheme;

        return $instance;
    }

    /**
     * @param string[] $scopes
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public function scopes(string ...$scopes): self
    {
        $instance = clone $this;

        $instance->scopes = $scopes ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            $this->securityScheme->objectId => $this->scopes ?? [],
        ]);
    }
}
