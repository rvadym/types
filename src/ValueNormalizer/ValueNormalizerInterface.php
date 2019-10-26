<?php declare(strict_types=1);

namespace Rvadym\Types\ValueNormalizer;

interface ValueNormalizerInterface
{
    public static function normalize($value);
}
