<?php declare(strict_types=1);

namespace Rvadym\Types\ValueNormalizer;

use Rvadym\Types\ValueObject\AbstractInt;

class IntValueNormalizer implements ValueNormalizerInterface
{
    public static function normalize($value): int
    {
        if (is_null($value) || is_object($value)) {
            $value = AbstractInt::getDefaultValue();
        }

        if (is_string($value)) {
            $value = intval($value);
        }

        return $value;
    }
}
