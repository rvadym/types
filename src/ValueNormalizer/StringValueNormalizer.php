<?php declare(strict_types=1);

namespace Rvadym\Types\ValueNormalizer;

use Rvadym\Types\ValueObject\AbstractString;

class StringValueNormalizer implements ValueNormalizerInterface
{
    public static function normalize($value): string
    {
        if (is_null($value) || is_object($value)) {
            $value = AbstractString::getDefaultValue();
        }

        if (is_numeric($value)) {
            $value = strval($value);
        }

        return $value;
    }
}
