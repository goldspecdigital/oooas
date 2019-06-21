<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme[]|null $securitySchemes
 */
class Components extends BaseObject
{
    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme[]|null
     */
    protected $securitySchemes;

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityScheme[] $securitySchemes
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Components
     */
    public function securitySchemes(SecurityScheme ...$securitySchemes): self
    {
        $instance = clone $this;

        $instance->securitySchemes = $securitySchemes ?: null;

        return $instance;
    }

    /**
     * @return array
     */
    protected function generate(): array
    {
        $securitySchemes = [];
        foreach ($this->securitySchemes ?? [] as $securityScheme) {
            $securitySchemes[$securityScheme->objectId] = $securityScheme;
        }

        return Arr::filter([
            'securitySchemes' => $securitySchemes ?: null,
        ]);
    }
}
