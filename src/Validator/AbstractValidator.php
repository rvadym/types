<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

use Rvadym\Types\ValueObject\ValueObjectInterface;

abstract class AbstractValidator implements ValidatorInterface
{
    /** @var string */
    private $key;

    /** @var array */
    private $errors = [];

    /** @var ValueObjectInterface */
    private $valueObject;

    public function __construct(
        string $key,
        ValueObjectInterface $valueObject
    ) {
        $this->key = $key;
        $this->valueObject = $valueObject;
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

    protected function addError(string $message): void
    {
        $this->errors[] = $message;
    }

    public function getValueObject(): ValueObjectInterface
    {
        return $this->valueObject;
    }
}
