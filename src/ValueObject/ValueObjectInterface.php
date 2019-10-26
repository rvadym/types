<?php declare(strict_types=1);

namespace Rvadym\Types\ValueObject;

interface ValueObjectInterface
{
    public static function getDefaultValue();
    public function getValue();
    public function __toString();
}
