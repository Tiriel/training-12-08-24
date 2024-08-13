<?php

namespace App\DesignPatterns\Iterator;

use Traversable;

class StepIterator implements \Iterator, \Countable
{
    protected int $pos = 0;
    protected readonly array $keys;
    protected readonly array $values;
    protected readonly int $total;

    public function __construct(
        array $data,
        protected readonly int $step,
    ) {
        $this->keys = \array_keys($data);
        $this->values = \array_values($data);
        $this->total = \count($data);
    }

    /**
     * @inheritDoc
     */
    public function current(): mixed
    {
        return $this->values[$this->pos];
    }

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        $this->pos += $this->step;
    }

    /**
     * @inheritDoc
     */
    public function key(): mixed
    {
        return $this->keys[$this->pos];
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        return $this->pos < $this->total;
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->pos = 0;
    }

    public function count(): int
    {
        return $this->total;
    }
}
