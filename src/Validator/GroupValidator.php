<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

class GroupValidator implements ValidatorInterface
{
    /** @var string */
    private $key;

    /** @var array */
    private $errors = [];

    /** @var array | ValidatorInterface[] */
    private $validators;

    public function __construct(
        string $key,
        ValidatorInterface ...$validators
    ) {
        $this->key = $key;
        $this->validators = $validators;
    }

    public function validate(): void
    {
        /** @var ValidatorInterface $validator */
        foreach ($this->validators as $validator) {
            $validator->validate();

            if ($validator->hasErrors()) {
                $this->addErrors($validator->getKey(), $validator->getErrors());
            }
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

    protected function addErrors(string $key, array $messages): void
    {
        if (!isset($this->errors[$key])) {
            $this->errors[$key] = [];
        }

        $this->errors[$key] = array_merge($this->errors[$key], $messages);
    }
}
