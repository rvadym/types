<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

use Rvadym\Types\ValueObject\AbstractInt;

class IntValidator extends AbstractValidator
{
    public function __construct(
        string $key,
        AbstractInt $valueObject
    ) {
        parent::__construct($key, $valueObject);
    }

    public function validate(): void
    {
        if ($this->isNotInt()) {
            $this->addError('Must be integer');
        }
    }

    protected function isNotInt(): bool
    {
        return ! is_int($this->getValueObject()->getValue());
    }
}
