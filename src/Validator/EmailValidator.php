<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

class EmailValidator extends StringValidator
{
    public function validate(): void
    {
        parent::validate();

        if ($this->isNotEmail()) {
            $this->addError('Must be valid email.');
        }
    }

    protected function isNotEmail(): bool
    {
        return ! filter_var($this->getValueObject()->getValue(), FILTER_VALIDATE_EMAIL);
    }
}
