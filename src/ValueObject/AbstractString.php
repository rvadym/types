<?php declare(strict_types=1);

namespace Rvadym\Types\ValueObject;

abstract class AbstractString extends AbstractValueObject
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function getDefaultValue()
    {
        return '';
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
