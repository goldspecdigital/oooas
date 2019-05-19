<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @package string[]|null $securitySchemes
 */
class SecurityRequirement extends BaseObject
{
    /**
     * @var string[]|null
     */
    protected $securitySchemes;

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme[]|string[] $securitySchemes
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException
     */
    public function securitySchemes(...$securitySchemes): self
    {
        // Only allow SecurityScheme instances and strings.
        foreach ($securitySchemes as &$securityScheme) {
            if ($securityScheme instanceof SecurityScheme) {
                $securityScheme = $securityScheme->name;
                continue;
            }

            if (is_string($securityScheme)) {
                continue;
            }

            throw new InvalidArgumentException();
        }

        $instance = clone $this;

        $instance->securitySchemes = $securitySchemes ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            $this->objectId => $this->securitySchemes ?? [],
        ]);
    }
}
