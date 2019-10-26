<?php declare(strict_types=1);

namespace Rvadym\Types;

trait StrictTypeHelperTrait
{
    /**
     * Removed elements containing "null" or empty string.
     * Doesn't remove elements containing "false".
     */
    private function filterEmpty(array $values): array
    {
        return array_filter(
            $values,
            function($v) {
                if (is_null($v)) {
                    return false;
                }

                if (is_string($v) && $v === '') {
                    return false;
                }

                return true;
            }
        );
    }

    /**
     * Converts booleans "true" and "false" to matching string values.
     */
    private function convertBooleanToString(array $values): array
    {
        return array_map(
            function ($v) {
                if (is_bool($v)) {
                    return $v ? 'true' : 'false';
                }

                return $v;
            },
            $values
        );
    }

    /**
     * Converts strings "true" and "false" to matching boolean values.
     */
    private function convertStringToBoolean(array $values): array
    {
        return array_map(
            function ($v) {
                if ($v === 'true') {
                    return true;
                }
                if ($v === 'false') {
                    return false;
                }

                return $v;
            },
            $values
        );
    }

    /**
     * Converts string to int or returns "null".
     */
    private function filterInt($value): ?int
    {
        if (is_int($value)) {
            return $value;
        }

        if (true === ctype_digit($value)) {
            return intval($value);
        }

        return null;
    }

    /**
     * Returns value if value is integer more than 0 or returns "null".
     */
    private function filterLessThanZero(int $value): ?int
    {
        return $value >= 0 ? $value : null;
    }
}
