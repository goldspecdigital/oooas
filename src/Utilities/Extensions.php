<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Utilities;

use ArrayAccess;
use GoldSpecDigital\ObjectOrientedOAS\Exceptions\ExtensionDoesNotExistException;

/**
 * @internal
 */
class Extensions implements ArrayAccess
{
    public const X_EMPTY_VALUE = 'X_EMPTY_VALUE';

    protected $items = [];

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return bool true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$this->normalizeOffset($offset)]);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     * @throws ExtensionDoesNotExistException
     */
    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new ExtensionDoesNotExistException("[{$offset}] is not a valid extension.");
        }

        return $this->items[$this->normalizeOffset($offset)];
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        if ($value === self::X_EMPTY_VALUE) {
            $this->offsetUnset($offset);
            return;
        }

        $this->items[$this->normalizeOffset($offset)] = $value;
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        if (!$this->offsetExists($offset)) {
            return;
        }

        unset($this->items[$this->normalizeOffset($offset)]);
    }

    public function toArray(): array
    {
        return $this->items;
    }

    protected function normalizeOffset($offset)
    {
        if (strpos($offset, 'x-') === 0) {
            return $offset;
        }

        return 'x-' . $offset;
    }
}
