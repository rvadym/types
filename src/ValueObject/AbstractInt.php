<?php declare(strict_types=1);

namespace Rvadym\Types\ValueObject;

abstract class AbstractInt extends AbstractValueObject
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function getDefaultValue()
    {
        return 0;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function __toString()
    {
        return strval($this->getValue());
    }
}
