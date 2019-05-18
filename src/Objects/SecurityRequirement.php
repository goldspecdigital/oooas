<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Exceptions\InvalidArgumentException;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @package string|null $name
 * @package string[]|null $securitySchemes
 */
class SecurityRequirement extends BaseObject
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string[]|null
     */
    protected $securitySchemes;

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public static function create(string $name = null): self
    {
        $instance = new static();

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement
     */
    public function name(?string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
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
            $this->name => $this->securitySchemes ?? [],
        ]);
    }
}
