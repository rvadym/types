<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

use Rvadym\Types\ValueObject\ValueObjectInterface;

interface ValidatorFactoryInterface
{
    public function getValidator(string $key, ValueObjectInterface $valueObject): ValidatorInterface;
}
