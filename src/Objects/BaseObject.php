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
     * @param string|null $objectId
     * @return static
     */
    public static function ref(string $ref, string $objectId = null): self
    {
        $instance = new static($objectId);

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
     * @param int $options
     * @return string
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), $options);
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

        throw new PropertyDoesNotExistException("[{$name}] is not a valid property.");
    }
}
