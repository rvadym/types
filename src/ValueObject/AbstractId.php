<?php declare(strict_types=1);

namespace Rvadym\Types\ValueObject;

use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

abstract class AbstractId extends AbstractString
{
    /**
     * @return static
     * @throws UnsatisfiedDependencyException
     * @throws Exception
     */
    public static function create(): self
    {
        $uuid4 = Uuid::uuid4();

        return new static($uuid4->toString());
    }
}
