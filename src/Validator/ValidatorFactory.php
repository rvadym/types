<?php declare(strict_types=1);

namespace Rvadym\Types\Validator;

use Rvadym\Types\Exception\NoValidatorForTypeException;
use Rvadym\Types\ValueObject\AbstractEmail;
use Rvadym\Types\ValueObject\AbstractInt;
use Rvadym\Types\ValueObject\AbstractString;
use Rvadym\Types\ValueObject\ValueObjectInterface;

class ValidatorFactory implements ValidatorFactoryInterface
{
    /**
     * @throws NoValidatorForTypeException
     */
    public function getValidator(string $key, ValueObjectInterface $valueObject): ValidatorInterface
    {
        if (is_a($valueObject, AbstractEmail::class)) {
            return new EmailValidator($key, $valueObject);
        }

        if (is_a($valueObject, AbstractString::class)) {
            return new StringValidator($key, $valueObject);
        }

        if (is_a($valueObject, AbstractInt::class)) {
            return new IntValidator($key, $valueObject);
        }

        throw new NoValidatorForTypeException(
            get_class($valueObject)
        );
    }
}
