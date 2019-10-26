<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

use Rvadym\Types\ValueObject\AbstractString;

class StringValidator extends AbstractValidator
{
    public function __construct(
        string $key,
        AbstractString $valueObject
    ) {
        parent::__construct($key, $valueObject);
    }

    public function validate(): void
    {
        if ($this->isTooLong()) {
            $this->addError('Must be 256 characters long or shorted.');
        }
    }

    protected function isTooLong(): bool
    {
        return strlen($this->getValueObject()->getValue()) > 256;
    }
}
