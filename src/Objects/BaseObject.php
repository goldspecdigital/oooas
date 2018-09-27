<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Exceptions\PropertyDoesNotExistException;
use JsonSerializable;

abstract class BaseObject implements JsonSerializable
{
    /**
     * Object constructor.
     */
    protected function __construct()
    {
        // Prevent instantiation.
    }

    /**
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\PropertyDoesNotExistException
     */
    public function __get(string $name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }

        throw new PropertyDoesNotExistException();
    }
}
