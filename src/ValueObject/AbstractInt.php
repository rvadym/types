<?php declare(strict_types=1);

namespace Rvadym\Types\ValueObject;

use Rvadym\Types\Validator\IntValidator;
use Rvadym\Types\Validator\ValidatorInterface;

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

    public function getValidator(): ValidatorInterface
    {
        return new IntValidator($this);
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
