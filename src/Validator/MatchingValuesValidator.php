<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

use Rvadym\Types\ValueObject\AbstractValueObject;

class MatchingValuesValidator implements ValidatorInterface
{
    /** @var string */
    private $key;

    /** @var array */
    private $errors = [];

    /** @var AbstractValueObject */
    private $valueOne;

    /** @var AbstractValueObject */
    private $valueTwo;

    public function __construct(
        string $key,
        AbstractValueObject $valueOne,
        AbstractValueObject $valueTwo
    ) {
        $this->key = $key;
        $this->valueOne = $valueOne;
        $this->valueTwo = $valueTwo;
    }

    public function validate(): void
    {
        if ($this->valueOne->getValue() !== $this->valueTwo->getValue()) {
            $this->errors[] = 'Value doesn\'t match.';
        }
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
