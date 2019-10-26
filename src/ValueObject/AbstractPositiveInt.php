<?php declare(strict_types=1);

namespace Rvadym\Types\ValueObject;

use Rvadym\Types\ValueObject\Exception\NotPositiveIntException;

abstract class AbstractPositiveInt extends AbstractInt
{
    /**
     * AbstractPositiveInt constructor.
     * @param int $value
     * @throws NotPositiveIntException
     */
    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new NotPositiveIntException(sprintf(
                'Value %d is negative.',
                $value
            ));
        }

        parent::__construct($value);
    }
}
