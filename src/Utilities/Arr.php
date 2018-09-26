<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Utilities;

use GoldSpecDigital\ObjectOrientedOAS\Objects\BaseObject;

class Arr
{
    /**
     * @param array $array
     * @return array
     */
    public static function filter(array $array): array
    {
        foreach ($array as $index => &$value) {
            // If the value is an object, then parse to array.
            if ($value instanceof BaseObject) {
                $value = $value->toArray();
            }

            // If the value is null then remove it.
            if ($value === null) {
                unset($array[$index]);
                continue;
            }

            // If the value is an empty array then remove it.
            if (is_array($value) && count($value) === 0) {
                unset($array[$index]);
                continue;
            }

            // If the value is a filled array then recursively filter it.
            if (is_array($value)) {
                $value = static::filter($value);
                continue;
            }
        }

        return $array;
    }
}
