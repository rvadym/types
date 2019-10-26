<?php declare(strict_types=1);

namespace Rvadym\Types\Collection;

//use Rvadym\Types\Exception\CollectionIsToBigException;
use IteratorAggregate;
use ArrayIterator;
use Countable;

abstract class AbstractCollection implements IteratorAggregate, Countable
{
    abstract protected function getItems(): array;

    public function count(): int
    {
        return count($this->getItems());
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->getItems());
    }

//    /**
//     * @throws CollectionIsToBigException
//     */
//    protected function validate(): void
//    {
//        /** @var int $collectionSize */
//        $collectionSize = count($this->getItems());
//
//        if ($collectionSize > 1000) {
//            throw new CollectionIsToBigException(sprintf(
//                'Collection is too big. Collections with up to 1000 items are supported only. Current size is %d items.',
//                $collectionSize
//            ));
//        }
//    }
}
