<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Exceptions\PropertyDoesNotExistException;
use JsonSerializable;

/**
 * @property string|null $objectId
 * @property string|null $ref
 */
abstract class BaseObject implements JsonSerializable
{
    /**
     * @var string|null
     */
    protected $objectId;

    /**
     * @var string|null
     */
    protected $ref;

    /**
     * BaseObject constructor.
     *
     * @param string|null $objectId
     */
    public function __construct(string $objectId = null)
    {
        $this->objectId = $objectId;
    }

    /**
     * @param string|null $objectId
     * @return static
     */
    public static function create(string $objectId = null): self
    {
        return new static($objectId);
    }

    /**
     * @param string $ref
     * @return static
     */
    public static function ref(string $ref): self
    {
        $instance = new static();

        $instance->ref = $ref;

        return $instance;
    }

    /**
     * @param string|null $objectId
     * @return static
     */
    public function objectId(?string $objectId): self
    {
        $instance = clone $this;

        $instance->objectId = $objectId;

        return $instance;
    }

    /**
     * @return array
     */
    abstract protected function generate(): array;

    /**
     * @return array
     */
    public function toArray(): array
    {
        if ($this->ref !== null) {
            return ['$ref' => $this->ref];
        }

        return $this->generate();
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @param string $name
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\PropertyDoesNotExistException
     * @return mixed
     */
    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new PropertyDoesNotExistException();
    }
}
