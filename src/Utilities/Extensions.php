<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Utilities;

use ArrayAccess;
use GoldSpecDigital\ObjectOrientedOAS\Exceptions\ExtensionDoesNotExistException;

/**
 * @internal
 */
class Extensions implements ArrayAccess
{
    public const X_EMPTY_VALUE = 'X_EMPTY_VALUE';

    /**
     * @var array
     */
    protected $items = [];

    /**
     * Whether a offset exists.
     *
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->items[$this->normalizeOffset($offset)]);
    }

    /**
     * Offset to retrieve.
     *
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset
     * @throws \GoldSpecDigital\ObjectOrientedOAS\Exceptions\ExtensionDoesNotExistException
     * @return mixed can return all value types
     */
    public function offsetGet($offset): mixed
    {
        if (!$this->offsetExists($offset)) {
            throw new ExtensionDoesNotExistException("[{$offset}] is not a valid extension.");
        }

        return $this->items[$this->normalizeOffset($offset)];
    }

    /**
     * Offset to set.
     *
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        if ($value === static::X_EMPTY_VALUE) {
            $this->offsetUnset($offset);

            return;
        }

        $this->items[$this->normalizeOffset($offset)] = $value;
    }

    /**
     * Offset to unset.
     *
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset
     */
    public function offsetUnset($offset): void
    {
        if (!$this->offsetExists($offset)) {
            return;
        }

        unset($this->items[$this->normalizeOffset($offset)]);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * @param $offset
     * @return string
     */
    protected function normalizeOffset($offset)
    {
        if (mb_strpos($offset, 'x-') === 0) {
            return $offset;
        }

        return 'x-' . $offset;
    }
}
