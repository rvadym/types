<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

interface ValidatorInterface
{
    public function validate(): void;
    public function hasErrors(): bool;
    public function getErrors(): array;
    public function getKey(): string;
}
