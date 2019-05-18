<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @package string|null $name
 * @package string|null $contentType
 * @package \GoldSpecDigital\ObjectOrientedOAS\Objects\Header[]|null $headers
 * @package string|null $style
 * @package bool|null $explode
 * @package bool|null $allowReserved
 */
class Encoding extends BaseObject
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $contentType;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Header[]|null
     */
    protected $headers;

    /**
     * @var string|null
     */
    protected $style;

    /**
     * @var bool|null
     */
    protected $explode;

    /**
     * @var bool|null
     */
    protected $allowReserved;

    /**
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding
     */
    public static function create(): self
    {
        $instance = new static();

        return $instance;
    }

    /**
     * @param string|null $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding
     */
    public function name(?string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string|null $contentType
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding
     */
    public function contentType(?string $contentType): self
    {
        $instance = clone $this;

        $instance->contentType = $contentType;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Header[] $headers
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding
     */
    public function headers(Header ...$headers): self
    {
        $instance = clone $this;

        $instance->headers = $headers ?: null;

        return $instance;
    }

    /**
     * @param string|null $style
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding
     */
    public function style(?string $style): self
    {
        $instance = clone $this;

        $instance->style = $style;

        return $instance;
    }

    /**
     * @param bool|null $explode
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding
     */
    public function explode(?bool $explode = true): self
    {
        $instance = clone $this;

        $instance->explode = $explode;

        return $instance;
    }

    /**
     * @param bool|null $allowReserved
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Encoding
     */
    public function allowReserved(?bool $allowReserved = true): self
    {
        $instance = clone $this;

        $instance->allowReserved = $allowReserved;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $headers = [];
        foreach ($this->headers ?? [] as $header) {
            $headers[$header->name] = $header;
        }

        return Arr::filter([
            'contentType' => $this->contentType,
            'headers' => $headers ?: null,
            'style' => $this->style,
            'explode' => $this->explode,
            'allowReserved' => $this->allowReserved,
        ]);
    }
}
