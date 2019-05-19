<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $operationRef
 * @property string|null $operationId
 * @property string|null $description
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Server|null $server
 */
class Link extends BaseObject
{
    /**
     * @var string|null
     */
    protected $operationRef;

    /**
     * @var string|null
     */
    protected $operationId;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Server|null
     */
    protected $server;

    /**
     * @param string|null $objectId
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Link
     */
    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param string|null $operationRef
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Link
     */
    public function operationRef(?string $operationRef): self
    {
        $instance = clone $this;

        $instance->operationRef = $operationRef;

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
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Server|null $server
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Link
     */
    public function server(?Server $server): self
    {
        $instance = clone $this;

        $instance->server = $server;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'operationRef' => $this->operationRef,
            'operationId' => $this->operationId,
            'description' => $this->description,
            'server' => $this->server,
        ]);
    }
}
